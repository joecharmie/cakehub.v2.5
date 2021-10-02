<?php
  $title = 'CakeHub | Customization';
  include './cxnav.php';
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
  
</style>
<nav aria-label="breadcrumb " class="bg-transparent fs-5 ms-3 mt-3 " style="box-shadow: unset;">
  <ol class="breadcrumb ">
    <li class="breadcrumb-item"><a href="index.php" class="link-ftr">Home</a></li>
    <li class="breadcrumb-item"><a href="./cxcustom.base.php" class="link-ftr">Customization</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cake Icing</li>
  </ol>
</nav>

<h3 class="text-noah text-center fw-bold mt-5">CAKE CUSTOMIZATION</h3> 
<hr class="w-75 m-auto">
<h4 class="text-center text-noah mt-2 fs-4 mb-3">CAKE ICING</h4>

<div class="card w-75 m-0 p-3 mx-auto bg-pink text-light rounded-3">
  <div class="row m-0 p-0">
    <div class="col-sm-4 m-0 p-3">
      <form action="./cxcustom.toppings.php" method="get" class=" row m-0 p-0">
      
        <a name="" id="" class="btn bg-danger bg-danger text-light fw-bold rounded-pill w-25 mb-1" href="./cxcustom.base.php?imgpath=<?php echo $_GET['imgpath']; ?>&current=<?php echo $_GET['current']; ?>" role="button"><i class="fas fa-backspace"></i></a>
        
        <input type="text" name="imgpath" id="imgpath" style="visibility: hidden;" class="w-50 mb-1">

        <img id="displayImg" src="<?php echo $_GET['imgpath']; ?>" class="w-100 bg-kitchen  rounded-3" style="height: 275px;" alt="" srcset="">
        <div class="col-sm-6 m-0 pt-3">
          <button id="btnR" type="reset" class="btn bg-danger bg-danger text-light fw-bold rounded-pill  w-100"  value="<?php echo $_GET['imgpath']; ?>" >RESET </button>  
        </div>
        <div class="col-sm-6 m-0 pt-3">
          <button id="btnS" class="btn fw-bold  bg-light  rounded-pill w-100  " name="current" type="submit " value="<?php echo $_GET['current']; ?>" >NEXT</button>  
        </div>
      </form>
    </div>
    <div class="col-sm-8 row m-0 p-0 ">
      <span class="col-sm-12 text-center fw-bold">CHOOSE FROM OUR VARIETY OF ICINGS</span>

      <?php 
        if(isset($_GET['current'])){
          if($_GET['current'] == "B1" || $_GET['current'] == "B2" || $_GET['current'] == "B3"){
            include './includes/cxicing.c.inc.php';
          }
          else if($_GET['current'] == "B4" || $_GET['current'] == "B5" || $_GET['current'] == "B6"){
            include './includes/cxicing.s.inc.php';
          }
          else if($_GET['current'] == "B7" || $_GET['current'] == "B8" || $_GET['current'] == "B8"){
            include './includes/cxicing.r.inc.php';
          }
        }
      ?>

    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('#btnR').hide();
    $('#btnS').hide();
    $defDisplay = $('#btnR').val();
    $defCurrent = $('#btnS').val();
  });
  $('#btnR').on('click', function(e) {
    e.preventDefault();
    $('#displayImg').attr( "src", $defDisplay );
    $('#btnR').hide();
    $('#btnS').hide();
  });
  $('#btn1').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/sc/i_c_blue.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I1");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn2').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/sc/i_c_choco.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I2");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn3').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/sc/i_c_green.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I3");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn4').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/sc/i_c_indigo.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I4");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn5').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/sc/i_c_orange.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I5");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn6').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/sc/i_c_red.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I6");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn7').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/sc/i_c_strawberry.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I7");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn8').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/sc/i_c_violet.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I8");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn9').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/sc/i_c_white.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I9");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn10').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/sc/i_c_yellow.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I10");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn11').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/ss/i_s_blue.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I1");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn12').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/ss/i_s_choco.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I2");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn13').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/ss/i_s_green.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I3");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn14').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/ss/i_s_indigo.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I4");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn15').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/ss/i_s_orange.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I5");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn16').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/ss/i_s_red.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I6");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn17').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/ss/i_s_strawberry.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I7");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn18').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/ss/i_s_violet.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I8");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn19').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/ss/i_s_white.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I9");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn20').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/ss/i_s_yellow.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I10");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });  
  $('#btn21').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/sr/i_r_blue.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I1");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn22').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/sr/i_r_choco.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I2");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn23').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/sr/i_r_green.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I3");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn24').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/sr/i_r_indigo.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I4");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn25').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/sr/i_r_orange.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I5");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn26').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/sr/i_r_red.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I6");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn27').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/sr/i_r_strawberry.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I7");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn28').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/sr/i_r_violet.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I8");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn29').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/sr/i_r_white.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I9");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });
  $('#btn30').on('click', function(e) {
    e.preventDefault();
    $path = "./Vector/3I/sr/i_r_yellow.png";
    $('#displayImg').attr( "src", $path );
    $('#btnS').val($defCurrent + "-I10");
    $('#imgpath').val($path);
    $('#btnR').show();
    $('#btnS').show();
  });  
  
  
  


</script>

<?php
  include './cxfooter.php';
?>