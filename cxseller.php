<?php
  $title = 'CakeHub | Be a Seller!';
  include './cxnav.php';
?>

<div class="row m-0 p-0 mt-5 px-3 ">
  <div class="col-sm-2 col-lg-2 col-md-2 "></div>
  <div class="col-sm-8 col-lg-8 col-md-8  bg-light rounded-3 row m-0 p-0 ">
    <div class=" col-sm-6 col-lg-6 col-md-6  align-middle">
      <img class="w-100 p-3 bg-lpink h-100 " src="./Images/seller.svg" alt="" srcset="">
    </div>
    <div class=" col-sm-6 col-lg-6 col-md-6 p-5">
      <h3 class="text-bold clr-pink">Be A Seller!</h3>

      <form action="./includes/slregister.inc.php" method="get">
   
        <div class="row m-0 p-0">
          
          <div class="col-sm-6 col-lg-6 col-md-6 form-group p-1">
            <label for="">Firstname</label>
            <input type="text" class="form-control" name="fname" id="" aria-describedby="helpId" placeholder="" <?php  if(isset($_GET['fname'])){ echo "value='".$_GET['fname']."'";}?> >
          </div>
          <div class=" col-sm-6 col-lg-6 col-md-6 form-group p-1">
            <label for="">Lastname</label>
            <input type="text" class="form-control" name="lname" id="" aria-describedby="helpId" placeholder="" <?php  if(isset($_GET['lname'])){ echo "value='".$_GET['lname']."'";}?> >
          </div>
          <div class="form-group p-1">
            <label for="">Email Address</label>
            <input type="text" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="" <?php if(isset($_GET['email'])){ echo "value='".$_GET['email']."'"; }?> >
            
          </div>
          <div class="form-group p-1">
            <label for="">Bakery Name</label>
            <input type="text" class="form-control" name="bname" id="" aria-describedby="helpId" placeholder="" <?php if(isset($_GET['bname'])){ echo "value='".$_GET['bname']."'"; }?> >
            <p class="form-text text-muted m-0 p-0">
              <small>
                Please don't use an apostrophe or single quote symbol ( ' ).
              </small>
            </p>
          
          </div>
        </div>
        <?php
          include "./cxaddress.inc.php";
        ?>
        <div class="form-group">
          <label for="">Address </label>
          <textarea class="form-control w-100" style=" min-height:75px;" name="addr" id="pdesc"><?php  if(isset($_GET['addr'])){  echo $_GET['addr'];}?> </textarea>
          <small id="helpId" class="form-text text-muted">Room/Flr/Unit/Block/Street/Purok</small>
        </div>
        <div class="form-group p-1">
          <label for="">GCash</label>
          <input type="text" class="form-control" name="gcash" id="" aria-describedby="helpId" placeholder="(if any)" <?php  if(isset($_GET['gcash'])){  echo "value='".$_GET['gcash']."'";}?> >
        </div>
        <div class="form-group p-1">
          <label for="">Paymaya</label>
          <input type="text" class="form-control" name="paymaya" id="" aria-describedby="helpId" placeholder="(if any)" <?php  if(isset($_GET['paymaya'])){  echo "value='".$_GET['paymaya']."'";}?> >
        </div>
        <div class="form-group p-1">
          <label for="">Coins.PH</label>
          <input type="text" class="form-control" name="coins" id="" aria-describedby="helpId" placeholder="(if any)" <?php  if(isset($_GET['coins'])){  echo "value='".$_GET['coins']."'";}?> >
        </div>
        <div class="form-group p-1">
          <label for="">Contact Number</label>
          <input type="text" class="form-control" name="contactnum" id="" aria-describedby="helpId" placeholder="" <?php  if(isset($_GET['contactnum'])){  echo "value='".$_GET['contactnum']."'";}?> >
        </div>
        
        <hr>
        
        <div class="form-group mt-4 p-1">
          <label for="">Username</label>
          <input type="text" class="form-control" name="uname" id="" aria-describedby="helpId" placeholder="" <?php if(isset($_GET['uname'])){ echo "value='".$_GET['uname']."'"; }?> >
        
        </div>
        <div class="row m-0 p-0 ">
          <div class="col-sm-6 col-lg-6 col-md-6 form-group p-1 ">
            <label for="">Password</label>
            <input type="password" class="form-control" name="pwd" id="" aria-describedby="helpId" placeholder="">
          </div>
          <div class=" col-sm-6 col-lg-6 col-md-6 form-group p-1">
            <label for="">Repeat Password</label>
            <input type="password" class="form-control" name="pwd-repeat" id="" aria-describedby="helpId" placeholder="">
          </div>
        </div>
        <div class="row m-0 p-0" id="passwordMatchDiv" style="display: none;">
          <div class="col-sm-6 col-lg-6 col-md-6 p-1">
          </div>
          <div class="col-sm-6 col-lg-6 col-md-6 p-1">
              <label id="passwordMatch2" class="form-control-static" style="font-weight: normal; color: red; font-size: 14px;"></label>
          </div>
        </div>
        <div class="row m-0 p-0 ">
          <div class="col-sm-12 col-lg-12 col-md-12 p-1 ">
            <div class="col-md-12 mb-2">
              <label class="form-control-static" style="font-size: 15px;"> In order to protect your account, make sure:</label>
            </div>
            <div class="col-md-12">
              <label id="hasCapitalLetters" class="form-control-static" style="font-style: italic; opacity: 0.8; font-size: 14px;"><i id="iCapLetter"></i> Password must contain a capital letter</label>
            </div>
            <div class="col-md-12">
              <label id="hasNumber" class="form-control-static" style="font-style: italic; opacity: 0.8; font-size: 14px;"><i id="iNum"></i> Password must contain a number</label>
            </div>
            <div class="col-md-12">
              <label id="hasSpecialCharacter" class="form-control-static" style="font-style: italic; opacity: 0.8; font-size: 14px;"><i id="iSpecialChar"></i> Password must contain a special character</label>
            </div>
            <div class="col-md-12">
              <label id="characterLength" class="form-control-static" style="font-style: italic; opacity: 0.8; font-size: 14px;"><i id="iCharLength"></i> Password must be at least 8 characters</label>
            </div>

          </div>
        </div>

        <button type="submit" class="btn btn-primary m-1 bg-dpink float-end mt-3" style="border-color: transparent;" id="btnSubmit">Register</button>

      </form>
      
      
      <br><br><br>
      <small class="text-muted mt-5">Already have an account? <a href="./cxlogin.php" class="link-ftr">Click here</a></small>
    </div>
  </div>
  <div class="col-sm-2 col-lg-2 col-md-2"></div>
