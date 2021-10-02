<?php
    include "./SBAdmin2/includes/dbh.inc.php";
    //get roleid to determine access, and get first name to display in layout
    $personID = $_SESSION['userId'];
    $sql = "SELECT person.personFname FROM person WHERE personID = '$personID'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            $_SESSION['ufn'] = $row['personFname']; //user first name
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <style>

        @font-face {
        font-family: NoahRegular;
        src: url(SBAdmin2/vendor/fonts/Noah-Regular.ttf);

        }
        @font-face {
        font-family: NoahBold;
        src: url(SBAdmin2/vendor/fonts/Noah-Bold.ttf);

        }

    </style>




    <!-- bootstrap 5 and font-awesome -- start -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>


    <link href="SBAdmin2/css/sb-admin-2.min.css" rel="stylesheet" type="text/css">
    <link href="SBAdmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="SBAdmin2/img/favicon.ico" type="image/x-icon">
    <title><?php echo $title; ?></title>
    
    <!-- jquery - start -->
    <script src="jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>
    <!-- jquery - end -->

</head>

<body id="page-top" style="font-family: NoahBold;">
 <!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #001B2E;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="adDashboard.php" style="background-color: white;">
        <div class="sidebar-brand-icon">
            <img src="SBAdmin2/img/C.png" height="40px;">
        </div>
        <div class="sidebar-brand-text mx-1">
            <img src="SBAdmin2/img/CH.png" height="40px;">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="adDashboard.php">
            <i class="fas fa-fw fa-tachometer-alt" style="color: #ADB6C4"></i>
            <span style="color: #ADB6C4">Dashboard</span></a>
    </li>
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - My Profile -->
    <li class="nav-item active">
        <a class="nav-link" href="adMyProfile.php">
            <i class="fas fa-fw fa-user" style="color: #ADB6C4"></i>
            <span style="color: #ADB6C4">My Profile</span></a>
    </li>
    

    <hr class="sidebar-divider my-0">
    <!-- Nav Item - User Management -->
    <?php
        if($_SESSION['urid'] == 1 || $_SESSION['urid'] == 2 || $_SESSION['urid'] == 6  ){
            echo '
                <li class="nav-item active">
                    <a class="nav-link" href="adUserManagement.php">
                        <i class="fas fa-fw fa-users" style="color: #ADB6C4"></i>
                        <span style="color: #ADB6C4">User Management</span></a>
                </li>
                <hr class="sidebar-divider my-0">
            ';
        }
    ?>

    <!-- Nav Item - Product Management -->
    <?php
        if($_SESSION['urid'] == 1 || $_SESSION['urid'] == 2 ||  $_SESSION['urid'] == 3 || $_SESSION['urid'] == 4 || $_SESSION['urid'] == 6  ){
            echo '
                <li class="nav-item active">
                    <a class="nav-link" href="adFileManagement.php">
                        <i class="fas fa-fw fa-file" style="color: #ADB6C4"></i>
                        <span style="color: #ADB6C4">Product Management</span></a>
                </li>
                <hr class="sidebar-divider my-0">
            ';
        }
    ?>

    
    <!-- Nav Item - Transactions -->
    <?php
        if($_SESSION['urid'] == 1 || $_SESSION['urid'] == 2 || $_SESSION['urid'] == 3 || $_SESSION['urid'] == 4 || $_SESSION['urid'] == 6  ){
            echo '
                <li class="nav-item active">
                    <a class="nav-link" href="adTransactions.php">
                        <i class="fas fa-fw fa-edit" style="color: #ADB6C4"></i>
                        <span style="color: #ADB6C4">Transactions</span></a>
                </li>
                <hr class="sidebar-divider my-0">
            ';
        }
    ?>

    <!-- Nav Item - Activity Log -->
    <?php
        if($_SESSION['urid'] == 1 || $_SESSION['urid'] == 2 || $_SESSION['urid'] == 6  ){
            echo '
                <li class="nav-item active">
                    <a class="nav-link" href="adActivityLog.php">
                        <i class="fas fa-fw fa-list-alt" style="color: #ADB6C4"></i>
                        <span style="color: #ADB6C4">Activity Log</span></a>
                </li>
            ';
        }
    ?>
    
    <?php
        if($_SESSION['urid'] == 1 || $_SESSION['urid'] == 2 || $_SESSION['urid'] == 6  ){
            echo '
                <hr class="sidebar-divider my-0">
                <li class="nav-item active">
                    <a class="nav-link" href="adAbout.php">
                        <i class="fas fa-fw fa-info-circle" style="color: #ADB6C4"></i>
                        <span style="color: #ADB6C4">About CakeHub</span></a>
                </li>
               
            ';
        }
    ?>


    
    </li>
    <!-- Nav Item - Transactions -->

    <!-- Divider -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
        <div id="content">
        <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-color: white;">
        <ul class="navbar-nav ml-auto">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle">
                <i class="fa fa-bars"></i>
            </button>            
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline large" style="color: #001B2E;">
                    <?php
                        
                        echo $_SESSION['ufn'];
                    ?>
                    </span>

                    <?php require 'SBAdmin2/includes/userdisp.inc.php'; //echo $src; ?> 

                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown" style="background-color: white;">                                     
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2" style= "color: #001B2E;"></i>
                        <span style="color: #001B2E;">Change Password</span>
                    </a>
                    
                    <a href="SBAdmin2/includes/logout.inc.php" class="dropdown-item"><span>
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2" style= "color: #001B2E;"></i>
                        Logout</span></a>
                </div>
            </li>
            </ul>
            </nav>
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"><?php //echo $title; ?></h1>                   
                </div>
                <!-- Content Row -->
                <?php include($childView); ?>

            </div>
        </div>
    </div>

