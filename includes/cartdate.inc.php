<?php
require 'dbh.inc.php';
    
if(isset($_SESSION['userId'])){
  $cx = $_SESSION['userId'];
  $sql = "SELECT `cakeDelivD` FROM `cxcakeorder` JOIN cxcartorder ON cxcakeorder.cakeOrderID = cxcartorder.cartCakeOID WHERE cxcakeorder.cakeStat = 1 AND cxcartorder.cartCxID = '".$cx."'  ORDER BY `cxcakeorder`.`cakeDelivD` DESC";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
      $delivD = date("F j, Y",strtotime($row['cakeDelivD']));
    }
  }
  else{
    $delivD = "Nothing to display";
  }
  
}
else{
  $delivD = "Nothing to display";
}