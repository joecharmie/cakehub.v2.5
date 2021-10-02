

            
            <?php
                    if(isset($_SESSION['userId'])){
                        echo "<script>var modalViewUser = true;</script>";
                        echo '<div class="d-sm-flex align-items-center justify-content-between mb-4">';
                        echo '<h1 class="h3 mb-0 text-gray-800">'.$title.'</h1>';
                       
                        echo '<form action=" SBAdmin2/includes/editmyprofile.inc.php" method="post" enctype="multipart/form-data">';
                        echo   '<div id="edit">
                                    <button id="btnEditProfile" class="btn btn-sm" style="background-color: #294C60; color: white;" type="button">
                                        <i class="fas fa-user-edit"></i> 
                                        Edit My Profile
                                    </button> 
                                    <button id="btnChangePassword" class="btn btn-sm" style="background-color: #294C60; color: white;" data-toggle="modal" data-target="#ModalChangePassword" type="button">
                                        <i class="fas fa-cog"></i> 
                                        Change Password
                                    </button> 
                                    <button class="btn btn-sm" style="background-color: #294C60; color: white;" data-toggle="modal" data-target="#ModalDeactivate" type="button">
                                        <i class="fas fa-cog"></i> 
                                        Deactivate
                                    </button> 
                                </div>';
                        echo '<div id="editing" style="display: none;">
                                <button id="btnCancel" class="btn btn-sm" style="background-color: #294C60; color: white;" type="button">
                                    <i class="fas fa-times"></i> 
                                    Cancel
                                </button>
                                <button id="btnDone" class="btn btn-sm" style="background-color: #294C60; color: white;" name="done-submit" type="submit">
                                    <i class="fas fa-paper-plane"></i> 
                                    Done
                                    </button>
                                </div>
                            </div>';
                        echo '<div class="row m-0 p-0">';
                        echo '<div class="col-sm-12 col-md-12 col-lg-12">';
                        echo '<div class="card bg-white">';

                       
                        echo "<div class='row m-0 p-0 '>"; 

                        //this section is for the profileImg of the user
                        echo "
                        <div class='modal-body p-3 col-sm-5 col-md-5 col-lg-5  my-auto'>
                            <div style='display:flex; justify-content: center; align-content: middle; margin-bottom: 10px' >";

                        require "SBAdmin2/includes/profileviewdisp.inc.php";
                       
                        echo" 
                            </div>
                            <div class='ml-3 mb-4' style='display: none;' id='fileUpload'>
                                <input type='file' name='theFILE'>
                            </div>
                            </div>  
                        ";   
                        
                        //this section is for the information of the user
                        require "SBAdmin2/includes/profileviewdetails.inc.php";

                        echo "
                        <div class='modal-body pl-1 col-sm-7 col-md-7 col-lg-7 my-auto' >
                            <h5 class='modal-title mb-3'>User Information</h5>    

                            <div style='display: flex; align-items: center;' class='mb-1'>
                            <label class='form-control-static mr-2 mt-1' style='font-weight: normal; width:125px;'>User ID: </label>
                            <input type='text' name='upid' class='form-control form-control-user'  value='".$upid."' disabled>
                            </div>

                            <div style='display: flex; align-items: center;' class='mb-1'>
                            <label class='form-control-static mr-2 mt-1' style='font-weight: normal; width:125px;'>Username: </label>
                            <input type='text' name='uname' class='form-control form-control-user userEdit'  value='".$uname."' disabled>
                            </div>

                            <div style='display: flex; align-items: center;' class='mb-1'>
                            <label class='form-control-static mr-2 mt-1' style='font-weight: normal; width:125px;'>Email: </label>
                            <input type='text' name='email' class='form-control form-control-user userEdit'  value='".$email."' disabled>
                            </div>

                             <div style='display: flex; align-items: center;' class='mb-1'>
                            <label class='form-control-static mr-2 mt-1' style='font-weight: normal; width:125px;'>Contact #: </label>
                            <input type='text' name='cnum' class='form-control form-control-user userEdit'  value='".$cnum."' disabled>
                            </div>

                            <div style='display: flex; align-items: center;' class='mb-1'>
                            <label class='form-control-static mr-2 mt-1' style='font-weight: normal; width:125px;'>Firstname: </label>
                            <input type='text' name='fname' class='form-control form-control-user userEdit'  value='".$fname."' disabled>
                            </div>
                        
                            <div style='display: flex; align-items: center;' class='mb-1'>
                            <label class='form-control-static mr-2 mt-1' style='font-weight: normal; width:125px;'>Middlename: </label>
                            <input type='text' name='mname' class='form-control form-control-user userEdit'  value='".$mname."' disabled>
                            </div>

                            <div style='display: flex; align-items: center;' class='mb-1'>
                            <label class='form-control-static mr-2 mt-1' style='font-weight: normal; width:125px;'>Lastname: </label>
                            <input type='text' name='lname' class='form-control form-control-user userEdit'  value='".$lname."' disabled>
                            </div>

                            <div style='display: flex; align-items: center;' class='mb-1'>
                            <label class='form-control-static mr-2 mt-1' style='font-weight: normal; width:125px;'>Role: </label>
                                    <select class='form-control select2 ' name='role'  disabled>
                                        <option>".$role." </option>
                                    </select>
                            </div>

                            <div style='display: flex; align-items: center;' class='mb-1'>
                            <label class='form-control-static mr-2 mt-1' style='font-weight: normal; width:125px;'>Status: </label>
                                    <select class='form-control select2 userEdit'  name='stat'  disabled>
                                    <option value=".$statVal.">".$stat."</option>
                                    </select>
                            </div>";

                            if($role == "Baker" || $role == "Seller" ){
                                echo "<div style='display: flex; align-items: center;' class='mb-1'>
                                <label class='form-control-static mr-2 mt-1' style='font-weight: normal; width:125px;'>Location: </label>
                                <input type='text' name='barangayname' class='form-control form-control-user userEdit w-50' value='".$barangay."' disabled>
                                <input type='text' name='cityname' class='form-control  form-control-user userEdit w-50' value='".$city."' disabled>
                                </div>";

                                echo "<div style='display: flex; align-items: center;' class='mb-1'>
                                <label class='form-control-static mr-2 mt-1' style='font-weight: normal; width:125px;'>Bakery: </label>
                                <input type='text' name='bakeryname' class='form-control form-control-user userEdit'  value='".$bakeryname."' disabled>
                                </div>";
    
                                echo "<div style='display: flex; align-items: center;' class='mb-1'>
                                <label class='form-control-static mr-2 mt-1' style='font-weight: normal; width:125px;'>GCash: </label>
                                <input type='text' name='gcash' class='form-control form-control-user userEdit'  value='".$gcash."' maxlength='11' disabled>
                                </div>";
    
                                echo "<div style='display: flex; align-items: center;' class='mb-1'>
                                <label class='form-control-static mr-2 mt-1' style='font-weight: normal; width:125px;'>Paymaya: </label>
                                <input type='text' name='paymaya' class='form-control form-control-user userEdit'  value='".$paymaya."' maxlength='11' disabled>
                                </div>";
    
                                echo "<div style='display: flex; align-items: center;' class='mb-1'>
                                <label class='form-control-static mr-2 mt-1' style='font-weight: normal; width:125px;'>Coins.ph: </label>
                                <input type='text' name='coins' class='form-control form-control-user userEdit'  value='".$coins."' maxlength='11' disabled>
                                </div>";
                            }

                            

                        echo "</div>";                                                  
                        echo "</div>";
                        echo "</div>";                                                  
                        echo "</div>";                                          
                        echo "</div>";
                        echo "</from>";
                    }
                ?>
            

