<?php

    if(isset($_GET['reset-submit'])){
        
        require 'dbh.inc.php';
        $upid = $_GET['reset-submit'];
        $hashedpwd = password_hash("CakeHub2021!",PASSWORD_DEFAULT);
        
        $sql = "UPDATE user SET userPassword = '".$hashedpwd."'  WHERE userPersonID = '".$upid."' ;"; 
        $result = mysqli_query($conn, $sql);
   
        mysqli_close($conn);

        header("Location: ../../UserManagement.php?success=resetpwd");
        exit();    
    }

 