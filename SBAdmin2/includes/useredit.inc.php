<?php

session_start();

    include "dbh.inc.php";
    if(isset($_POST['edit-submit'])){

        $upid = $_POST['edit-submit'];
        $userName = $_POST['uname'];
        $userRole = $_POST['role'];
        $userStat = $_POST['stat'];
     
        if( empty($userName) || empty($userRole)  || empty($_POST['fname']) || empty($_POST['lname'])){ 
            header("Location: ../../UserManagement.php?error=editemptyfields&uid=".$userID."&name=".$userName."&role=".$userRole."&fname=".$_POST['fname']."&mname=".$_POST['mname']."&lname=".$_POST['lname']);
            exit();
        }
        
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
            header("Location: ../../UserManagement.php?error=invaliduid");
            exit();
        }

        else {
                          

                    $sql = "UPDATE user SET userName ='".$userName."', userRoleID ='".$userRole."' , userStat ='".$userStat."'  WHERE userPersonID = '".$upid."' ;"; 
                    $result = mysqli_query($conn, $sql);

//this part is to update info to person table -start

                        $personFname = $_POST['fname'];
                        $personMname = $_POST['mname'];
                        $personLname = $_POST['lname']; 

                        $sql = "UPDATE person SET personFname = '".$personFname."', personMname = '".$personMname."', personLname = '".$personLname."'  WHERE personID = '".$upid."' ;"; 
                        $result = mysqli_query($conn, $sql);
                    
//this part is to add info to person table -end

            //if user selected a file to upload for new pic
            
                require 'usereditupload.php';
               
                    
    //this part here is added by joe for the activity log from line 88 and every line that follows

                        $sql = "INSERT INTO activity (actDesc, actDate, actUserID, actCategoryID) VALUES (?,?,?,?)"; 
                        
                        $actDesc = "A user named ".$personFname." ".$personLname." was updated by ".$_SESSION['userUid'];
                        
                        $timezone  = 8; //(GMT +8:00) Philippine Standard Time
                        $actDate = gmdate("Y-m-j H:i:s", time() + 3600*($timezone+date("I")));
                        
                        $actUserID = $_SESSION['userId'];
                        $actCategoryID = 2;

                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            header ("Location: UserManagement.php?error=sqlerror3");
                            exit();
                        }
                        else {
                            mysqli_stmt_bind_param($stmt,"sssi",$actDesc, $actDate, $actUserID, $actCategoryID);
                            mysqli_stmt_execute($stmt);
                            header ("Location: ../../adUserManagement.php?success=useredit");
                            exit(); 
                        }    
    //this part here ends the lines added by joe for the activity log                         

                    }
        
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    }
    else{
        header("Location: ../../UserManagement.php?error=edit");
        exit();
    }
