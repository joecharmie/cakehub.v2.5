<?php
  $title = 'CakeHub | Customization';
  include './cxnav.php';
  if(isset($_GET['current'])){
    $arr = explode("-",$_GET['current']);
    $prevCurr = $arr[0];
  }
?>
<style>
  .bg-pink{
    background: var(--clr-red-light) !important;  
  }
  .bg-lpink:hover{
    color: black;
  }
  .bg-lpink{
    background: var(--clr-dark-pink) !important;
  } 
  .bg-kitchen{
    background-image: url("./Images/bg-kitchen.png") !important;
    background-size: cover;
  } 
  .bg-danger:hover{
    background: var(--clr-dark-pink) !important;
    color:white;
  }
  .bg-light:hover{
    background: var(--clr-dark-pink) !important;
    color:white;
  }
  .bg-tray{
    background-image: url("./Vector/4T/tray1.png") !important;
    background-size: cover;
    background-position: 50% 50% !important;
    
    }
</style>
<nav aria-label="breadcrumb " class="bg-transparent fs-5 ms-3 mt-3 " style="box-shadow: unset;">
  <ol class="breadcrumb ">
    <li class="breadcrumb-item"><a href="index.php" class="link-ftr">Home</a></li>
    <li class="breadcrumb-item"><a href="./cxcustom.base.php" class="link-ftr">Customization</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cake Toppings</li>
  </ol>
</nav>

<h3 class="text-noah text-center fw-bold mt-5">CAKE CUSTOMIZATION</h3> 
<hr class="w-75 m-auto">
<h4 class="text-center text-noah mt-2 fs-4 mb-3">CAKE TOPPINGS</h4>

