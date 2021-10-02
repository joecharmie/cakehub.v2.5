<?php
    if (!isset($_POST['login-submit'])){
        header("Location: ../login.php");
        exit();
    }
    else{
        require "dbh.inc.php";

        $uid = $_POST['uid']; //username or uid
        $password = $_POST['pwd'];

        if (empty($uid) || empty($password)){
            header("Location: ../../adlogin.php?error=emptyfields");
            exit();
        }
        else {
            $sql = "SELECT * FROM user WHERE (userID=? OR userName=? ) AND userStat = 1";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../adlogin.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt,"ss",$uid,$uid);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($result)){
                    $pwdCheck = password_verify($password,$row['userPassword']);
                    if($pwdCheck == false){
                        header("Location: ../../adlogin.php?error=wrongpwd");
                        exit();
                    }
                    else if ($pwdCheck == true){
                        session_start();
                        
                        $_SESSION['userId'] = $row['userID'];
                        $_SESSION['userUid'] = $row['userName'];                       

                       
                        //get roleid to determine access, and get first name to display in layout
                        $personID = $_SESSION['userId'];
                        $sql = "SELECT userRoleID FROM user WHERE userPersonID = '$personID'";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0){
                            while ($row = mysqli_fetch_assoc($result)){
                                $_SESSION['urid'] = $row['userRoleID']; //user role id
                            }
                        }

                        header("Location: ../../adDashboard.php?login=success&session=".$_SESSION['urid']);

                        exit();
                    }
                    else{
                        header("Location: ../../adlogin.php?error=wrongpwd");
                        exit();
                    }
                }
                else {
                    header("Location: ../../adlogin.php?error=nouser");
                    exit();
                }
            }

        }
    }