<?php
session_start();
include './dbh.inc.php';
$upid =  $_SESSION['userId'];

$sql = "UPDATE user SET userStat ='3' WHERE userPersonID = '".$upid."' ;"; 
mysqli_query($conn, $sql);

session_unset();
session_destroy();
header("Location: ../cxlogin.php?success=cxdeact");
exit();
