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
                $newCatID = $origCatID - 10;

                //retrieving the previous value of the actID and preparing a variable to be used in to delete the record referencing this existing archive 
                //$origactID = " ".$row['actID']." ";
                $fulldate = $row['actDate']; 
                $date = strtotime($fulldate); 
                $origtimestamp = date('F d, Y g:i A', $date);

                //unarchiving record by update - starts here
                $stmt = "UPDATE activity SET actCategoryID =".$newCatID." WHERE actID=".$activityID;
                $result = mysqli_query($conn, $stmt);
                //unarchiving record by update - ends here

                //deleting the record of the archiving activity to avoid redundancy - starts here
                $stmt = "DELETE FROM activity WHERE actDesc LIKE '%".$origtimestamp."'";
                $result = mysqli_query($conn, $stmt);
                //deleting the record of the archiving activity to avoid redundancy - starts here
                

                header ("Location: ../../ActivityLog.php?archiveact=success&".$activityID);
                exit();

            }
        }
        mysqli_close($conn);
        
        echo $activityID;
    }