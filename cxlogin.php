<?php
  $title = 'CakeHub | Login';
  include './cxnav.php';
?>

<div class="row m-0 p-0 mt-5 px-3 ">
  <div class="col-sm-2 col-lg-2 col-md-2 "></div>
  <div class="col-sm-8 col-lg-8 col-md-8  bg-light rounded-3 row m-0 p-0 ">
    <div class=" col-sm-6 col-lg-6 col-md-6  align-middle">
      <img class="w-100 p-3 bg-lpink h-100 " src="./Images/login.svg" alt="" srcset="">
    </div>
    <div class=" col-sm-6 col-lg-6 col-md-6 p-5">
      <h3 class="text-bold clr-pink">Sign in</h3>
      <form action="./includes/login.inc.php" method="get">
        <div class="form-group mt-4 p-1">
          <label for="">Username</label>
          <input type="text" class="form-control" name="uid" id="" aria-describedby="helpId" placeholder="User ID / Username" <?php if(isset($_GET['uid'])){ echo 'value="'.$_GET['uid'].'"';}?> >
        
        </div>
        <div class="form-group p-1">
          <label for="">Password</label>
          <input type="password" class="form-control" name="pwd" id="" aria-describedby="helpId" placeholder="">
        </div>
        
        <button type="submit" name="login-submit" class="btn btn-primary m-1 bg-dpink float-end mt-3" style="border-color: transparent;">Login</button>
      </form>

      
      <small class="text-muted mt-5">Don't have an account? <a href="./cxregister.php" class="link-ftr">Click here</a></small>
    </div>
  </div>
  <div class="col-sm-2 col-lg-2 col-md-2"></div>
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
    
  }
  else if(isset($_GET['success'])){
    if($_GET['success'] == 'cxregistered'){
        echo '
        
          <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
            <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
            <p class="my-4"><strong>Success! </strong>'.$_GET['cxname'].' you are registered. Please sign in to continue. </p>
            <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
          </div>

        ';
    }
    else if($_GET['success'] == 'cxdeact'){
      echo '
      
        <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
          <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
          <p class="my-4"><strong>Success! </strong> Your account was successfully deactivated. </p>
          <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
        </div>

      ';
    }
    else if($_GET['success'] == 'cxlogout'){
      echo '
      
      <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
          <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
          <p class="my-4"><strong>Success! </strong> Your account has been successfully logged out. </p>
          <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
      </div>
  
      ';
    }
  }
  include './cxfooter.php';
?>