<div id="ModalChangePassword" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="border: none;">
                <button class="close" id="ANUCloseModal" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>       
            <form action="SBAdmin2/includes/editmyprofile.inc.php" method="post" enctype="multipart/form-data">                        
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12 mb-3" style="margin-top:-20px">
                                        <h3 class="modal-title">Change Password</h3>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                    <label class="form-control-static" style="font-size: 20px;"> In order to protect your account, make sure:</label>                     
                                    </div>
                                    <div class="col-md-12">
                                        <label id="hasCapitalLetters"class="form-control-static" style="font-style: italic; opacity: 0.8; font-size: 17px;"><i id="iCapLetter"></i> Password must contain a capital letter</label>                     
                                    </div>
                                    <div class="col-md-12">
                                        <label id="hasNumber"class="form-control-static" style="font-style: italic; opacity: 0.8; font-size: 17px;""><i id="iNum"></i>  Password must contain a number</label>                     
                                    </div>
                                    <div class="col-md-12">
                                        <label id="hasSpecialCharacter"class="form-control-static" style="font-style: italic; opacity: 0.8; font-size: 17px;""><i id="iSpecialChar"></i>  Password must contain a special character</label>                     
                                    </div>
                                    <div class="col-md-12">
                                        <label id="characterLength"class="form-control-static" style="font-style: italic; opacity: 0.8; font-size: 17px;""><i id="iCharLength"></i>   Password must be at least 8 characters</label>                     
                                    </div> 
                                </div>     
                                <div class="col-md-6" style="margin-top: 70px;">
                                    <div class="row mb-2">
                                        <div class="col-md-12">
                                            <div style="display: none;">
                                                <input name="upid" class="form-control form-control-user" minlength="3" value=<?php echo "$upid" ?>>
                                                <input name="cfname" class="form-control form-control-user" minlength="3" value=<?php echo "$fname" ?>>
                                                <input name="clname" class="form-control form-control-user" minlength="3" value=<?php echo "$lname" ?>>
                                            </div>
                                            <label class="form-control-static" style="font-weight: normal;">New Password: </label>
                                            <input type="password" name="newpassword" class="form-control form-control-user" minlength="3">
                                        </div>                    
                                    </div>
                   
                                    <div class="row mb-2">
                                        <div class="col-md-12">
                                            <label class="form-control-static" style="font-weight: normal;">Confirm Password: </label>
                                            <input type="password" name="confirmpassword" class="form-control form-control-user" minlength="3">
                                        </div>
                                    
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-12">
                                            <label id="passwordMatch2"class="form-control-static" style="font-weight: normal; color: red;"></label>                     
                                        </div>
                                    
                                    </div>     
                                </div>                 
                            </div>
                        </div>
                    </div>
              
                </div>
           
                <div class="modal-footer">
                    <button id="btnSubmit" class="btn btn-sm" name="changepassword-submit" style="background-color: #294C60; color: white;" disabled type="submit">
                        <i class="fas fa-paper-plane"></i> Submit
                    </button>                    
                </div>
            </form>
        </div>
    </div>
