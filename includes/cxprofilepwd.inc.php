<?php
session_start();
include './dbh.inc.php';

$pwd =  $_POST['pwd'];
$pwdrepeat =  $_POST['pwdrepeat'];
$upid =  $_SESSION['userId'];
$hashed = password_hash($pwd, PASSWORD_DEFAULT);

if( empty($pwd) || empty($pwd)){
  header("Location: ../cxprofile.php?error=passemptyfields");
  exit();
}
else if ($pwd !== $pwdrepeat) {
  header("Location: ../cxprofile.php?error=passdoesntmatch");
  exit();
}
else{                                               

  $sql = "UPDATE user SET userPassword ='".$hashed."' WHERE userPersonID = '".$upid."' ;"; 
  mysqli_query($conn, $sql);
  
  header("Location: ../cxprofile.php?success=pwdupdated");
  exit();
}

