<?php

session_start();
    
    include "dbh.inc.php";
    if(isset($_POST['edit-submit'])){

        $id = $_POST['edit-submit'];
        
        $pname = $_POST['pname'];
        $pdesc = $_POST['pdesc'];
        $ptype = $_POST['ptype'];
        $pprice = $_POST['pprice'];
        $pqty = $_POST['pqty'];
        $pstat = $_POST['stat'];

    
        if(empty($pname) || empty($pdesc) || empty($ptype) || empty($pprice) || empty($pqty) || empty($_POST['stat'])){ 
            header("Location: ../../adFileManagement.php?error=emptyfields");
            exit();
        }

        $sql = "UPDATE product
        SET prodName = '".$pname."', prodDesc = '".$pdesc."', prodTypeID = '".$ptype."', prodPrice = '".$pprice."', prodQty = '".$pqty."', prodStat = '".$pstat."'
        WHERE ProdID='$id'";
        $result = mysqli_query($conn, $sql);


        $sql = "SELECT prodName FROM product
        WHERE prodID='$id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $pname = $row['prodName'];
            }
        }

        require_once 'fileeditupload.php';
//this part here is added by joe for the activity log from line 88 and every line that follows

                        $sql = "INSERT INTO activity (actDesc, actDate, actUserID, actCategoryID) VALUES (?,?,?,?)"; 
                        
                        DATE_DEFAULT_TIMEZONE_SET('Asia/Manila'); 
                        $actDesc = "The product named ".$pname." with product id: ".$id." was updated by ".$_SESSION['userUid']." ".$_SESSION['userId'];
                        $actDate = date("Y-m-j H:i:s", time());
                        
                        $actUserID = $_SESSION['userId'];
                        $actCategoryID = 5;

                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            header ("Location: adFileManagement.php?error=sqlerror3");
                            exit();
                        }
                        else {
                            mysqli_stmt_bind_param($stmt,"sssi",$actDesc, $actDate, $actUserID, $actCategoryID);
                            mysqli_stmt_execute($stmt);
                            header ("Location: ../../adFileManagement.php?success=produpdated&prod=".$pname);
                            exit(); 
                        }    
//this part here ends the lines added by joe for the activity log                         


    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    }
    else{
        header("Location: adFileManagement.php");
        exit();
    }
    
