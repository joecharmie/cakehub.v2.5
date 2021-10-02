<!DOCTYPE html>
<html>
<head>

<link href="SBAdmin2/css/sb-admin-2.min.css" rel="stylesheet" type="text/css">
<link href="SBAdmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="SBAdmin2/img/favicon.ico" type="image/x-icon">
<title>CakeHub</title>

<!-- bootstrap 5 and font-awesome -- start -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</head>
<body style="font-family: Arial;  
    background-image: url(SBAdmin2/img/shapes.png); 
    background-position: center; 
    background-size: cover;
    background-attachment: fixed;">
<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg" style=" margin-top: 5rem !important;">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block">
                        <img src="SBAdmin2/img/poster.png" class="w-100" >
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center" style="margin-top: 50px;">
                            <img src="SBAdmin2/img/1.png" height="80px;" >
                        </div>
                        <div class="p-5">
                        <?php 
                            if (isset($_SESSION['userId'])){
                                header("Location: addashboard.php");
                            }
                            else{
                                echo '<form class="user" action="SBAdmin2/includes/login.inc.php" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            id="usernameinput" aria-describedby="emailHelp" name="uid" placeholder="User ID / Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            id="passwordinput" name="pwd" placeholder="Password">
                                    </div>   
                                    <button type="submit" name="login-submit" class="btn btn-user btn-block" style="background-color: #001B2E; color: white;">Login</button>                                                          
                                </form>  ';
                            }

                            
                        ?>
                                                  
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
</div>

<?php

    if(isset($_GET['error'])){
        if($_GET['error'] == 'emptyfields'){
            echo '
            
            <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
                <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
                <p class="my-4"><strong>Warning!</strong> Empty Fields</p>
                <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
            </div>

            ';
        }
        else if($_GET['error'] == 'wrongpwd'){
            echo '
        
            <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
            <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
            <p class="my-4"><strong>Warning!</strong> Wrong Password</p>
            <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
            </div>

            ';
        }
        else if($_GET['error'] == 'nomatch'){
            echo '
        
            <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
            <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
            <p class="my-4"><strong>Warning!</strong> Please input correct details. There are no match from your inputs.</p>
            <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
            </div>

            ';
        }
        else if($_GET['error'] == 'nouser'){
            echo '
            
                <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
                <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
                <p class="my-4"><strong>Warning!</strong> This user does not exist.</p>
                <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
                </div>

            ';
        }
        else if($_GET['error'] == 'bypass'){
            echo '
            
                <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
                <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
                <p class="my-4"><strong>Warning!</strong> You are lost. This is not of your access.</p>
                <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
                </div>

            ';
        }
    }
    else if(isset($_GET['success'])){
        if($_GET['success'] == 'cxregistered'){
            echo '
            
            <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
                <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
                <p class="my-4"><strong>Success! </strong>'.$_GET['cxname'].' you are registered as a seller. Please sign in to continue. </p>
                <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
            </div>

            ';
        }
        else if($_GET['success'] == 'userlogout'){
            echo '
            
            <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
                <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
                <p class="my-4"><strong>Success! </strong> Your account has been successfully logged out. </p>
                <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
            </div>
        
            ';
        }
    }
?>


    <script src="SBAdmin2/vendor/jquery/jquery.min.js"></script>
    <script src="SBAdmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="SBAdmin2/js/sb-admin-2.min.js"></script>

</body>
</html>