</div>

<div id="ModalDeactivate" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title">Deactivate Profile</h5>
                <button class="close" id="ANUCloseModal" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>      
            <form action="SBAdmin2/includes/editmyprofile.inc.php" method="post" enctype="multipart/form-data">                                      
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                        <div style="display: none;">
                            <input name="upid" class="form-control form-control-user" minlength="3" value=<?php echo "$upid" ?>>
                            <input name="dfname" class="form-control form-control-user" minlength="3" value=<?php echo "$fname" ?>>
                            <input name="dlname" class="form-control form-control-user" minlength="3" value=<?php echo "$lname" ?>>
                        </div>
                        <label class="form-control-static" style="font-weight: normal; text-align: center;">Are you sure you want to deactivate this profile?</label>                      
                        </div>                  
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnDeactivate" class="btn btn-sm" name="deactivate-submit" style="background-color: #294C60; color: white;" type="submit">
                        <i class="fas fa-paper-plane"></i> Confirm
                    </button>                    
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/JavaScript">
$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
var role = "<?php echo $role?>"
var isediting = false;
var uname = '';
var email = '';
var cnum = '';
var fname = '';
var mname = '';
var lastname = '';
var stat = '';

//for baker
var barangay = '';
var city = '';
var bakery = '';
var gcash = '';
var paymaya = '';
var coins = '';
var isValidCap = 0;
var isValidNum = 0;
var isValidLength = 0;
var isValidSpecialChar = 0;
var isNumberKey = function (event) {
switch (event.keyCode) {
            case 8:  // Backspace
            case 9:  // Tab
            case 13: // Enter
            case 37: // Left
            case 38: // Up
            case 39: // Right
            case 40: // Down
            break;
            default:
            var regex = /[0-9]/;
            var key = event.key;
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
            break;
        }
}

$("[name=gcash]").on('keydown', function (event) {
    isNumberKey(event);
});

