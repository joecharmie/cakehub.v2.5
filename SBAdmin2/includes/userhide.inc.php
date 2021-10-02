<?php

session_start();

    include "dbh.inc.php";
    if(isset($_GET['hide-submit'])){

        $upid = $_GET['hide-submit'];
        $sql = "UPDATE user SET userStat = 3 WHERE userPersonID = '".$upid."' ;";
        $result = mysqli_query($conn, $sql);

        $sql = "SELECT personFname, personLname FROM person WHERE personID = '".$upid."' ;";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $fname = $row['personFname'];
                $lname = $row['personLname'];
            }
        }

//this part here is added by joe for the activity log from line 88 and every line that follows

                        $sql = "INSERT INTO activity (actDesc, actDate, actUserID, actCategoryID) VALUES (?,?,?,?)"; 
                        
                        $actDesc = "The selected user named ".$fname." ".$lname." was deleted by ".$_SESSION['userUid'];
                        //$actDate = date("Y-m-d");
                        
                        $timezone  = 8; //(GMT +8:00) Philippine Standard Time
                        $actDate = gmdate("Y-m-j H:i:s", time() + 3600*($timezone+date("I")));

                        $actUserID = $_SESSION['userId'];
                        $actCategoryID = 3;

                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            header ("Location: UserEdit.php?error=sqlerror3");
                            exit();
                        }
                        else {
                            mysqli_stmt_bind_param($stmt,"sssi",$actDesc, $actDate, $actUserID, $actCategoryID);
                            mysqli_stmt_execute($stmt);
                            header ("Location: ../../UserManagement.php?hide=success&details=".$upid);
                            exit(); 
                        }    
//this part here ends the lines added by joe for the activity log                         


    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    }
    else{
        header("Location: UserHide.php");
        exit();
    }
