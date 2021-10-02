<?php

session_start();

    include "dbh.inc.php";
    if(isset($_POST['add-submit'])){

        $pname = $_POST['pname'];
        $pdesc = $_POST['pdesc'];
        $ptype = $_POST['ptype'];
        $pprice = $_POST['pprice'];
        $pqty = $_POST['pqty'];
        $pstat = 1;
        $pimg = "not set";
        if(empty($pname) || empty($pdesc) || empty($ptype) || empty($pprice) || empty($pqty)){ 
            header("Location: ../../FileManagement.php?error=emptyfields");
            exit();
        }
        
        $sql = "INSERT INTO product
        VALUES(null, '".$pname."','".$pdesc."','".$ptype."', '".$pprice."', '".$pqty."','".$pstat."','".$pimg."');";
        
        $result = mysqli_query($conn, $sql);

        require_once 'fileaddupload.inc.php';

//this part here is added by joe for the activity log from line 88 and every line that follows

                        $sql = "INSERT INTO activity (actDesc, actDate, actUserID, actCategoryID) VALUES (?,?,?,?)"; 
                        
                        $actDesc = "A product named ".$pname." was added by ".$_SESSION['userUid'];
                        //$actDate = date("Y-m-d H:i:s");

                        $timezone  = 8; //(GMT +8:00) Philippine Standard Time
                        $actDate = gmdate("Y-m-j H:i:s", time() + 3600*($timezone+date("I")));

                        $actUserID = $_SESSION['userId'];
                        $actCategoryID = 4;

                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            header ("Location: FileAdd.php?error=sqlerror3");
                            exit();
                        }
                        else {
                            mysqli_stmt_bind_param($stmt,"sssi",$actDesc, $actDate, $actUserID, $actCategoryID);
                            mysqli_stmt_execute($stmt);
                            header ("Location: ../../FileManagement.php?add=success".$id);
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
