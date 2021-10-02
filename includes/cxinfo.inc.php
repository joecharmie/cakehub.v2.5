<?php

session_start();
$cx = $_SESSION['temporaryID'];

$name = $_GET['fname']." ".$_GET['lname'];  
$city = $_GET['category'];
$brgy = $_GET['subcategory'];
$addr = $_GET['addr'];
$cnum = $_GET['cnum'];
$total = $_GET['total'];

if(empty($_GET['fname']) || empty($_GET['lname']) || empty($cnum) ){
    header("Location: ../checkout.php?error=emptyfields");
    exit();
}
if(empty($city)){
    $city = " ";
}
if(empty($brgy)){
    $brgy = " ";
}
if(empty($addr)){
    $addr = " ";
}

require 'dbh.inc.php';

$sql = "UPDATE `cxcartorder` SET `cartTotalPrice` = '".$total."' , `cartStat` = '1' WHERE `cxcartorder`.`cartCxID` ='".$cx."'";
$result = mysqli_query($conn, $sql);

$sql = "UPDATE `cxinfo` SET `cxName` = '".$name."', `cxAddress` = '".$addr."', `cxBarangay` = '".$brgy."', `cxCity` = '".$city."', `cxContactNum` = '".$cnum."' WHERE `cxinfo`.`cxTempID` = '".$cx."'";
$result = mysqli_query($conn, $sql);


unset($_SESSION['temporaryID']);
session_unset();
session_destroy();
header("Location: ../index-1.php?add=success".$cx);
exit();