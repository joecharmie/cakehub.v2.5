<?php
  $title = 'CakeHub | Payment';
  include './cxnav.php';
  $cakeID = $_GET['cake'];
  $sql = "SELECT `cxcakeorder`.`cakeCompPrice`, `person`.`personGcash`, `person`.`personPaymaya`, `person`.`personCoinsPH`, `person`.`personBakeryName` FROM `cxcakeorder` JOIN `product` ON `cxcakeorder`.`cakeProdID` = `product`.`prodID` JOIN `person` ON `person`.`personID` = `product`.`prodSellerID` WHERE `cxcakeorder`.`cakeOrderID` = '$cakeID';";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
      $price = $row['cakeCompPrice'];
      $gcash = $row['personGcash'];
      $paymaya = $row['personPaymaya'];
      $coins = $row['personCoinsPH'];
      $bname = $row['personBakeryName'];
    }
  }
?>
<style>
  .btn-primary{
    background: #007dfe;
  }
  .btn-primary:focus{
    background: #0061C6;
  }
  

  .btn-success:focus{
    background: #14701a;
  }
  .btn-warning:focus{
    background: #ffc107;
  }
  
</style>

<nav aria-label="breadcrumb " class="bg-transparent fs-5 ms-3 mt-3 " style="box-shadow: unset;">
  <ol class="breadcrumb ">
    <li class="breadcrumb-item"><a href="index.php" class="link-ftr">Home</a></li>
    <li class="breadcrumb-item"><a href="./cxorder.php" class="link-ftr">My Orders</a></li>
    <li class="breadcrumb-item active">My Cart</li>
  </ol>
</nav>

<main>
  <div class="text-center">
    <div class="w-75 card m-auto mt-3 bg-pink text-light">
      <img class="card-img-top" src="holder.js/100x180/" alt="">
      <div class="card-body">
        <h3 class="text-noah text-center fw-bold mt-5">Online Payment</h3> 
        <hr class="w-75 m-auto mb-1 ">
        
        <p class="m-0 p-0 text-light fw-bold">Cake Order ID: <?php echo $cakeID;?></p>
        <p class="m-0 p-0 text-light">Total Amount: Php <?php echo $price; ?>.00 </p>
        <p class="m-0 p-0 text-light">Bakery Name: <?php echo $bname; ?></p>
        <p class="m-0 p-0 text-light">Choose your payment method available:</p>

        <?php
          if(!empty($gcash)){
            echo '<button type="button" class="w-75 btn btn-primary m-2 p-3" data-bs-toggle="modal" data-bs-target="#modalGCash">
            <img src="./Images/gcash-logo-freelogovectors.net_.svg" height="30em" alt="" srcset="">  
          </button>';
          }
          if(!empty($paymaya)){
            echo '<button type="button" class="w-75 btn btn-success m-2 text-center p-3 mx-auto" data-bs-toggle="modal" data-bs-target="#modalPaymaya">
            <img src="./Images/PayMaya_Logo.png" height="33em"  alt="" srcset="">
          </button>';
          }
          if(!empty($coins)){
            echo '<button type="button" class="w-75 btn btn-warning m-2 p-3" data-bs-toggle="modal" data-bs-target="#modalCoinsPH">
            <img src="./Images/coins.png" height="33em" alt="" srcset="">
          </button>';
          }
        ?>
        
        
        
      </div>
    </div>
  </div>
  
</main>

