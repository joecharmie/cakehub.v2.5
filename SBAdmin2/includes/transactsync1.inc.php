<?php

session_start();

    include "dbh.inc.php";

    $id = $_POST['sync-submit'];
                    
//this part here is added by joe for the activity log from line 88 and every line that follows

                DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');        
                $actDesc = "The inventories were synced by ".$_SESSION['userUid'];
                $actDate = date("Y-m-j H:i:s", time());

                $actUserID = $_SESSION['userId'];
                $actCategoryID = 10;

                $sql = "INSERT INTO `activity` (`actID`, `actDesc`, `actDate`, `actUserID`, `actCategoryID`) VALUES (NULL,'$actDesc','$actDate','$actUserID','$actCategoryID')"; 
                $result = mysqli_query($conn, $sql);
                //this part here ends the lines added by joe for the activity log   
    
                header ("Location: ../../adTransactions.php?success=sync&details=".$actDesc."&date=".$actDate."&user=".$actUserID."&cat=".$actCategoryID);
                exit(); 
    
                mysqli_close($conn);
    
    
