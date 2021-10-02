<?php
  $title = 'CakeHub | My Cart';
  include './cxnav.php';

  include './includes/cartdate.inc.php';
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
</style>
<nav aria-label="breadcrumb " class="bg-transparent fs-5 ms-3 mt-3 " style="box-shadow: unset;">
  <ol class="breadcrumb ">
    <li class="breadcrumb-item"><a href="index.php" class="link-ftr">Home</a></li>
    <li class="breadcrumb-item active">My Cart</li>
  </ol>
</nav>


<h3 class="text-noah text-center fw-bold mt-5">MY SHOPPING CART</h3> 
<div class="row mx-auto w-75" >
<span class=" text-noah mt-2 fs-6"> SOONEST DELIVERY DATE:<strong> <?php echo $delivD;?></strong></span>
</div>
<hr class="w-75 m-auto">

<?php
  include './includes/cartlist.inc.php';
?>
<hr class="w-75 m-auto">

<div class="row m-0 p-0 w-75 mx-auto ">
  <div class="col-sm-6 p-4 ps-0">
    <label for="" class="text-bold fs-6">SPECIAL DELIVERY INSTRUCTION:</label>
    <textarea class="form-control w-100" style=" min-height:75px;" name="pdesc" id="pdesc"></textarea>
  </div>
  <div class="col-sm-6  my-auto">
    <div class="row m-0 p-0 ">
      <span class="col-sm-6 m-0 p-0 fs-6 text-bold">TOTAL</span>
      <span class="col-sm-6 m-0 p-0 text-end fs-6 text-bold">Php <?php echo $tprice;?>.00</span>
    </div>
    <?php
      if (isset($_SESSION['userId']) && $delivD != "Nothing to display"){
        echo '
          <div class=" float-end">
            <a href="./cxcheckout.php" class="btn mt-2 btn1 text-light text-bold  px-5">CONTINUE</a>
          </div>   
        ';
      }
    
    ?>
    <br><br>
    <div class=" float-end"> 
      <a href="./index.php" class="link-ftr ">Continue Shopping ></a>
    </div>
    
    
  </div>
</div>

<script type="text/javascript">
  $('.minus-btn').on('click', function(e) {
    e.preventDefault();
    var $this = $(this);
    var $input = $this.closest('div').find('input');
    var value = parseInt($input.val());

    if (value > 1) {
        value = value - 1;
    } else {
        value = 0;
    }

    $input.val(value);

  });

  $('.plus-btn').on('click', function(e) {
    e.preventDefault();
    var $this = $(this);
    var $input = $this.closest('div').find('input');
    var value = parseInt($input.val());

    if (value < 100) {
      value = value + 1;
    } else {
        value =100;
    }
    $input.val(value);
  });
</script>
<?php
  include './cxfooter.php';
?>