<div class="modal fade" id="modalGCash" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">GCash</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <form action="./includes/cxpaymentadd.inc.php" method="get">
            <p class="m-0 p-0 text-center">Total Amount: Php <?php echo $price;?>.00</p>
            <p class="m-0 p-0 text-center">Send to this number: <?php echo $gcash;?></p>


            <label for="">Cake Order ID:</label>
            <input type="text" class="form-control" name="cakeOID" id="" aria-describedby="helpId" placeholder="" readonly value="<?php echo $cakeID; ?>">
            
            
            <label for="">Amount Sent:</label>
            <input type="text" class="form-control" name="amt" id="" aria-describedby="helpId" placeholder="">

            <label for="">Reference ID:</label>
            <input type="text" class="form-control" name="refid" id="" aria-describedby="helpId" placeholder="" <?php if(isset($_GET['refid'])){ echo 'value="'.$_GET['refid'].'"'; }?>>
            <small id="helpId" class="form-text text-muted">Enter the reference id of the transaction after transferring the money</small>
            
            
            
            <br><br>
            <input type="checkbox" name="confirm" id="myCheck1" onclick="funcBtnAble1()" >
            <small class="form-text text-muted">I hereby confirm that I have entered the correct reference id of the transaction and have transferred the correct amount that was stated. I will also wait for 1-2 business days to confirm its payment. In case that there are problems, I will be in touch with CakeHub to settle such matters</small>
            <br>
            <button type="submit" class="float-end btn btn-success" id="btnPaid1" name="cnum" value="<?php echo $gcash;?>" disabled>Paid</button>

          </form> 
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalPaymaya" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Paymaya</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <form action="./includes/cxpaymentadd.inc.php" method="get">
            <p class="m-0 p-0 text-center">Total Amount: Php <?php echo $price;?>.00</p>
            <p class="m-0 p-0 text-center">Send to this number: <?php echo $paymaya;?></p>


            <label for="">Cake Order ID:</label>
            <input type="text" class="form-control" name="cakeOID" id="" aria-describedby="helpId" placeholder="" readonly value="<?php echo $cakeID; ?>">
            
            
            <label for="">Amount Sent:</label>
            <input type="text" class="form-control" name="amt" id="" aria-describedby="helpId" placeholder="">

            <label for="">Reference ID:</label>
            <input type="text" class="form-control" name="refid" id="" aria-describedby="helpId" placeholder="" <?php if(isset($_GET['refid'])){ echo 'value="'.$_GET['refid'].'"'; }?>>
            <small id="helpId" class="form-text text-muted">Enter the reference id of the transaction after transferring the money</small>
            
            
            
            <br><br>
            <input type="checkbox" name="confirm" id="myCheck2" onclick="funcBtnAble2()" >
            <small class="form-text text-muted">I hereby confirm that I have entered the correct reference id of the transaction and have transferred the correct amount that was stated. I will also wait for 1-2 business days to confirm its payment. In case that there are problems, I will be in touch with CakeHub to settle such matters</small>
            <br>
            <button type="submit" class="float-end btn btn-success" id="btnPaid2" name="cnum" value="<?php echo $paymaya;?>" disabled>Paid</button>

          </form> 
          
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalCoinsPH" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Coins.ph</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <form action="./includes/cxpaymentadd.inc.php" method="get">
            <p class="m-0 p-0 text-center">Total Amount: Php <?php echo $price;?>.00</p>
            <p class="m-0 p-0 text-center">Send to this number: <?php echo $coins;?></p>


            <label for="">Cake Order ID:</label>
            <input type="text" class="form-control" name="cakeOID" id="" aria-describedby="helpId" placeholder="" readonly value="<?php echo $cakeID; ?>">
            
            
            <label for="">Amount Sent:</label>
            <input type="text" class="form-control" name="amt" id="" aria-describedby="helpId" placeholder="">

            <label for="">Reference ID:</label>
            <input type="text" class="form-control" name="refid" id="" aria-describedby="helpId" placeholder="" <?php if(isset($_GET['refid'])){ echo 'value="'.$_GET['refid'].'"'; }?>>
            <small id="helpId" class="form-text text-muted">Enter the reference id of the transaction after transferring the money</small>
            
            
            
            <br><br>
            <input type="checkbox" name="confirm" id="myCheck3" onclick="funcBtnAble3()" >
            <small class="form-text text-muted">I hereby confirm that I have entered the correct reference id of the transaction and have transferred the correct amount that was stated. I will also wait for 1-2 business days to confirm its payment. In case that there are problems, I will be in touch with CakeHub to settle such matters</small>
            <br>
            <button type="submit" class="float-end btn btn-success" id="btnPaid3" name="cnum" value="<?php echo $coins;?>" disabled>Paid</button>

          </form> 
          
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  function funcBtnAble1() {
    // Get the checkbox
    var checkBox = document.getElementById("myCheck1");
    // Get the output text
    var btnPaid = document.getElementById("btnPaid1");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
      btnPaid.disabled = false;
    } else {
      btnPaid.disabled = true;
    }
  }
</script>
<script>
  function funcBtnAble2() {
    // Get the checkbox
    var checkBox = document.getElementById("myCheck2");
    // Get the output text
    var btnPaid = document.getElementById("btnPaid2");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
      btnPaid.disabled = false;
    } else {
      btnPaid.disabled = true;
    }
  }
</script>
<script>
  function funcBtnAble3() {
    // Get the checkbox
    var checkBox = document.getElementById("myCheck3");
    // Get the output text
    var btnPaid = document.getElementById("btnPaid3");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
      btnPaid.disabled = false;
    } else {
      btnPaid.disabled = true;
    }
  }
</script>

<?php
  if(isset($_GET['error'])){
    if($_GET['error'] == 'emptyfields' ){
      echo '
      
        <div class="alert alert-light shadow-lg  w-50 alert-dismissible fade show position-absolute top-50 start-50 translate-middle text-center p-0"  role="alert">
          <i class="fa fa-exclamation-circle text-warning fa-5x mt-3" aria-hidden="true"></i>
          <p class="my-4"><strong>Warning!</strong> Empty Fields</p>
          <button type="button" class=" btn btn-secondary mb-3" data-bs-dismiss="alert" aria-label="Close">Close</button>
        </div>

      ';
    }
  }
  include './cxfooter.php';
?>