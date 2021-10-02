<?php
  $title = 'CakeHub | Checkout';
  
  include './cxnav.php';
  $upid = $_SESSION['userId'];
  include './includes/cxprofile.inc.php';
  if(!isset($_GET['error']) || $_GET['error'] !== 'emptyfields' || $_GET['error'] == 'invalidcnum'){
    $is_disabled = true;
  }
?>
<nav aria-label="breadcrumb " class="bg-transparent fs-5 ms-3 mt-3 " style="box-shadow: unset;">
  <ol class="breadcrumb ">
    <li class="breadcrumb-item"><a href="index.php" class="link-ftr">Home</a></li>
    <li class="breadcrumb-item active ">My Profile</li>
  </ol>
</nav>


<div class=" m-0 p-0">

  <div class="p-1  text-dark">
    <div class="card w-75 rounded-3 p-3 bg-light mx-auto">
      <form action="./includes/cxprofileedit.inc.php" method="get">
        <h3 class="text-noah my-3 fw-bold m-0">My Profile</h3>
        <hr class="w-100 m-0"> 


        <div class="row m-0 p-0">
          <div class="col-sm-6 col-lg-6 col-md-6 form-group p-1">
            <label for="">Username</label>
            <input type="text" class="form-control" name="uname" id="uname" aria-describedby="helpId" placeholder="" value="<?php echo $uname; ?>" disabled>
          </div>
          <div class=" col-sm-6 col-lg-6 col-md-6 form-group p-1">
            <button id="btnD" type="button" class="btn btn-primary m-1 bg-dpink float-end mt-3" style="border-color: transparent;" data-bs-toggle="modal" data-bs-target="#deactacct">Deactivate</button>
            <button id="btnP" type="button" class="btn btn-primary m-1 bg-dpink float-end mt-3" style="border-color: transparent;" data-bs-toggle="modal" data-bs-target="#changepass">Change Password</button>
            
            <button id="btnE" type="button" class="btn btn-primary m-1 bg-dpink float-end mt-3" style="border-color: transparent;" >Edit</button>
          </div>
        </div>

        <div class="row m-0 p-0">
          <div class="col-sm-6 col-lg-6 col-md-6 form-group p-1">
            <label for="">Firstname</label>
            <input type="text" class="form-control" name="fname" id="fname" aria-describedby="helpId" placeholder="" value="<?php echo $fname; ?>" disabled>
          </div>
          <div class=" col-sm-6 col-lg-6 col-md-6 form-group p-1">
            <label for="">Lastname</label>
            <input type="text" class="form-control" name="lname" id="lname" aria-describedby="helpId" placeholder="" value="<?php echo $lname; ?>" disabled>
          </div>
        </div>
        <?php
          include "./cxaddress.inc.php";
        ?>
        <div class="form-group">
          <label for="">Address </label>
          <textarea class="form-control w-100" style=" min-height:75px;" name="addr"  id="addr" disabled><?php echo $addr; ?></textarea>
          <small id="helpId" class="form-text text-muted">Room/Flr/Unit/Block/Street/Purok</small>
        </div>
        <div class="form-group p-1">
          <label for="">Contact Number</label>
          <input type="text" class="form-control" name="cnum" id="cnum" aria-describedby="helpId" placeholder="" value="<?php echo $cnum; ?>" disabled>
        </div>
        <div class="form-group p-1">
            <label for="">Email Address</label>
            <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="" value="<?php echo $email; ?>" disabled>
        </div>
        
        <button id="btnS" class=" w-25 btn btn-primary m-1 bg-dpink float-end mt-3  " name="upid" type="submit " style="border-color: transparent;visibility: hidden;" value="<?php echo $upid; ?>" >Confirm Edit</button> 

      </form>
      

    </div>
  </div>

</div>

<div class="modal fade" id="changepass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="./includes/cxprofilepwd.inc.php" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group mx-3">
            <label for="">Password</label>
            <input type="password" class="form-control" name="pwd" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Please use atleast one uppercased letter, character and number.</small>
          </div>
          <div class="form-group mx-3">
            <label for="">Repeat Password</label>
            <input type="password" class="form-control" name="pwdrepeat" id="" aria-describedby="helpId" placeholder="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary bg-dpink" style="border-color: transparent;" >Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="deactacct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="./includes/cxprofiledeact.inc.php" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deactivate your Account?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p><strong>Are you sure you want to deactivate your account? </strong> <br> You will not be able to login again and this cannot be undone. Also, you will be automatically logged out after confirming.</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary bg-dpink" style="border-color: transparent;" >Confirm Deactivation</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>

  let btnE = document.querySelector("#btnE");
  let btnD = document.querySelector("#btnD");
  let btnP = document.querySelector("#btnP");
  let btnS = document.querySelector("#btnS");
  let btnS1 = document.querySelector("#btnS");

  btnE.addEventListener('click', () => {
    btnE.style.visibility = "hidden";
    btnP.style.visibility = "hidden";
    btnD.style.visibility = "hidden";
    btnS.style.visibility = "visible";
    document.querySelector("#uname").disabled = false;
    document.querySelector("#fname").disabled = false;
    document.querySelector("#lname").disabled = false;
    document.querySelector("#addr").disabled = false;
    document.querySelector("#cnum").disabled = false;
    document.querySelector("#email").disabled = false;
    document.querySelector("#category").disabled = false;
    document.querySelector("#subcategory").disabled = false;

  })
</script>

<?php
if(isset($_GET['error'])){
  if($_GET['error'] == 'emptyfields' || $_GET['error'] == 'passemptyfields'){
      echo '
      
        <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
          <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
          <p class="my-4"><strong>Warning!</strong> Empty Fields</p>
          <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
        </div>

      ';
  }
  else if($_GET['error'] == 'invalidcnum'){
    echo '
    
      <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
        <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4"><strong>Warning!</strong> Invalid characters used in contact information, please use numerical digits</p>
        <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
      </div>

    ';
  }
  else if($_GET['error'] == 'passdoesntmatch'){
    echo '
    
      <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
        <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4"><strong>Warning!</strong> Password do not match</p>
        <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
      </div>

    ';
  }
  
}
else if(isset($_GET['success'])){
  if($_GET['success'] == 'profileupdated'){
      echo '
      
        <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
          <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
          <p class="my-4"><strong>Success! </strong> Your contact information is updated.  </p>
          <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
        </div>

      ';
  }
  else if($_GET['success'] == 'pwdupdated'){
    echo '
    
      <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
        <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4"><strong>Success! </strong> Your password is updated.  </p>
        <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
      </div>

    ';
  }
}
  include './cxfooter.php';
?>