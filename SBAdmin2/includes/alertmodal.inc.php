<!-- gawa ni joe | USER MANAGEMENT - add  8 --> 

<div class="modal fade" id="alertEmptyFields" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center" >
        <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Empty Fields.</p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>       
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="alertInvalidUsername" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center" >
        <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Invalid Username.</p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>       
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="alertPasswordCheck" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center" >
        <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Password do not match.</p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>       
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="alertUserAdded" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Success! The user <?php echo $_GET['added']; ?> is added.</p>
        <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Close</button> 
      </div>    
    </div>
  </div>
</div>

<div class="modal fade" id="alertUsernameTaken" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center" >
        <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Username already taken.</p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>       
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="alertExtensionNotAllowed" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center" >
        <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Invalid file format.</p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>       
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="alertFileTooLarge" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center" >
        <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">File Size Exceeds. Please limit it to a maximum of 1MB. </p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>       
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="alertWorking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Success! The alert works.</p>
        <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Close</button> 
      </div>  
    </div>
  </div>
</div>
<!-- gawa ni joe | USER MANAGEMENT -end -->

<!-- =================== -->

<!-- gawa ni pat | USER MANAGEMENT -start 3 -->

<div class="modal fade" id="alertUserUpdated" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Success! The user <?php echo $_GET['edited']; ?> is updated.</p>
        <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Close</button> 
      </div>   
    </div>
  </div>
</div>

<div class="modal fade" id="alertPassReset" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Success! The user <?php echo $_GET['reset']; ?>'s password has been reset.</p>
        <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Close</button> 
      </div>    
    </div>
  </div>
</div>

<div class="modal fade" id="alertUserDeact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Success! The user <?php echo $_GET['deact']; ?>'s account has been deactivated.</p>
        <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Close</button> 
      </div>  
    </div>
  </div>
</div>

<!-- gawa ni pat | USER MANAGEMENT -end -->

<!-- =================== -->

<!-- gawa ni lian |MY PROFILE -start -->

<div class="modal fade" id="alertMyProfileEdited" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">    
      <div class="modal-body text-center">
        <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Success! Your profile is updated.</p>
        <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Close</button> 
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="alertMyProfileError" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center" >
        <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Failed to update your profile.</p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>       
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="alertMyProfileError2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center" >
        <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Something went wrong. Please contact the administrator</p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>       
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="alertErrorUploadingPic" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center" >
        <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Error encountered upon uploading the image.</p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>       
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="alertChangePassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Successfully changed password</p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="alertDeactivateProfile" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Success! Your account is deactivated.</p>
        <a href="SBAdmin2/includes/logout.inc.php"><button href="SBAdmin2/includes/logout.inc.php" type="button" class="btn btn-secondary">Close</button></a>
      </div>
    </div>
  </div>
</div>

<!-- gawa ni lian| MY PROFILE -end -->

<!-- =================== -->

<!-- gawa ni joe | PRODUCT MANAGEMENT -start 5-->

<div class="modal fade" id="alertProdAdded" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Success! The product named <?php echo $_GET['prod']; ?> is added.</p>
        <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Close</button> 
      </div>     
    </div>
  </div>
</div>

<div class="modal fade" id="alertProdUpdated" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Success! The product named <?php echo $_GET['prod']; ?> is updated.</p>
        <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Close</button> 
      </div>     
    </div>
  </div>
</div>

<div class="modal fade" id="alertProdDeleted" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Success! The product named <?php echo $_GET['prod']; ?> is deleted.</p>
        <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Close</button> 
      </div>  
    </div>
  </div>
</div>

<div class="modal fade" id="alertPictureUpload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center" >
        <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">There was a problem with uploading the picture.</p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>       
      </div>   
    </div>
  </div>
</div>

<div class="modal fade" id="alertError" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center" >
        <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">An error occured while processing your request.</p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
      </div>  
    </div>
  </div>
</div>

<!-- gawa ni joe | PRODUCT MANAGEMENT -end -->

<!-- =================== -->

<!-- gawa ni pat | TRANSACTION -start -->

<div class="modal fade" id="alertSyncTransact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Success! The inventories was synced.</p>
        <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Close</button> 
      </div>   
    </div>
  </div>
</div>

<div class="modal fade" id="alertTransactUpdated" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content"> 
      <div class="modal-body text-center">
        <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Success! The transaction <?php echo $_GET['edited']; ?> is updated.</p>
        <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Close</button> 
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="alertTransactDeact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Success! The transaction <?php echo $_GET['deact']; ?> is deleted.</p>
        <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Close</button> 
      </div> 
    </div>
  </div>
</div>

<div class="modal fade" id="alertPaymentApproved" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Success! The payment was successly approved.</p>
        <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Close</button> 
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="alertPaymentRemoved" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">Success! The payment was successly removed.</p>
        <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Close</button> 
      </div>     
    </div>
  </div>
</div>

<div class="modal fade" id="alertPaymentError" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center" >
        <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4">An error occured while processing your request regarding the payment. </p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>      
      </div>   
    </div>
  </div>
</div>

<!-- gawa ni pat | TRANSACTION -end -->