$("[name=paymaya]").on('keydown', function (event) {
        isNumberKey(event);
});
$("[name=coins]").on('keydown', function (event) {
        isNumberKey(event);
    
});
$("[name=newpassword]").on('keyup', function (event) {
    if($("[name=newpassword]").val() !== null && $("[name=newpassword]").val() !== '' && $("[name=newpassword]").val() !== undefined) {
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
        if($("[name=confirmpassword]").val() !== null && $("[name=confirmpassword]").val() !== '' && $("[name=confirmpassword]").val() !== undefined) {
                if($("[name=confirmpassword]").val() !== $("[name=newpassword]").val()) {
                    document.getElementById('passwordMatch2').innerHTML="Password do not match";
                    $('#btnSubmit').prop('disabled', 'disabled');
                }
                else {
                    if(isValidLength === 1 && isValidCap === 1 && isValidNum === 1 && isValidSpecialChar === 1) {
                        document.getElementById('passwordMatch2').innerHTML="";
                        $('#btnSubmit').prop('disabled', false);
                    }
                    else {
                        document.getElementById('passwordMatch2').innerHTML="";
                        $('#btnSubmit').prop('disabled', 'disabled');
                    }

                }
            }
            else {
              
                document.getElementById('passwordMatch2').innerHTML="";
                $('#btnSubmit').prop('disabled', 'disabled');
            }
      
    }
    else {
        if($("[name=confirmpassword]").val() !== null && $("[name=confirmpassword]").val() !== '' && $("[name=confirmpassword]").val() !== undefined) {
            document.getElementById('passwordMatch2').innerHTML="Password do not match";
        }
        else {
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
$("[name=confirmpassword]").on('keyup', function (event) {
    if($("[name=confirmpassword]").val() !== null && $("[name=confirmpassword]").val() !== '' && $("[name=confirmpassword]").val() !== undefined) {
        if($("[name=confirmpassword]").val() !== $("[name=newpassword]").val()) {
            document.getElementById('passwordMatch2').innerHTML="Password do not match";
            $('#btnSubmit').prop('disabled', 'disabled');
        }
        else {
            document.getElementById('passwordMatch2').innerHTML="";
            $('#btnSubmit').prop('disabled', false);
        }
    }
    else {
        document.getElementById('passwordMatch2').innerHTML="";
        $('#btnSubmit').prop('disabled', 'disabled');
    }
});
var useStat;
$('#btnEditProfile').on('click', function() {
    isediting = true;
    userStat = $("[name=stat]").val();
    $(".userEdit").addClass("disabled").prop("disabled", false);
    if($("[name=stat]").val() === "1") {
        $("[name=stat]").append($('<option></option>').val(2).html("Inactive"));
    }
    else if($("[name=stat]").val() === "2") {
        $("[name=stat]").append($('<option></option>').val(1).html("Active"));
    }   

    if(isediting) {
        uname =  $("[name=uname]").val();
        email =  $("[name=email]").val();
        cnum =  $("[name=cnum]").val();
        fname =  $("[name=fname]").val();
        mname =  $("[name=mname]").val();
        lname =  $("[name=lname]").val();
        stat  =  $("[name=stat]").val();

        if(role === 'Baker') {
            barangay =  $("[name=barangayname]").val();
            city =  $("[name=cityname]").val();
            bakery =  $("[name=bakeryname]").val();
            gcash =  $("[name=gcash]").val();
            paymaya =  $("[name=paymaya]").val();
            coins =  $("[name=coins]").val();
        }
        $('#edit').hide();
        $('#editing').show();
        $('#fileUpload').show();
    }
});


$('#btnCancel').on('click', function() {
    isediting = false;
    $(".userEdit").addClass("disabled").prop("disabled", true);
    if(userStat === "1") {
        $("[name=stat] option[value='2']").remove();
    }
    else if(userStat === "2") {
        $("[name=stat] option[value='1']").remove();
    }
    if(!isediting) {
        $('#edit').show();
        $('#editing').hide();
        $('#fileUpload').hide();
        $("[name=uname]").val(uname);
        $("[name=email]").val(email);
        $("[name=cnum]").val(cnum);
        $("[name=fname]").val(fname);
        $("[name=mname]").val(mname);
        $("[name=lname]").val(lname);
        $("[name=stat]").val(stat);

        if(role==='Baker') {
            $("[name=barangayname]").val(barangay);
            $("[name=cityname]").val(city);
            $("[name=bakeryname]").val(bakery);
            $("[name=gcash]").val(gcash);
            $("[name=paymaya]").val(paymaya);
            $("[name=coins]").val(coins);
            
        }
    }
});


$('#btnChangePassword').on('click', function() {
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
});

</script>
<?php   
    include "./SBAdmin2/includes/alertmodal.inc.php";
    if(isset($_GET['error'])) {
        if($_GET['error'] == 'unametaken') {
            echo "<script>var alertUsernameTaken = true; </script>";
        }
        else if($_GET['error'] == 'invaliduid'){
            echo "<script>var alertInvalidUsername = true; </script>";
        }
        else if($_GET['error'] == 'systemerror'){
            echo "<script>var alertMyProfileError2 = true; </script>";
        }
        else if($_GET['error'] == 'erroruploadingpic'){
            echo "<script>var alertErrorUploadingPic = true; </script>";
        }
        else if($_GET['error'] == 'extensionnotallowed'){
            echo "<script>var alertExtensionNotAllowed = true; </script>";
        }
        else if($_GET['error'] == 'filetoolarge'){
            echo "<script>var alertFileTooLarge = true; </script>";
        }
    }
     else if(isset($_GET['success'])){
        if($_GET['success'] == 'profileupdated'){
            echo "<script>var alertMyProfileEdited = true; </script>";
        }
        if($_GET['success'] == 'changepassword'){
            echo "<script>var alertChangePassword = true; </script>";
        }
        if($_GET['success'] == 'deactivatedprofile'){
            echo "<script>var alertDeactivateProfile = true; </script>";
        }
    }
?>
