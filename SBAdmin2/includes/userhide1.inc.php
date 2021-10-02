<?php
    session_start();
    include './dbh.inc.php';

    $upid = $_GET['hide-submit'];


    $sql = "UPDATE user SET userStat = 3 WHERE userPersonID = '".$upid."' ;";
    mysqli_query($conn, $sql);
   
    $sql = "SELECT person.* FROM person WHERE personID ='$upid'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            $personFname = $row['personFname'];
            $personLname= $row['personLname'];
        }
    }

    // activity log start
    $actDesc = "A user named ".$personFname." ".$personLname." was deactivated by ".$_SESSION['userUid']." ".$_SESSION['userId'];
    DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
    $actDate = date("Y-m-j H:i:s", time());

    $actUserID = $_SESSION['userId'];
    $actCategoryID = 3;

    $sql = "INSERT INTO `activity` (`actID`, `actDesc`, `actDate`, `actUserID`, `actCategoryID`) VALUES (NULL,'$actDesc','$actDate','$actUserID','$actCategoryID')"; 
    
    $result = mysqli_query($conn, $sql);
    // activity log end

    header("Location: ../../adUserManagement.php?success=userdeact&deact=".$personFname." ".$personLname);
    exit();

    mysqli_close($conn);

