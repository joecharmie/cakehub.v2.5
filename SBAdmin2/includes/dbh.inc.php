<?php

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbDatabaseName = "db_cakehub";

$conn = mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbDatabaseName);
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}