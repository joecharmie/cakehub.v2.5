<?php

session_start();

    include "dbh.inc.php";
    if(isset($_POST['sync-submit'])){

                    
//this part here is added by joe for the activity log from line 88 and every line that follows

                        $sql = "INSERT INTO activity (actDesc, actDate, actUserID, actCategoryID) VALUES (?,?,?,?)"; 
                        
                        DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
                        $actDesc = "The inventories were synced by ".$_SESSION['userUid'];
                        $actDate = date("Y-m-j H:i:s", time());

                        $actUserID = $_SESSION['userId'];
                        $actCategoryID = 10;

                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            header ("Location: TransactSync.php?error=sqlerror3");
                            exit();
                        }
                        else {
                            mysqli_stmt_bind_param($stmt,"sssi",$actDesc, $actDate, $actUserID, $actCategoryID);
                            mysqli_stmt_execute($stmt);
                            header ("Location: ../../Transactions.php?sync=success&details=".$actDesc."&date=".$actDate."&user=".$actUserID."&cat=".$actCategoryID);
                            exit(); 
                        }    
//this part here ends the lines added by joe for the activity log                         


    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    }
    else{
        header("Location: TransactSync.php");
        exit();
    }
