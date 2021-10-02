<?php
    if (!isset($_GET['login-submit'])){
        header("Location: ../cxlogin.php?error=emptyfields");
        exit();
    }
    else{
        require "dbh.inc.php";

        $uid = $_GET['uid']; //username or uid
        $password = $_GET['pwd'];

        if (empty($uid) || empty($password)){
            header("Location: ../cxlogin.php?error=emptyfields&uid=".$uid);
            exit();
        }
        else {
            $sql = "SELECT * FROM user WHERE (userID=? OR userName=? ) AND userStat = 1 AND userRoleID= 5";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../cxlogin.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt,"ss",$uid,$uid);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($result)){
                    $pwdCheck = password_verify($password,$row['userPassword']);
                    if($pwdCheck == false){
                        header("Location: ../cxlogin.php?error=wrongpwd&uid=".$uid);
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

                        header("Location: ../cxorder.php?success=cxlogin");

                        exit();
                    }
                    else{
                        header("Location: ../cxlogin.php?error=nomatch");
                        exit();
                    }
                }
                else {
                    header("Location: ../cxlogin.php?error=nouser");
                    exit();
                }
            }

        }
    }