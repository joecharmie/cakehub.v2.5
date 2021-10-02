<?php
    session_start();

    include "dbh.inc.php";

    if(isset($_POST['changepassword-submit'])) {
        $upid = $_POST['upid'];
        $newpassword = $_POST['newpassword'];
        $hashedPwd = password_hash($newpassword, PASSWORD_DEFAULT);
        
        $sql = "UPDATE user SET userPassword = '".$hashedPwd."'  WHERE userPersonID = '".$upid."' ;"; 
        $result = mysqli_query($conn, $sql);
    
        $personFname = $_POST['cfname'];
        $personLname = $_POST['clname'];

        
        $sql = "INSERT INTO activity (actDesc, actDate, actUserID, actCategoryID) VALUES (?,?,?,?)"; 
                        
        $actDesc = "A user named ".$personFname." ".$personLname." was updated by ".$_SESSION['userUid'];
        
        
        DATE_DEFAULT_TIMEZONE_SET('Asia/Manila'); 
        $actDate = date("Y-m-j H:i:s", time());
        
        $actUserID = $_SESSION['userId'];
        $actCategoryID = 2;

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header ("Location: adMyProfile.php?error=sqlerror3");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt,"sssi",$actDesc, $actDate, $actUserID, $actCategoryID);
            mysqli_stmt_execute($stmt);
            header ("Location: ../../adMyProfile.php?success=changepassword");
            exit(); 
        }    
        mysqli_stmt_close($stmt);
        mysqli_close($conn);    
    }
    if(isset($_POST['deactivate-submit'])) {
        $upid = $_POST['upid'];

        $sql = "UPDATE user SET userStat = 3 WHERE userPersonID = '".$upid."' ;"; 
        $result = mysqli_query($conn, $sql);
   
        $personFname = $_POST['dfname'];
        $personLname = $_POST['dlname'];

        
        $sql = "INSERT INTO activity (actDesc, actDate, actUserID, actCategoryID) VALUES (?,?,?,?)"; 
                        
        $actDesc = "A user named ".$personFname." ".$personLname." was updated by ".$_SESSION['userUid'];
        
        
        DATE_DEFAULT_TIMEZONE_SET('Asia/Manila'); 
        $actDate = date("Y-m-j H:i:s", time());
        
        $actUserID = $_SESSION['userId'];
        $actCategoryID = 2;

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header ("Location: adMyProfile.php?error=sqlerror3");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt,"sssi",$actDesc, $actDate, $actUserID, $actCategoryID);
            mysqli_stmt_execute($stmt);
            header ("Location: ../../adMyProfile.php?success=deactivatedprofile");
            exit(); 
        }    
        mysqli_stmt_close($stmt);
        mysqli_close($conn);    
    }
    if(isset($_POST['done-submit'])) {
        $upid = $_POST['upid'];
        $uname = $_POST['uname'];
        $stat = $_POST['stat'];
        $email = $_POST['email'];
        $cnum = $_POST['cnum'];
        $file = $_FILES['theFILE'];
        if(!empty($file)) {           
            require "profileupload.inc.php";
        }
        //update user table
        $sql = "UPDATE user SET userName = '".$uname."', userStat = '".$stat."', userEmail = '".$email."', userNum = '".$cnum."' WHERE userPersonID = '".$upid."' ;"; 
        $result = mysqli_query($conn, $sql);
        
        //update person id
        $personFname = $_POST['fname'];
        $personMname = $_POST['mname'];
        $personLname = $_POST['lname'];


        $bakeryname = $_POST['bakeryname'];
        $gcash = $_POST['gcash'];
        $paymaya = $_POST['paymaya'];
        $coins = $_POST['coins'];

        $sql = "UPDATE person SET personFname = '".$personFname."', personMname = '".$personMname."', personLname = '".$personLname."', personBakeryName = '".$bakeryname."', personGcash = '".$gcash."', personPaymaya = '".$paymaya."', personCoinsPH = '".$coins."' WHERE personId = '".$upid."' ;"; 
        $result = mysqli_query($conn, $sql);

        $barangay = $_POST['barangayname'];
        $city = $_POST['cityname'];
        

        $sql = "UPDATE contact SET cxBarangay = '".$barangay."', cxCity = '".$city."' WHERE cxPersonId = '".$upid."' ;"; 
        $result = mysqli_query($conn, $sql);

       


        $sql = "INSERT INTO activity (actDesc, actDate, actUserID, actCategoryID) VALUES (?,?,?,?)"; 
                        
        $actDesc = "A user named ".$personFname." ".$personLname." was updated by ".$_SESSION['userUid'];
        
        DATE_DEFAULT_TIMEZONE_SET('Asia/Manila'); 
        $actDate = date("Y-m-j H:i:s", time());
        
        $actUserID = $_SESSION['userId'];
        $actCategoryID = 2;

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header ("Location: adMyProfile.php?error=sqlerror3");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt,"sssi",$actDesc, $actDate, $actUserID, $actCategoryID);
            mysqli_stmt_execute($stmt);
            header ("Location: ../../adMyProfile.php?success=profileupdated");
            exit(); 
        }    
        mysqli_stmt_close($stmt);
        mysqli_close($conn);    

    }
?>