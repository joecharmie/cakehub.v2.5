<?php
    session_start();

    /*allowed users
        1 - Head Admin
        2 - Admin
        3 - Baker
        4 - Seller
        6 - Viewer
    */

    //bypass code
    if(isset($_SESSION['urid'])){
        if($_SESSION['urid'] == 1 || $_SESSION['urid'] == 2 || $_SESSION['urid'] == 3 || $_SESSION['urid'] == 4 || $_SESSION['urid'] == 6  ){
            $title = 'My Profile';
            $childView = 'Views/_MyProfile.php';
            include('_Layout.php');        
        }
        else if ($_SESSION['urid'] == 5 ){
            header("Location: adlogin.php?error=bypass");
            exit();
        }
        else{
            header("Location: adDashboard.php?error=bypass");
            exit();
        }
    }
    else{
        header("Location: adlogin.php?error=notloggedin");
        exit();
    }
    
?>
