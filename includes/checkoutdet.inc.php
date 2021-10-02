<?php
    require './includes/dbh.inc.php';
    
    if(isset($_SESSION['userId'])){
      $cx = $_SESSION['userId'];
      $totalprice = 0;
      $sql = "SELECT  product.prodName, cxcakeorder.cakeQty, cxcakeorder.cakeCompPrice, cxcartorder.cartOrderID
      FROM product JOIN cxcakeorder ON product.prodID = cxcakeorder.cakeProdID 
      JOIN cxcartorder ON cxcakeorder.cakeOrderID = cxcartorder.cartCakeOID 
      WHERE cxcakeorder.cakeStat = 1 AND cxcartorder.cartCxID = '".$cx."' ;";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){              
          // $name = strtoupper($row['prodName']);    
          // $qty = $row['cakeQty'];
          // $price = number_format($row['cakeCompPrice']);              
          $cartid = strtoupper($row['cartOrderID']);
          $totalprice += $row['cakeCompPrice'];

        }
      }

      $sql = "SELECT COUNT(`cakeDelivD`) FROM `cxcakeorder` JOIN cxcartorder ON cxcakeorder.cakeOrderID = cxcartorder.cartCakeOID WHERE cxcakeorder.cakeStat = 1 AND cxcartorder.cartCxID = '".$cx."'  ORDER BY `cxcakeorder`.`cakeDelivD` DESC";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
          $count =$row ['COUNT(`cakeDelivD`)'];
        }
      }
      $shipfee = $count * 50;
    }