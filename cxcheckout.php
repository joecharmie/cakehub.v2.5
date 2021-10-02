<?php
  $title = 'CakeHub | Checkout';
  include './cxnav.php';
  include './includes/checkoutdet.inc.php';
  
?>
<nav aria-label="breadcrumb " class="bg-transparent fs-5 ms-3 mt-3 " style="box-shadow: unset;">
  <ol class="breadcrumb ">
    <li class="breadcrumb-item"><a href="index.php" class="link-ftr">Home</a></li>
    <li class="breadcrumb-item"><a href="cxcart.php" class="link-ftr">My Cart</a></li>
    <li class="breadcrumb-item active">Checking out</li>
  </ol>
</nav>

<form action="./includes/checkoutupdate.inc.php" method="get">
  <div class="row m-0 p-0">
    <div class="col-sm-1 p-1 "></div>
    <div class="col-sm-5 p-1  text-dark">
      <div class="card rounded-3 p-3 border-pink mx-3">
        <h3 class="text-noah  fw-bold m-0">CONTACT DETAILS</h3>
        <hr class="w-75 m-0"> 

        <small class="text-muted mt-3">If you are not going to receiving the cake, please input the receipient's contact information. Otherwise, click the default button below.</small>

        <div class="row m-0 p-0">
          <div class="col-sm-6 col-lg-6 col-md-6 form-group p-1">
            <label for="">Firstname</label>
            <input type="text" class="form-control" name="fname" id="fname" aria-describedby="helpId" placeholder="">
          </div>
          <div class=" col-sm-6 col-lg-6 col-md-6 form-group p-1">
            <label for="">Lastname</label>
            <input type="text" class="form-control" name="lname" id="lname" aria-describedby="helpId" placeholder="">
          </div>
        </div>
        <?php
          include "./cxaddress.inc.php";
        ?>
        <div class="form-group">
          <label for="">Address </label>
          <textarea class="form-control w-100" style=" min-height:75px;" name="addr" id="addr"></textarea>
          <small id="helpId" class="form-text text-muted">Room/Flr/Unit/Block/Street/Purok</small>
        </div>
        <div class="form-group p-1">
          <label for="">Contact Number</label>
          <input type="text" class="form-control" name="cnum" id="cnum" aria-describedby="helpId" placeholder="">
        </div>

        <div class="d-flex pt-2">
          <button type="button" class="btn bg-dpink text-light w-50 m-1 p-0" id="defBtn" onclick="displayDef()">Choose default </button>
          <button type="button" class="btn bg-dpink text-light w-25 m-1 p-0" onclick="displayReset()">Reset</button >       
        </div>
        <small class="text-muted">By clicking choose default, we will use your contact details that you entered upon registering. Please confirm details above.</small>
      </div>

  
    </div>
    <div class="col-sm-1 p-1 "></div>
    <div class="col-sm-4 p-1 ">
      <div class="card rounded-3 p-3 border-pink mx-3 ">
        <h3 class="text-noah text-center  fw-bold m-0">ORDER SUMMARY</h3>
        <hr class="w-75 m-0 mx-auto">
        <span class="text-noah text-center fw-bold clr-pink"><?php echo $cartid;?></span> 
        <div class="p-3 ">
          <table class=" w-100">
            <tr class="clr-pink">
              <th>Cake Name</th>
              <th>Qty</th>
              <th>Price</th>
            </tr>
            
            <?php
              include './includes/checkoutorders.inc.php';
            ?>
          </table>
          <br>
          <br>
          <table class=" w-100">
            <tr>
              <td class="fw-bold clr-pink w-75">Shipping Fee</td>
              <td class="fw-bold ">Php <?php echo $shipfee;?>.00</td>
            </tr>
            <tr>
              <td class="fw-bold clr-pink w-75">Subtotal</td>
              <td class="fw-bold ">Php <?php echo $totalprice;?>.00</td>
            </tr>
          </table>

        </div>
        <button name="cartID" id="" class="btn bg-dpink text-light mx-auto rounded-3 w-50" type="submit"  value="<?php echo $cartid;?>">Place Order</button>


        <small class="text-muted mt-3">Check your order's status in your account's "My Order" tab, after clicking the "Place Order" button. </small>

        <small class="text-muted mt-3">Note: If your cakes have different delivery dates, we will multiply the delivery fee (Php 50.00) by the number of days that we will ship your delivery.</small>
      </div>
    </div>
    <div class="col-sm-1 p-1 "></div>
  </div>
</form>

<script>
  <?php include './includes/cxprofile.inc.php'; ?>
  function displayDef(){
    document.getElementById('fname').value = "<?php echo $fname; ?>";
    document.getElementById('lname').value = "<?php echo $lname; ?>";
    document.getElementById('category').value = "<?php echo $city; ?>";
    document.getElementById("subcategory").options[0] = new Option("<?php echo $brgy; ?>","<?php echo $brgy; ?>");
    document.getElementById('addr').value = "<?php echo $addr; ?>";
    document.getElementById('cnum').value = "<?php echo $cnum; ?>";
  }
  
</script>
<script>
  function displayReset(){
    document.getElementById('fname').value = "";
    document.getElementById('lname').value = "";
    document.getElementById('category').value = "";
    document.getElementById("subcategory").options[0] = new Option("","Set Barangay");
    document.getElementById('addr').value = "";
    document.getElementById('cnum').value = "";
  }
</script>

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
  else if($_GET['error'] == 'errorcnum'){
    echo '
    
      <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
        <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
        <p class="my-4"><strong>Warning!</strong> Contact number contains an invalid character. Please use numerical digits only.</p>
        <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
      </div>

    ';
  }

}
  include './cxfooter.php';
?>