<div class="card w-75 m-0 p-3 mx-auto bg-pink text-light rounded-3">
  <div class="row m-0 p-0">
    <div class="col-sm-4 m-0 p-3">
      <form action="./cxcustom.icing.php" method="get" class=" row m-0 p-0">
      <a name="" id="" class="btn bg-danger bg-danger text-light fw-bold rounded-pill w-25 mb-1" href="./cxcustom.icing.php?imgpath=<?php echo $_GET['imgpath']; ?>&current=<?php if(isset($prevCurr)){echo $prevCurr;} ?>" role="button"><i class="fas fa-backspace"></i></a>
      <?php
          if(isset($_GET['imgpath'])){
            echo '
              <input type="text" name="imgpath" id="imgpath" value="'.$_GET['imgpath'].'" style="visibility: hidden; width: 50%;">
            ';
            echo '
              <img id ="displayImg" src="'.$_GET['imgpath'].'" class="w-100 bg-kitchen  rounded-3" style="height: 275px;" alt="" srcset="">
            ';
            echo '
              <div class="col-sm-6 m-0 pt-3">
                <button id="btnR" type="reset" class="btn bg-danger bg-danger text-light fw-bold rounded-pill  w-100"  style="visibility: visible;">RESET </button>  
              </div>
            ';

            echo '
              <div class="col-sm-6 m-0 pt-3">
                <button id="btnS" class="btn fw-bold  bg-light  rounded-pill w-100  " name="current" type="submit " value="'.$_GET['current'].'" style="visibility: visible;">NEXT</button>  
              </div>            
            ';
          }
          else{
            echo '
              <input type="text" name="imgpath" id="imgpath" style="visibility: hidden;">
            ';
            echo '
              <img id ="displayImg" src="./Vector/def.png" class="w-100 bg-kitchen  rounded-3" style="height: 275px;" alt="" srcset="">
            ';

            echo '
              <div class="col-sm-6 m-0 pt-3">
                <button id="btnR" type="reset" class="btn bg-danger bg-danger text-light fw-bold rounded-pill  w-100"  style="visibility: hidden;">RESET </button>  
              </div>
            ';

            echo '
              <div class="col-sm-6 m-0 pt-3">
                <button id="btnS" class="btn fw-bold  bg-light  rounded-pill w-100  " name="current" type="submit " style="visibility: hidden;">NEXT</button>  
              </div>            
            ';
          }
        ?>
        
      </form>
    </div>
    <div class="col-sm-8 row m-0 p-0 ">
      <span class="col-sm-12 text-center fw-bold">YOUR CURRENT TOTAL: PHP 200.00</span>

      <div class="col-sm-3 p-2 bg-tray text-center" >
        <br>       
        <img src="./Vector/4T/strawberry (1).png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/strawberry (1).png" alt="" id="drag2" height="25px">
        <img src="./Vector/4T/strawberry (1).png" alt="" id="drag3" height="25px">
        <img src="./Vector/4T/strawberry (1).png" alt="" id="drag4" height="25px">
        <img src="./Vector/4T/strawberry (1).png" alt="" id="drag5" height="25px">
        <img src="./Vector/4T/strawberry (1).png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/strawberry (1).png" alt="" id="drag2" height="25px">
        <img src="./Vector/4T/strawberry (1).png" alt="" id="drag3" height="25px">
        <img src="./Vector/4T/strawberry (1).png" alt="" id="drag4" height="25px">
        <img src="./Vector/4T/strawberry (1).png" alt="" id="drag5" height="25px">
        <h6 class="bg-danger p-1 m-0 mt-1 text-dark rounded-3">20.00/piece</h6>
      </div>
      <div class="col-sm-3 p-2 bg-tray text-center" >
        <br>       
        <img src="./Vector/4T/blossom.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/blossom.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/blossom.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/blossom.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/blossom.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/black.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/black.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/black.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/black.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/black.png" alt="" id="drag1" height="25px">

        <h6 class="bg-danger p-1 m-0 mt-1 text-dark rounded-3">20.00/piece</h6>
      </div>
      <div class="col-sm-3 p-2 bg-tray text-center" >
        <br>       
        <img src="./Vector/4T/blueberries.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/blueberries.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/blueberries.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/blueberries.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/blueberries.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/blueberry.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/blueberry.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/blueberry.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/blueberry.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/blueberry.png" alt="" id="drag1" height="25px">


        <h6 class="bg-danger p-1 m-0 mt-1 text-dark rounded-3">20.00/piece</h6>
      </div>
      <div class="col-sm-3 p-2 bg-tray text-center" >
        <br>       
        <img src="./Vector/4T/cherry-blossom.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/cherry-blossom.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/cherry-blossom.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/cherry-blossom.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/cherry-blossom.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/cherry.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/cherry.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/cherry.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/cherry.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/cherry.png" alt="" id="drag1" height="25px">

        <h6 class="bg-danger p-1 m-0 mt-1 text-dark rounded-3">20.00/piece</h6>
      </div>  
      <div class="col-sm-3 p-2 bg-tray text-center" >
        <br>       
        <img src="./Vector/4T/chocolate-bar.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/chocolate-bar.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/chocolate-bar.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/chocolate-bar.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/chocolate-bar.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/flower.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/flower.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/flower.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/flower.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/flower.png" alt="" id="drag1" height="25px">
        <h6 class="bg-danger p-1 m-0 mt-1 text-dark rounded-3">20.00/piece</h6>
      </div>
      <div class="col-sm-3 p-2 bg-tray text-center" >
        <br>       
        <img src="./Vector/4T/orange-slice (1).png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/orange-slice (1).png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/orange-slice (1).png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/orange-slice (1).png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/orange-slice (1).png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/orange-slice.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/orange-slice.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/orange-slice.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/orange-slice.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/orange-slice.png" alt="" id="drag1" height="25px">
        <h6 class="bg-danger p-1 m-0 mt-1 text-dark rounded-3">20.00/piece</h6>
      </div>
      <div class="col-sm-3 p-2 bg-tray text-center" >
        <br>       
        <img src="./Vector/4T/rose.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/rose.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/rose.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/rose.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/rose.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/sunflower.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/sunflower.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/sunflower.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/sunflower.png" alt="" id="drag1" height="25px">
        <img src="./Vector/4T/sunflower.png" alt="" id="drag1" height="25px">
        <h6 class="bg-danger p-1 m-0 mt-1 text-dark rounded-3">20.00/piece</h6>
      </div>
      <div class="col-sm-3 p-2 bg-tray text-center" >
        <br>       
        <img src="./Vector/4T/cream/Blue.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Blue.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Blue.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Blue.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Blue.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Choco.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Choco.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Choco.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Choco.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Choco.png" alt="" id="drag1" height="20px">
        <h6 class="bg-danger p-1 m-0 mt-1 text-dark rounded-3">20.00/piece</h6>
      </div>
      <div class="col-sm-3 p-2 bg-tray text-center" >
        <br>       
        <img src="./Vector/4T/cream/Green.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Green.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Green.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Green.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Green.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Orange.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Orange.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Orange.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Orange.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Orange.png" alt="" id="drag1" height="20px">
        <h6 class="bg-danger p-1 m-0 mt-1 text-dark rounded-3">20.00/piece</h6>
      </div>
      <div class="col-sm-3 p-2 bg-tray text-center" >
        <br>       
        <img src="./Vector/4T/cream/Pink.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Pink.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Pink.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Pink.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Pink.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Red.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Red.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Red.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Red.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Red.png" alt="" id="drag1" height="20px">
        <h6 class="bg-danger p-1 m-0 mt-1 text-dark rounded-3">20.00/piece</h6>
      </div>
      <div class="col-sm-3 p-2 bg-tray text-center" >
        <br>       
        <img src="./Vector/4T/cream/Violet.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Violet.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Violet.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Violet.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Violet.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Yellow.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Yellow.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Yellow.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Yellow.png" alt="" id="drag1" height="20px">
        <img src="./Vector/4T/cream/Yellow.png" alt="" id="drag10" height="20px">
        <h6 class="bg-danger p-1 m-0 mt-1 text-dark rounded-3">20.00/piece</h6>
      </div>
    </div>
  </div>
</div>
<script src="./node_modules/plain-draggable/plain-draggable.min.js"></script>
<script>
  drag1 = new PlainDraggable(document.getElementById('drag1'));
  drag2 = new PlainDraggable(document.getElementById('drag2'));
  drag3 = new PlainDraggable(document.getElementById('drag3'));
  drag4 = new PlainDraggable(document.getElementById('drag4'));
  drag5 = new PlainDraggable(document.getElementById('drag5'));


</script>

<?php
  include './cxfooter.php';
?>