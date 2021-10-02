<?php
session_start();
include './dbh.inc.php';

$uname =  $_GET['uname'];
$fname =  $_GET['fname'];
$lname =  $_GET['lname'];
$category =  $_GET['category'];
$subcategory =  $_GET['subcategory'];
$addr =  $_GET['addr'];
$cnum =  $_GET['cnum'];
$email = $_GET['email'];
$upid =  $_SESSION['userId'];


if( empty($uname) || empty($fname) || empty($lname) || empty($category) || empty($subcategory) || empty($addr) || empty($cnum) || empty($email) ){
  header("Location: ../cxprofile.php?error=emptyfields&uname=".$uname."&fname=".$fname."&lname=".$lname."&category=".$category."&subcategory=".$subcategory."&addr=".$addr."&cnum=".$cnum."&email=".$email);
  exit();
}
else if (!preg_match("/^[0-9]*$/", $cnum)) {
  header("Location: ../cxprofile.php?error=invalidcnum&uname=".$uname."&fname=".$fname."&lname=".$lname."&category=".$category."&subcategory=".$subcategory."&addr=".$addr."&email=".$email);
  exit();
}
else{
  //updating a person and user -start
  $sql = "UPDATE person SET personFname = '".$fname."', personLname = '".$lname."'  WHERE personID = '".$upid."' ;";
  mysqli_query($conn, $sql);                                               

  $sql = "UPDATE user SET userName ='".$uname."', userEmail ='".$email."'  WHERE userPersonID = '".$upid."' ;"; 
  mysqli_query($conn, $sql);

  $sql = "UPDATE `contact` SET `cxAddress` = '$addr', `cxBarangay` = '$subcategory', `cxCity` = '$category', `cxContactNum` = '$cnum' WHERE `contact`.`cxPersonID` = '$upid';";
  mysqli_query($conn, $sql);
  
  header("Location: ../cxprofile.php?success=profileupdated");
  exit();
}

