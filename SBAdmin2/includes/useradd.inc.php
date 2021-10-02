<?php

session_start();

    include "dbh.inc.php";
    if(isset($_POST['signup-submit'])){

        $userID =$_POST['uid'];
        $userName = $_POST['uname'];
        $userRole = $_POST['role'];
        $userStat = 1;
        $password = $_POST['pwd'];
        $passwordRepeat = $_POST['pwd-repeat']; 
     
        if(empty($userID) || empty($userName) || empty($userRole) || empty($password) || empty($passwordRepeat) || empty($_POST['fname']) || empty($_POST['lname'])){ 
            header("Location: ../../UserManagement.php?error=signupemptyfields&uid=".$userID."&name=".$userName."&role=".$userRole."&fname=".$_POST['fname']."&mname=".$_POST['mname']."&lname=".$_POST['lname']);
            exit();
        }
        
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
            header("Location: ../../UserManagement.php?error=invaliduid");
            exit();
        }

        else if ($password !== $passwordRepeat) {
            header("Location: ../../UserManagement.php?error=passwordcheck&uid=".$userName);
            exit();
        }

        else {
            
            $sql = "SELECT userID FROM user WHERE userID=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header ("Location: ../../UserManagement.php?error=sqlerror1");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt,"s",$userID);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if( $resultCheck > 0){
                    header ("Location: ../../UserManagement.php?error=usertakenmail");
                    exit();
                }
                else{
                    

                    
                    $sql = "INSERT INTO user (userID, userName, userRoleID, userStat, userPassword) VALUES (?,?,?,?,?)"; //ps: I did not include the blob for Image yet
                    
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        header ("Location: ../../UserManagement.php?error=sqlerror3");
                        exit();
                    }
                    else {
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt,"ssiis",$userID, $userName, $userRole, $userStat, $hashedPwd);
                        //ps: I did not include the blob for Image yet
                        mysqli_stmt_execute($stmt);

//this part is to add info to person table -start

                        $personFname = $_POST['fname'];
                        $personMname = $_POST['mname'];
                        $personLname = $_POST['lname']; 
                        $personImg = "not set";                             
                        $personDate = gmdate("Y-m-j H:i:s", time() + 3600*(8+date("I")));

                        $sql = "INSERT INTO person (personFname, personMname, personLname, personImg, personDate) VALUES (?,?,?,?,?)"; 
                                                
                        $actDesc = "A user named ".$personFname." ".$personLname." was added by ".$_SESSION['userUid'];
            
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            header ("Location: ../../UserManagement.php?error=sqlerror3");
                            exit();
                        }
                        else {
                            mysqli_stmt_bind_param($stmt,"sssss",$personFname,$personMname,$personLname,$personImg,$personDate);
                            mysqli_stmt_execute($stmt);
                        }

                    
//this part is to add info to person table -end

// this part here is to upload pic if set
                        require 'userupload.php';
//

//this part here is added by joe for the activity log from line 88 and every line that follows

                        $sql = "INSERT INTO activity (actDesc, actDate, actUserID, actCategoryID) VALUES (?,?,?,?)"; 
                        
                        $actDesc = "A user named ".$personFname." ".$personLname." was added by ".$_SESSION['userUid'];
                        $actDate = gmdate("Y-m-j H:i:s", time() + 3600*(8+date("I")));

                        $actUserID = $_SESSION['userId'];
                        $actCategoryID = 1;

                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            header ("Location: ../../UserManagement.php?error=sqlerror3");
                            exit();
                        }
                        else {
                            mysqli_stmt_bind_param($stmt,"sssi",$actDesc, $actDate, $actUserID, $actCategoryID);
                            mysqli_stmt_execute($stmt);
                            header ("Location: ../../UserManagement.php?signup=success");
                            exit(); 
                        }    
//this part here ends the lines added by joe for the activity log                         

                    }
                
                }
            }

        }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    }
    else{
        header("Location: ../../UserManagement.php");
        exit();
    }
