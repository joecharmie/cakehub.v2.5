<?php

  $cakeOID = $_GET['id'];
  include './dbh.inc.php';

  $sql = "UPDATE `cxcakeorder` SET `cakeStat` = '3' WHERE `cxcakeorder`.`cakeOrderID` = '$cakeOID';";
  
  if($result = mysqli_query($conn, $sql)){
    header("Location: ../cxcart.php?success=itemremoved");
    exit();
  }
  else{
    header("Location: ../cxcart.php?error=itemNOTremoved");
    exit();
  }