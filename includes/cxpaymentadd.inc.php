<?php

  include './dbh.inc.php';
  $amount = $_GET['amt'];
  $refID = $_GET['refid'];
  $cakeID = $_GET['cakeOID'];
  $cnum = $_GET['cnum'];

  if(empty($amount) || empty($refID) || empty($cakeID) || empty($cnum) ){
    header("Location: ../cxpayment.php?error=emptyfields&refid=".$refID."&cake=".$cakeID);
    exit();
  }
  else{
    $sql = "INSERT INTO `payment` (`id`, `cnum`, `cakeID`, `refID`, `amount`, `stat`) VALUES (NULL, '$cnum', '$cakeID', '$refID', '$amount', '1');";
    $result = mysqli_query($conn, $sql);

    header("Location: ../cxorder.php?success=paymentaddedwait");
    exit();
  }