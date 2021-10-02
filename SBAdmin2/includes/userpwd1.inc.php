<?php
    session_start();
    include './dbh.inc.php';

    
    $upid = $_GET['reset-submit'];
    $hashedpwd = password_hash("CakeHub2021!",PASSWORD_DEFAULT);

    
    $sql = "UPDATE user SET userPassword = '$hashedpwd'  WHERE userPersonID = '$upid' ;"; 
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
     DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
     $actDesc = "The password of a user named ".$personFname." ".$personLname." was reset by ".$_SESSION['userUid']." ".$_SESSION['userId'];
     $actDate = date("Y-m-j H:i:s", time());
 
     $actUserID = $_SESSION['userId'];
     $actCategoryID = 3;
 
     $sql = "INSERT INTO `activity` (`actID`, `actDesc`, `actDate`, `actUserID`, `actCategoryID`) VALUES (NULL,'$actDesc','$actDate','$actUserID','$actCategoryID')"; 
     
     mysqli_query($conn, $sql);
     // activity log end
 

    header("Location: ../../adUserManagement.php?success=passreset&reset=".$personFname." ".$personLname);
    exit();

    mysqli_close($conn);