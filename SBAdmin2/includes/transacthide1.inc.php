<?php
    session_start();
    include "dbh.inc.php";

    $ref = $_GET['hide-submit'];

        
    $sql = "UPDATE cxcartorder SET cartStat = 6 WHERE cartCakeOID = '".$ref."';";
    $result = mysqli_query($conn, $sql);

                    
// Activity log - Start 

    DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');       
    $actDesc = "The selected transaction: ".$_GET['hide-submit']." was deleted by ".$_SESSION['userUid']." ".$_SESSION['userId'];
    $actDate = date("Y-m-j H:i:s", time());

    $actUserID = $_SESSION['userId'];
    $actCategoryID = 8;

    $sql = "INSERT INTO `activity` (`actID`, `actDesc`, `actDate`, `actUserID`, `actCategoryID`) VALUES (NULL,'$actDesc','$actDate','$actUserID','$actCategoryID')"; 
    
    $result = mysqli_query($conn, $sql);

// Activity log - End                     

    header("Location: ../../adTransactions.php?success=transactdeact&deact=".$ref);
    exit();

    mysqli_close($conn);
