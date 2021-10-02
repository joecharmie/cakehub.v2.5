<?php

session_start();

    include "dbh.inc.php";
    if(isset($_POST['edit-submit'])){

        $ref = $_POST['edit-submit'];

        $pid = $_POST['pid'];
        $cqty = $_POST['pqty'];
        $cxname = $_POST['pcxname'];
        $stat = $_POST['stat'];

        if($stat == 0){
            header("Location: ../../Transactions.php?error=status");
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

        $sql = "UPDATE cxinfo SET cxName = '".$cxname."' WHERE cxTempID = '".$cxid."' ;";
        $result = mysqli_query($conn, $sql);
                    
//this part here is added by joe for the activity log from line 88 and every line that follows

                        $sql = "INSERT INTO activity (actDesc, actDate, actUserID, actCategoryID) VALUES (?,?,?,?)"; 
                        
                        DATE_DEFAULT_TIMEZONE_SET('Asia/Manila'); 
                        $actDesc = "The selected transaction:".$_POST['edit-submit']." was updated by ".$_SESSION['userUid'];
                        $actDate = date("Y-m-j H:i:s", time());

                        $actUserID = $_SESSION['userId'];
                        $actCategoryID = 9;

                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            header ("Location: TransactEdit.php?error=sqlerror3");
                            exit();
                        }
                        else {
                            mysqli_stmt_bind_param($stmt,"sssi",$actDesc, $actDate, $actUserID, $actCategoryID);
                            mysqli_stmt_execute($stmt);
                            header ("Location: ../../Transactions.php?edit=success");
                            exit(); 
                        }    
//this part here ends the lines added by joe for the activity log                         


    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    }
    else{
        header("Location: TransactEdit.php");
        exit();
    }
