<?php 
$id =  $_GET['id'];
$cakeID =  $_GET['cakeID'];
$refID =  $_GET['refID'];
include './dbh.inc.php';

$sql = "UPDATE payment SET stat = 2 WHERE id = '$id'";
if($result = mysqli_query($conn, $sql)){
  $sql = "UPDATE cxcartorder SET cartStat = 3, cartPaymentRefID = '$refID' WHERE cartCakeOID = '$cakeID'";
  if($result = mysqli_query($conn, $sql)){
    header("Location: ../../adTransactions.php?success=paymentapproved");
    exit();
  }
  else{    
    header("Location: ../../adTransactions.php?error=paymentError");
    exit();
  }
}
else{
  header("Location: ../../adTransactions.php?error=paymentError");
  exit();
}


