<?php
//HeadAdmin | username: HeadAdmin | password: hm1234
//SampleAdmin | username: SampleAdmin | password: sa1234
//SampleBaker | username: SampleBaker | password: sb1234
//SampleSeller | username: SampleSeller | password: ss1234
//SampleViewer | username: Viewer | password: sv1234
//SampleCustomer | username: SampleCustomer | password: cx1234
session_start();

    $dbServerName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbDatabaseName = "db_cakehub";

    $conn = mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbDatabaseName);
    if (!$conn) {
        die("Connection failed: ". mysqli_connect_error());
    }

        $userID ="CX-".date("jms")."-".date("hiy");
        $userName = "SampleCustomer";
        $userRole = 5;
        $userStat = 1;
        $password = "cx1234";
        $passwordRepeat = "cx1234"; 
     
 
        if (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
            header("Location: ../../UserManagement.php?error=invaliduid");
            exit();
        }

        else if ($password !== $passwordRepeat) {
            header("Location: ../../UserManagement.php?error=passwordcheck&uid=".$userName);
            exit();
        }

        else {
            
            $sql = "SELECT userID FROM user WHERE userID=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header ("Location: ../../UserManagement.php?error=sqlerror1");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt,"s",$userID);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if( $resultCheck > 0){
                    header ("Location: ../../UserManagement.php?error=usertakenmail");
                    exit();
                }
                else{
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    $personFname = "Customer";
                    $personMname = "";
                    $personLname = "Sample"; 
                    $personImg = "not set";                             
                    $personDate = gmdate("Y-m-j H:i:s", time() + 3600*(8+date("I")));

                    $sql = "INSERT INTO person (personID, personFname, personMname, personLname, personImg, personDate) VALUES ('$userID','$personFname','$personMname','$personLname','$personImg','$personDate')"; 
                    mysqli_query($conn, $sql);                                               


                    $sql = "INSERT INTO user (userID, userName, userRoleID, userStat, userPassword, userPersonID) VALUES ('$userID','$userName','$userRole','$userStat','$hashedPwd','$userID')"; 
                    mysqli_query($conn, $sql);

                }
            }

        }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

