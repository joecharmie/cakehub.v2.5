<?php

session_start();

    include "dbh.inc.php";
    if(isset($_POST['add-submit'])){

        $seller = $_SESSION['userId'];
        $pname = $_POST['pname'];
        $pdesc = $_POST['pdesc'];
        $ptype = $_POST['ptype'];
        $pprice = $_POST['pprice'];
        $pqty = $_POST['pqty'];
        $pstat = 1;
        $pimg = "not set";
        
        if(empty($pname) || empty($pdesc) || empty($ptype) || empty($pprice) || empty($pqty)){ 
            header("Location: ../../adFileManagement.php?error=emptyfields");
            exit();
        }
        
        $sql = "INSERT INTO product
        VALUES(null, '".$pname."','".$pdesc."','".$ptype."', '".$pprice."', '".$pqty."', '".$seller."','".$pstat."','".$pimg."');";
        
        $result = mysqli_query($conn, $sql);

        if(isset($_FILES["THEfile"])){
            require_once 'fileaddupload.inc.php';
        }
        

        //this part here is added by joe for the activity log from line 88 and every line that follows

            $sql = "INSERT INTO activity (actDesc, actDate, actUserID, actCategoryID) VALUES (?,?,?,?)"; 
            
            DATE_DEFAULT_TIMEZONE_SET('Asia/Manila'); 
            $actDate = date("Y-m-j H:i:s", time());
            $actDesc = "A product named ".$pname." was added by ".$_SESSION['ufn']." ".$seller;
            

            $actUserID = $seller;
            $actCategoryID = 4;

            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header ("Location: FileAdd.php?error=sqlerror3");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt,"sssi",$actDesc, $actDate, $actUserID, $actCategoryID);
                mysqli_stmt_execute($stmt);
                header ("Location: ../../adFileManagement.php?success=prodadded&prod=".$pname);
                exit(); 
            }    
        //this part here ends the lines added by joe for the activity log                         


    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    }
    else{
        header("Location: FileAdd.php");
        exit();
    }
