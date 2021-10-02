<?php

session_start();
$permanentID = $_SESSION['userId'];
include './dbh.inc.php';

DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
$todayDate = date("Y-m-j H:i:s", time()); 

//add new cxinfo to contacts table, error handling for contact number
  $cxID ="CX-".date("jms")."-".date("hiy");
  $cxname = ucwords(strtolower($_GET['fname']))." ".ucwords(strtolower($_GET['lname']));
  $city = $_GET['category'];
  $barangay = $_GET['subcategory'];
  $addr = ucwords(strtolower($_GET['addr']));
  $contactnum = $_GET['cnum'];
  $cartID = $_GET['cartID'];
  
  if(empty($_GET['fname']) || empty($_GET['lname']) || empty($city) || empty($barangay) || empty($addr) || empty($contactnum) || empty($cartID)){
    header("Location: ../cxcheckout.php?error=emptyfields");
    exit();
  }
  else if (!preg_match("/^[0-9]*$/", $contactnum)) {
    header("Location: ../cxcheckout.php?error=errorcnum");
    exit();
  }
  else{
    $sql = "INSERT INTO `contact` (`cxTempID`, `cxName`, `cxAddress`, `cxBarangay`, `cxCity`, `cxContactNum`, `cxPersonID`) VALUES ('$cxID', '$cxname', '$addr', '$barangay', '$city', '$contactnum', '$permanentID')";
     mysqli_query($conn, $sql);
  
    //in cxcakerorder change cake's status into 2 and get total price
    $totalprice = 0;
    $sql = "SELECT  cxcakeorder.cakeOrderID, cxcakeorder.cakeCompPrice
    FROM cxcakeorder JOIN cxcartorder ON cxcakeorder.cakeOrderID = cxcartorder.cartCakeOID 
    WHERE cxcakeorder.cakeStat = 1 AND cxcartorder.cartCxID = '".$permanentID."' ;";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
      while ($row = mysqli_fetch_assoc($result)){ 
        $totalprice += $row['cakeCompPrice'];

        $cakeOID = $row['cakeOrderID'];
        $sql1 = "UPDATE cxcakeorder SET cakeStat = 2 WHERE cakeOrderID = '$cakeOID'";
        $result1 = mysqli_query($conn, $sql1);
      }
    }

    //in cart update cart stat into 2 , update cxtempid field, update total field, cartdate
    $sql = "UPDATE cxcartorder SET cartStat = 2 , cartCxID = '$cxID', cartTotalPrice = '$totalprice', cartDate = '$todayDate' WHERE cartOrderID = '$cartID'";
    if($result = mysqli_query($conn, $sql)){
      header("Location: ../cxorder.php?success=cartcheckedout");
    exit();
    }
  
  }
  
