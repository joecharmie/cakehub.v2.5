<?php 
$id =  $_GET['id'];
include './dbh.inc.php';

$sql = "UPDATE payment SET stat = 3 WHERE id = '$id'";
if($result = mysqli_query($conn, $sql)){
  header("Location: ../../adTransactions.php?success=paymentremoved");
  exit();
}
else{
  header("Location: ../../adTransactions.php?error=paymentError");
  exit();
}


