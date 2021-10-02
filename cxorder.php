<?php
  $title = 'CakeHub | My Orders';
  include './cxnav.php';
?>
<style>
  .img-container {
    height: 90% !important;
    object-fit: cover;
    object-position: 50% 50% !important;
    padding: 2px;
  }
  .prod-container {     
    height: 20em !important;
    border-radius: 0.5rem;
    overflow: hidden;
    text-align: center;
    /* background-image: linear-gradient(rgb(209, 89,87), transparent); */
  }
  .bg-lpink{
    color:white !important;
  }
  .bg-lpink:hover{
    color:black !important;
  }
  .btn1{
    border-radius: 0.5rem;
    border-color: transparent;
    background: #d18180 !important;
    color: white;
  }
  .btn1:focus{
    background: #d15957 !important;
  }
  .btn1:hover{
    border: white 1px solid;
  }
</style>
<nav aria-label="breadcrumb " class="bg-transparent fs-5 ms-3 mt-3" style="box-shadow: unset;">
  <ol class="breadcrumb ">
    <li class="breadcrumb-item"><a href="index.php" class="link-ftr">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">My Orders</li>
  </ol>
</nav>

<h3 class="text-noah text-center fw-bold mt-5">My Orders to be Processed</h3> 
<hr class="w-75 m-auto mb-3">

<div class="bg-warning w-75 bg-pink text-light rounded-3 mx-auto m-0 p-0 ">
  <?php include './includes/cxorderlist.inc.php'; ?>
  
</div>


<?php
  
  if(isset($_GET['success'])){
    if($_GET['success'] == 'cxlogin'){
        echo '
        
          <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
            <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
            <p class="my-4"><strong>Success! </strong> You are logged in.  </p>
            <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
          </div>

        ';
    }
    else if($_GET['success'] == 'cartcheckedout'){
      echo '
      
        <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
          <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
          <p class="my-4"><strong>Success! </strong> Your cart is checked out. Please check it in My Orders page.</p>
          <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
        </div>

      ';
    }
    else if($_GET['success'] == 'paymentaddedwait'){
      echo '
      
        <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
          <i class="fa fa-check-circle text-success fa-5x mt-3" aria-hidden="true"></i>
          <p class="my-4"><strong>Success! </strong> Your payment is added. Please wait for 1-2 business days to confirm the payment.</p>
          <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
        </div>

      ';
    }
  }
  include './cxfooter.php';
?>