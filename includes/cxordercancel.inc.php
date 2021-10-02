<?php

$cakeOID = $_GET['cakeOID'];
  include './dbh.inc.php';

  $sql = "UPDATE `cxcakeorder` SET `cakeStat` = '3' WHERE `cxcakeorder`.`cakeOrderID` = '$cakeOID';";
  $result = mysqli_query($conn, $sql);

  $sql = "UPDATE `cxcartorder` SET `cartStat` = '6' WHERE `cxcartorder`.`cartCakeOID` = '$cakeOID';";
  
  if($result = mysqli_query($conn, $sql)){
    header("Location: ../cxorder.php?success=ordercancelled");
    exit();
  }
  else{
    header("Location: ../cxorder.php?error=orderNOTcancelled");
    exit();
  }