</div>




    <script src="SBAdmin2/vendor/jquery/jquery.min.js"></script>
    <script src="SBAdmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="SBAdmin2/js/sb-admin-2.min.js"></script>
    
    <!-- View Modals - Start -->
    <script>
        if(modalViewUser){
            $('#ModalViewUser').modal('show');
        }     
    </script>
    <script>
        if(modalViewTransaction){
            $('#ModalViewTransaction').modal('show');
        }     
    </script>
    <script>
        if(modalViewProduct){
            $('#ModalViewProduct').modal('show');
        }     
    </script>
    <!-- View Modals - End -->
    
    <!-- Login Modals - Start -->
    <script>
        if(alertEmptyFields == true){
            $('#alertEmptyFields').modal('show');           
        }       
    </script>
    <script>
        if(alertInvalidUsername == true){
            $('#alertInvalidUsername').modal('show');           
        }       
    </script>
     <script>
        if(alertInvalidNotNumber == true){
            $('#alertInvalidNotNumber').modal('show');           
        }       
    </script>
    <script>
        if(alertPasswordCheck == true){
            $('#alertPasswordCheck').modal('show');           
        }       
    </script>
    <script>
        if(alertPasswordCheck == true){
            $('#alertPasswordCheck').modal('show');           
        }       
    </script>
    <!-- Login Modals - End -->

    <!-- User Modals - Start -->
    <script>
        if(alertUsernameTaken == true){
            $('#alertUsernameTaken').modal('show');           
        }       
    </script>
    <script>
        if(alertUserAdded == true){
            $('#alertUserAdded').modal('show');           
        }       
    </script>
    <script>
        if(alertUserLogout == true){
            $('#alertUserLogout').modal('show');           
        }       
    </script>
    <script>
        if(alertUserUpdated == true){
            $('#alertUserUpdated').modal('show');           
        }       
    </script>
    <script>
        if(alertPassReset == true){
            $('#alertPassReset').modal('show');           
        }       
    </script>
    <script>
        if(alertUserDeact == true){
            $('#alertUserDeact').modal('show');           
        }       
    </script>
    <!-- User Modals - End -->

    <!-- Product Modals - Start -->
    <script>
        if(alertProdAdded == true){
            $('#alertProdAdded').modal('show');           
        }       
    </script>
    <script>
        if(alertProdUpdated == true){
            $('#alertProdUpdated').modal('show');           
        }       
    </script>
    <script>
        if(alertProdDeleted == true){
            $('#alertProdDeleted').modal('show');           
        }       
    </script>
    <script>
        if(alertError == true){
            $('#alertError').modal('show');           
        }       
    </script>  
    <script>
        if(alertWorking == true){
            $('#alertWorking').modal('show');           
        }       
    </script>  
    <!-- Product Modals - End -->    
    
    <!-- Upload Modals - Start -->
    <script>
        if(alertExtensionNotAllowed == true){
            $('#alertExtensionNotAllowed').modal('show');           
        }       
    </script>
    <script>
        if(alertFileTooLarge == true){
            $('#alertFileTooLarge').modal('show');           
        }       
    </script>
    <script>
        if(alertPictureUpload == true){
            $('#alertPictureUpload').modal('show');           
        }       
    </script>
    <!-- Upload Modals - End -->

    <!-- Transaction Modals - Start -->
     <script>
        if(alertSyncTransact == true){
            $('#alertSyncTransact').modal('show');           
        }       
    </script>
    <script>
        if(alertTransactUpdated == true){
            $('#alertTransactUpdated').modal('show');           
        }       
    </script>
    <script>
        if(alertTransactDeact == true){
            $('#alertTransactDeact').modal('show');           
        }       
    </script>
    <script>
        if(alertPaymentApproved == true){
            $('#alertPaymentApproved').modal('show');           
        }       
    </script>
    <script>
        if(alertPaymentRemoved == true){
            $('#alertPaymentRemoved').modal('show');           
        }       
    </script>
    <script>
        if(alertPaymentError == true){
            $('#alertPaymentError').modal('show');           
        }       
    </script>
    <!-- Transaction Modals - End -->

    <!-- My Profile Modals - Start -->
    
    <script>
        if(alertMyProfileError2 == true){
            $('#alertMyProfileError2').modal('show');           
        }       
    </script>
    <script>
        if(alertErrorUploadingPic == true){
            $('#alertErrorUploadingPic').modal('show');           
        }       
    </script>   
    <script>
        if(alertMyProfileEdited == true){
            $('#alertMyProfileEdited').modal('show');           
        }       
    </script>
    <script>
        if(alertChangePassword == true){
            $('#alertChangePassword').modal('show');           
        }       
    </script>   
    <script>
        if(alertDeactivateProfile == true){
            $('#alertDeactivateProfile').modal('show');           
        }       
    </script>
    <!-- My Profile Modals - End -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>   
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#UserManagementTable').DataTable();
             var modalViewUser = false;
        } );
    </script> 

    <script>
        $(document).ready(function() {
            $('#TransactionsTable').DataTable();
            var modalViewTransaction = false;
        } );
    </script>

    <script>
        $(document).ready(function() {
            $('#FileManagementTable').DataTable();
            var modalViewProduct = false;
        } );
    </script>
</body>
</html>
