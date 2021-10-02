<?php
   
    require 'dbh.inc.php';
    session_start();

    
    //preparing variables
        $cake = $_GET['cake'];
        $delivD = $_GET['deliverydate'];

        if( $_GET['deliverytime'] == 'A'){
            $delivT = "11AM - 1PM";
        }
        elseif ( $_GET['deliverytime'] == 'B'){
            $delivT = "1PM - 3PM";
        }
        elseif ( $_GET['deliverytime'] == 'C'){
            $delivT = "3PM - 5PM";
        }
        elseif ( $_GET['deliverytime'] == 'D'){
            $delivT = "5PM - 7PM";
        }
        else{
            $delivT = "";
        }

        $qty = $_GET['qty'];
        $candle = $_GET['candle'];
        
        
        $sql = "SELECT prodPrice from product where ProdID =".$cake;
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $cprice = $qty * $row['prodPrice'];
            }
        }
    
        $cakeOID = date("Ymdhis");
        $currdate = date("Y-m-d");
    if(!isset($_SESSION['userId'])){
        header("Location: ../cxcakeview.php?error=notsignedin&cake=".$cake);
        exit();
    }
    else if(empty($cake) || empty($delivD) || empty($delivT) || empty($qty)){
        header("Location: ../cxcakeview.php?error=emptyfields&cake=".$cake);
        exit();
    }
    else{
        
        $cx = $_SESSION['userId'];

        //get the most recent cart
        $sql = "SELECT cartOrderID FROM cxcartorder WHERE cartStat = '1' AND cartCxID = '".$cx."'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $cartID = $row['cartOrderID'];
            }
        }
        if(empty($cartID)){
            $cartID = "cart-".$cakeOID;
        }
        //adding the details into the cxcakeorder table
            //cake stat 1 = not yet checked out

            $sql = "INSERT INTO `cxcakeorder` (`cakeOrderID`, `cakeProdID`, `cakeDelivD`, `cakeDelivT`, `cakeQty`, `cakeCandlesQty`, `cakeCompPrice`, `cakeStat`) VALUES ('".$cakeOID."', '".$cake."', '".$delivD."', '".$delivT."', '".$qty."', '".$candle."', '$cprice', '1');";
            $result = mysqli_query($conn, $sql);

        //adding info to cxcartorder
            $sql = "INSERT INTO `cxcartorder` (`id`, `cartOrderID`, `cartCakeOID`, `cartCustomOID`, `cartTotalPrice`, `cartDate`, `cartCxID`, `cartPaymentRefID`, `cartStat`, `cartInstructions`) VALUES (NULL, '".$cartID."', '".$cakeOID."', NULL, NULL, NULL, '".$cx."', '', '1', NULL);";
            $result = mysqli_query($conn, $sql);

        header("Location: ../cxcart.php?success=cakeaddedtocart&cx=".$cx);

    } //else not empty fields

    mysqli_close($conn);
    
    
    
