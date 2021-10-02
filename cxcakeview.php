<?php
  $title = 'CakeHub | Cake View';
  include './cxnav.php';
  include './includes/cakeview.inc.php';
?>
<!-- <link rel="stylesheet" href="./css/cake-order.css"> -->
<style>
  hr{
    width: 100%;
  }
  .no-outline:focus{
    outline: none;
  }
  .no-outline:active{
    outline: none;
  }
  .no-outline{
    border-color:  #d18180;
    border-width: thin;
    padding: 3px;
    border-style: solid;
    border-radius: 0.5rem;
  }
  .no-outline1:focus{
    outline: none;
  }
  .no-outline1:active{
    outline: none;
  }

  .img-container {
    height: 100%;
    object-fit: cover;
    object-position: 50% 50% !important;
    padding: 10px;
  }
  .prod-container {       
    width: auto !important;
    height: 20em !important;
    border-radius: 0.5rem;
    overflow: hidden;
    text-align: center;
    background-image: linear-gradient(rgb(209, 89,87), transparent);
  }
  .deltime input {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgb(190, 190, 190);
  }

  .deltime input[type="radio"] {
    opacity: 0.01;
  }

  .deltime input[type="radio"]:checked+label,
  .Checked+label {
    background: #d15957;
    font-weight: bold;
    color: white;
  }
  .time-opt{
    padding:8px;
    border-radius: 0.5rem;
    background: #d18180;
    width: 98%;
    height: 98%;
  }
  .mb-0{
    margin-bottom: 0;
    margin-top: 20px;
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
  .submit-btn{
    padding: 10px;
    margin-top: 50px;
    font-size: 20px;
  }

</style>

<nav aria-label="breadcrumb " class="bg-transparent fs-5 ms-3 mt-3 " style="box-shadow: unset;">
  <ol class="breadcrumb ">
    <li class="breadcrumb-item"><a href="index.php" class="link-ftr">Home</a></li>
    <li class="breadcrumb-item"><a href="cxcakes.php?type=<?php echo $type;?>" class="link-ftr"><?php echo $typename;?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $tabname;?></li>
  </ol>
</nav>

<h3 class="text-noah text-center fw-bold mt-5"><?php echo $name;?></h3> 
<hr class="w-75 m-auto">
<h4 class="text-center text-noah mt-2 fs-4">Php <?php echo $price;?>.00</h4>

<div class="row m-0 p-2">
  <div class="col-sm-4 col-lg-4 col-md-4">
    <div class="prod-container ">
      <img class="img-container" src="./SBAdmin2/includes/<?php echo $img;?>" alt="" srcset="">
    </div>
  </div>
  <div class="col-sm-8 col-lg-8 col-md-8 ">
    <div>
        <div class="p-4">   
            <details >
            <summary class="no-outline1">DESCRIPTION</summary>
                <p><?php echo $desc; ?></p>
            <h5>Ingredients</h5> 
                <p>Butter, Sugar, Flour, Eggs, Chocolate</p>
            <h5>Allergens</h5>
                <p>Eggs, Milk, Wheat, Soy</p>
            </details>
        </div>
        <form action="./includes/cartadd.inc.php">
            <div class="p-2 row m-0"> 
                <span class="col-sm-4 col-md-4 col-lg-4">SELECT DELIVERY DATE</span>
                <input class="col-sm-4 col-md-4 col-lg-4 no-outline " type="date" name="deliverydate" id="deliverydate" >
                <span class="col-sm-4 col-md-4 col-lg-4"></span>
                
            </div>
            <div class="p-2 row m-0">
                <span  class="col-sm-4 col-md-4 col-lg-4">SELECT PICK-UP TIME</span>
                <ul class="deltime col-sm-8 col-md-8 col-lg-8 row m-0 p-0 " style="list-style-type:none;">
                    <li class="text-center col-sm-3 col-md-3 col-lg-3 m-0 p-0 ">
                        <input  type="radio" id="dt1" name="deliverytime" checked="checked" value="A"/> 
                        <label class="time-opt" for="dt1">11 AM - 1 PM</label>
                    </li>
                    <li class="text-center col-sm-3 col-md-3 col-lg-3 m-0 p-0">
                        <input  type="radio" id="dt2" name="deliverytime" value="B"/>
                        <label class="time-opt " for="dt2" >1 PM - 3 PM</label>
                    </li>
                    <li class="text-center col-sm-3 col-md-3 col-lg-3 m-0 p-0">
                        <input  type="radio" id="dt3" name="deliverytime" value="C"/>
                        <label class="time-opt " for="dt3">3 PM - 5PM</label>
                    </li>
                    <li class="text-center col-sm-3 col-md-3 col-lg-3 m-0 p-0">
                        <input  type="radio" id="dt4" name="deliverytime" value="D"/>
                        <label class="time-opt " for="dt4">5 PM - 7 PM</label>
                    </li>
                </ul>
                
            </div>
            <div style="display: flex;" class="p-2 row m-0">
                <span class="col-sm-4 col-md-4 col-lg-4">SELECT QUANTITY</span>
                <div class="col-sm-4 col-md-4 col-lg-4 text-center " >
                    <button class="minus-btn btn1 p-1 px-3 no-outline1 " type="button" name="button" ><i class="fa fa-minus" aria-hidden="true"></i>
                    </button>
                    <input class="no-outline" type="text" name="qty" value="1" style="width: 4em; text-align: center;">
                    <button class="plus-btn btn1 p-1 px-3 no-outline1 " type="button" name="button"><i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </div>
                <span class="col-sm-4 col-md-4 col-lg-4"></span>
            </div>          
            <div class="p-2 row m-0">
                <span class="col-sm-4 col-md-4 col-lg-4">SELECT CANDLES (AGE)</span>
                <select class="no-outline col-sm-4 col-md-4 col-lg-4 text-center " name="candle" id="candle" >
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                </select>
                <span class="col-sm-4 col-md-4 col-lg-4"></span>
            </div>
            <div class="text-end pe-3">
              <button type="submit" name="cake" value="<?php echo $id; ?>" class="btn1 p-2 px-5 no-outline1 text-bold ">ADD TO CART</button>
            </div>
            
        </form> 
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

    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var minDate= year + '-' + month + '-' + day;
    
    $('#deliverydate').attr('min', minDate);
</script>
<?php
  include './cxfooter.php';
?>
