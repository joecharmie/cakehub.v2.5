<?php

session_start();
include './dbh.inc.php';

        $id = $_GET['hide-submit'];

        $sql = "UPDATE product SET prodStat = 3 WHERE ProdID = '".$id."' ;";
        $result = mysqli_query($conn, $sql);

        $sql = "SELECT prodName FROM product WHERE prodID ='$id'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
           $pname = $row['prodName'];
        }
    }

//activity log start
                        DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');  
                        $actDesc = "The product named ".$pname." with prod id: ".$id." was deleted by ".$_SESSION['userUid']." ".$_SESSION['userId'] ;
                        $actDate = date("Y-m-j H:i:s", time());
                        
                        $actUserID = $_SESSION['userId'];
                        $actCategoryID = 6;

                        $sql = "INSERT INTO `activity` (`actID`, `actDesc`, `actDate`, `actUserID`, `actCategoryID`) VALUES (NULL,'$actDesc','$actDate','$actUserID','$actCategoryID')"; 

                        mysqli_query($conn, $sql);
//activity log end

    header ("Location: ../../adFileManagement.php?success=proddeact&prod=".$pname);
    exit();

    mysqli_close($conn);

