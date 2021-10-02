<?php

  $newQty = $_GET['qty'];
  $cakeOID = $_GET['id'];
  include './dbh.inc.php';

  $sql = "SELECT product.prodPrice FROM product JOIN cxcakeorder ON product.prodID = cxcakeorder.cakeProdID  WHERE cxcakeorder.cakeOrderID = '".$cakeOID."'";

  $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
      while ($row = mysqli_fetch_assoc($result)){
        $price = $row['prodPrice'];
      }
    }
  $newCompPrice = $newQty * $price;



  $sql = "UPDATE `cxcakeorder` SET `cakeQty` = '$newQty', `cakeCompPrice` = '$newCompPrice' WHERE `cxcakeorder`.`cakeOrderID` = '$cakeOID'";
  
  if($result = mysqli_query($conn, $sql)){
    header("Location: ../cxcart.php?success=itemqtyupdated");
    exit();
  }
  else{
    header("Location: ../cxcart.php?error=itemqtyNOTupdated");
    exit();
  }