</div>
<script type="text/JavaScript">
var isValidCap = 0;
var isValidNum = 0;
var isValidLength = 0;
var isValidSpecialChar = 0;
$(document).ready(function() {
  $('#btnSubmit').prop('disabled', 'disabled');
  $('#iCapLetter').addClass("fas fa-times");
  $('#iNum').addClass("fas fa-times");
  $('#iSpecialChar').addClass("fas fa-times");
  $('#iCharLength').addClass("fas fa-times");  
  document.getElementById('iCapLetter').style.color = "red";
  document.getElementById('iNum').style.color = "red";
  document.getElementById('iSpecialChar').style.color = "red";
  document.getElementById('iCharLength').style.color = "red";
  isValidCap = 0;
  isValidNum = 0;
  isValidLength = 0;
  isValidSpecialChar = 0;
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
$("[name=pwd]").on('keyup', function (event) {
    if($("[name=pwd]").val() !== null && $("[name=pwd]").val() !== '' && $("[name=pwd]").val() !== undefined) {
        if(this.value.length >= 8) {          
            isValidLength = 1
            document.getElementById('iCharLength').style.color = "green";
            document.getElementById('characterLength').style.textDecoration = "line-through";
            $('#iCharLength').removeClass("fas fa-times").addClass("fas fa-check");   
            $('#btnSubmit').prop('disabled', 'disabled');
        }
        else {
            isValidLength = 0;
            document.getElementById('characterLength').style.textDecoration = "none";
            document.getElementById('iCharLength').style.color = "red";
            $('#iCharLength').removeClass("fas fa-check").addClass("fas fa-times");   
            $('#btnSubmit').prop('disabled', 'disabled');
        }
        if (this.value.match(/[A-Z]/)) {
            isValidCap = 1;
            document.getElementById('hasCapitalLetters').style.textDecoration =  "line-through";
            document.getElementById('iCapLetter').style.color = "green";
            $('#iCapLetter').removeClass("fas fa-times").addClass("fas fa-check");   
            $('#btnSubmit').prop('disabled', 'disabled');
        }
        else {        
            isValidCap = 0;
            document.getElementById('hasCapitalLetters').style.textDecoration = "none";
            document.getElementById('iCapLetter').style.color = "red";
            $('#iCapLetter').removeClass("fas fa-check").addClass("fas fa-times");   
            $('#btnSubmit').prop('disabled', 'disabled');
        }
        if (this.value.match(/[0-9]/)) {
            isValidNum = 1;
            document.getElementById('hasNumber').style.textDecoration = "line-through";
            document.getElementById('iNum').style.color = "green";
            $('#iNum').removeClass("fas fa-times").addClass("fas fa-check");   
            $('#btnSubmit').prop('disabled', 'disabled');
        }
        else {        
            isValidNum = 0;
            document.getElementById('hasNumber').style.textDecoration = "none";
            document.getElementById('iNum').style.color = "red";
            $('#iNum').removeClass("fas fa-check").addClass("fas fa-times");   
            $('#btnSubmit').prop('disabled', 'disabled');
        }
        if(this.value.match(/[!@#\$%\^\&*\)\(+=._-]/)) {
            isValidSpecialChar = 1;
            document.getElementById('hasSpecialCharacter').style.textDecoration = "line-through";
            document.getElementById('iSpecialChar').style.color = "green";
            $('#iSpecialChar').removeClass("fas fa-times").addClass("fas fa-check");   
            $('#btnSubmit').prop('disabled', 'disabled');
        }
        else {
            isValidSpecialChar = 0;
            document.getElementById('hasSpecialCharacter').style.textDecoration = "none";
            document.getElementById('iSpecialChar').style.color = "red";
            $('#iSpecialChar').removeClass("fas fa-check").addClass("fas fa-times");   
            $('#btnSubmit').prop('disabled', 'disabled');
        }
        if($("[name=pwd-repeat]").val() !== null && $("[name=pwd-repeat]").val() !== '' && $("[name=pwd-repeat]").val() !== undefined) {
                if($("[name=pwd-repeat]").val() !== $("[name=pwd]").val()) {
                  $('#passwordMatchDiv').show();
                  document.getElementById('passwordMatch2').innerHTML="Password do not match";
                  $('#btnSubmit').prop('disabled', 'disabled');
                }
                else {
                    if(isValidLength === 1 && isValidCap === 1 && isValidNum === 1 && isValidSpecialChar === 1) {
                      $('#passwordMatchDiv').hide();
                      document.getElementById('passwordMatch2').innerHTML="";
                      $('#btnSubmit').prop('disabled', false);
                    }
                    else {
                      $('#passwordMatchDiv').hide();
                      document.getElementById('passwordMatch2').innerHTML="";
                      $('#btnSubmit').prop('disabled', 'disabled');
                    }

                }
            }
            else {
              $('#passwordMatchDiv').hide();
              document.getElementById('passwordMatch2').innerHTML="";
              $('#btnSubmit').prop('disabled', 'disabled');
            }
      
    }
    else {
        if($("[name=pwd-repeat]").val() !== null && $("[name=pwd-repeat]").val() !== '' && $("[name=pwd-repeat]").val() !== undefined) {
            $('#passwordMatchDiv').show();
            document.getElementById('passwordMatch2').innerHTML="Password do not match";
        }
        else {
          $('#passwordMatchDiv').hide();
          document.getElementById('passwordMatch2').innerHTML="";
        }
        $('#btnSubmit').prop('disabled', 'disabled');
        isValidLength = 0;
        document.getElementById('characterLength').style.textDecoration = "none";
        document.getElementById('iCharLength').style.color = "red";
        $('#iCharLength').removeClass("fas fa-check").addClass("fas fa-times");   
        $('#btnSubmit').prop('disabled', 'disabled');

        isValidCap = 0;
        document.getElementById('hasCapitalLetters').style.textDecoration = "none";
        document.getElementById('iCapLetter').style.color = "red";
        $('#iCapLetter').removeClass("fas fa-check").addClass("fas fa-times");   
        $('#btnSubmit').prop('disabled', 'disabled');
        
        isValidNum = 0;
        document.getElementById('hasNumber').style.textDecoration = "none";
        document.getElementById('iNum').style.color = "red";
        $('#iNum').removeClass("fas fa-check").addClass("fas fa-times");   
        $('#btnSubmit').prop('disabled', 'disabled');

        isValidSpecialChar = 0;
        document.getElementById('hasSpecialCharacter').style.textDecoration = "none";
        document.getElementById('iSpecialChar').style.color = "red";
        $('#iSpecialChar').removeClass("fas fa-check").addClass("fas fa-times");   
        $('#btnSubmit').prop('disabled', 'disabled');
    }
});
$("[name=pwd-repeat]").on('keyup', function (event) {
    if($("[name=pwd-repeat]").val() !== null && $("[name=pwd-repeat]").val() !== '' && $("[name=pwd-repeat]").val() !== undefined) {
        if($("[name=pwd-repeat]").val() !== $("[name=pwd]").val()) {
          $('#passwordMatchDiv').show();  
          document.getElementById('passwordMatch2').innerHTML="Password do not match";
          $('#btnSubmit').prop('disabled', 'disabled');
        }
        else {
          $('#passwordMatchDiv').hide();
          document.getElementById('passwordMatch2').innerHTML="";
          $('#btnSubmit').prop('disabled', false);
        }
    }
    else {
      $('#passwordMatchDiv').hide();
      document.getElementById('passwordMatch2').innerHTML="";
      $('#btnSubmit').prop('disabled', 'disabled');
    }
});
</script>
<?php
  
  if(isset($_GET['error'])){
    if($_GET['error'] == 'signupemptyfields'){
        echo '
        
          <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
            <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
            <p class="my-4"><strong>Warning!</strong> Empty Fields</p>
            <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
          </div>

        ';
    }
    else if($_GET['error'] == 'invaliduid'){
        echo '
          <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
            <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
            <p class="my-4"><strong>Warning!</strong> Invalid characters were used for the username.</p>
            <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
          </div>
        ';
    }
    else if($_GET['error'] == 'invalidcontact'){
      echo '
        <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
          <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
          <p class="my-4"><strong>Warning!</strong> Invalid characters were used for the contact or payment information. Use number digits only.</p>
          <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
        </div>
      ';
  }

    else if($_GET['error'] == 'passwordcheck'){
        echo '
          <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
            <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
            <p class="my-4"><strong>Warning!</strong> Passwords do not match. Please try again.</p>
            <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
          </div>       
        ';
    }
    else if($_GET['error'] == 'unametaken'){
      echo '
        <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
          <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
          <p class="my-4"><strong>Warning!</strong> The username you entered is taken.</p>
          <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
        </div>       
      ';
      }
  }
  include './cxfooter.php';


?>