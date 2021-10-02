<?php
    session_start();
    
    if(isset($_GET['activityID'])){
        $activityID = intval($_GET['activityID']);
        
        include "dbh.inc.php";
        
        $stmt = "SELECT * FROM activity WHERE actID=". $activityID;
        $result = mysqli_query($conn, $stmt);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){
                
                //retrieving the value of the category ID and preparing the new value 
                $origCatID = intval($row['actCategoryID']); 
                $newCatID = $origCatID + 10;

                if ($newCatID == 20){
                    header("Location: ../../ActivityLog.php?archive=multiplearchive");
                    exit();

                    //because 20 means that an archive will be re-archived, it will be an endless loop. A record of an archive shouldnt be removed. Unless of course, if you dont want to display in the activity log, a record of that archive. This can still be arranged.
                }

                //retrieving the value of the complete timestamp and preparing the new value that will be displayed in the activity log and stored in the database for the activity description
                DATE_DEFAULT_TIMEZONE_SET('Asia/Manila'); 
                $fulldate = $row['actDate']; 
                $date = strtotime($fulldate); 
                $timestamp = date("Y-m-j H:i:s", time());


                //archiving record by update - starts here
                $stmt = "UPDATE activity SET actCategoryID =".$newCatID." WHERE actID=".$activityID;
                $result = mysqli_query($conn, $stmt);
                //archiving record by update - ends here

                //documenting that a user archived a record - starts here
                $sql = "INSERT INTO activity (actDesc, actDate, actUserID, actCategoryID) VALUES (?,?,?,?)"; 
                
                DATE_DEFAULT_TIMEZONE_SET('Asia/Manila'); 
                $actDesc = $_SESSION['userUid']." archived a record where activity reference number is ".$activityID. " and timestamp is ".$timestamp;
                $actDate = date("Y-m-j H:i:s", time());


                $actUserID = $_SESSION['userId'];
                $actCategoryID = 10;

                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header ("Location: FileAdd.php?error=sqlerror3");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt,"sssi",$actDesc, $actDate, $actUserID, $actCategoryID);
                    mysqli_stmt_execute($stmt); 
                }
                //documenting that a user archived a record - ends here

                header ("Location: ../../ActivityLog.php?archiveact=success");
                exit();
            }
        }
        mysqli_close($conn);
        
    }