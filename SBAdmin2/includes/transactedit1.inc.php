<?php
    session_start();
    include "dbh.inc.php";

        $ref = $_POST['edit-submit'];
        $pid = $_POST['pid'];
        $cqty = $_POST['pqty'];
        $cxname = $_POST['pcxname'];
        $stat = $_POST['stat'];

        if($stat == 0 || empty($cqty)  || empty($pid)  ||empty($cxname)){
           header("Location: ../../adTransactions.php?error=editemptyfields&stat=".$stat."&pqty=".$cqty."&pid=".$pid."&pcxname=".$cxname);
            exit();
        }

        $sql = "UPDATE cxcartorder SET cartStat = '".$stat."' WHERE cartCakeOID = '".$ref."';";
        $result = mysqli_query($conn, $sql);

        $sql = "SELECT prodPrice FROM product WHERE prodID = '".$pid."';";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $uprice = $row['prodPrice'];
            }
        }

        $newCompPrice = $uprice * $cqty;

        $sql = "UPDATE cxcakeorder SET cakeProdID = '".$pid."', cakeQty = '".$cqty."', cakeCompPrice = '".$newCompPrice."' WHERE cakeOrderID = '".$ref."' ;";
        $result = mysqli_query($conn, $sql);
        

        $sql = "SELECT cartCxID FROM cxcartorder WHERE cartCakeOID = '".$ref."';";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $cxid = $row['cartCxID'];
            }
        }

        $sql = "UPDATE contact SET cxName = '".$cxname."' WHERE cxTempID = '".$cxid."' ;";
        $result = mysqli_query($conn, $sql);
                    
// Activity log - Start 

        DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');       
        $actDesc = "The selected transaction:".$_POST['edit-submit']." was updated by ".$_SESSION['userUid']." ".$_SESSION['userId'];
        $actDate = date("Y-m-j H:i:s", time());

        $actUserID = $_SESSION['userId'];
        $actCategoryID = 9;

        $sql = "INSERT INTO `activity` (`actID`, `actDesc`, `actDate`, `actUserID`, `actCategoryID`) VALUES (NULL,'$actDesc','$actDate','$actUserID','$actCategoryID')"; 
            
        $result = mysqli_query($conn, $sql);

// Activity log - End                     

        header("Location: ../../adTransactions.php?success=transactedited&edited=".$ref);
        exit();

        mysqli_close($conn);
      
    
