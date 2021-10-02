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
    <li class="breadcrumb-item active" aria-current="page">Cake Base and Filling</li>
  </ol>
</nav>

<h3 class="text-noah text-center fw-bold mt-5">CAKE CUSTOMIZATION</h3> 
<hr class="w-75 m-auto">
<h4 class="text-center text-noah mt-2 fs-4 mb-3">CAKE BASE AND FILLING</h4>

<div class="card w-75 m-0 p-3 mx-auto bg-pink text-light rounded-3">
  <div class="row m-0 p-0">
    <div class="col-sm-4 m-0 p-3">
      <form action="./cxcustom.icing.php" method="get" class=" row m-0 p-0">
         
        
        <?php
          if(isset($_GET['imgpath'])){
            echo '
              <input type="text" name="imgpath" id="imgpath" value="'.$_GET['imgpath'].'" style="visibility: hidden;">
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
      <span class="col-sm-12 text-center fw-bold">CHOOSE FROM OUR CHOCOLATE, VANILLA AND STRAWBERRY FILLING AND BASES.</span>
      <div class="col-sm-3 p-2   text-center">
        <br>
        <span class="fs-5 fw-bold " >Round </span>
        
      </div>
      <div class="col-sm-3 p-2 py-1">
        <button id="btn1" class="btn bg-lpink rounded-3 p-1 py-0 my-0 text-center">
          <img src="./Vector/1B/c/b_c_c.png" class="w-75  " alt="" srcset="">         
        </button>
      </div>
      <div class="col-sm-3 p-2 py-1">
        <button id="btn2" class="btn bg-lpink rounded-3 p-1 py-0 my-0 text-center">
          <img src="./Vector/1B/c/b_c_v.png" class="w-75 " alt="" srcset="">
        </button>
      </div>
      <div class="col-sm-3 p-2 py-1">
        <button id="btn3" class="btn bg-lpink rounded-3 p-1 py-0 my-0 text-center">
          <img src="./Vector/1B/c/b_c_s.png" class="w-75 " alt="" srcset="">         
        </button>
      </div>

      <div class="col-sm-3 p-2   text-center">
        <br>
        <span class="fs-5 fw-bold " >Square</span>
        
      </div>
      <div class="col-sm-3 p-2 py-1">
        <button id="btn4" class="btn bg-lpink rounded-3 p-1 py-0 my-0 text-center">
          <img src="./Vector/1B/s/b_s_c.png" class="w-75  " alt="" srcset="">
          
        </button>
      </div>
      <div class="col-sm-3 p-2 py-1">
        <button id="btn5" class="btn bg-lpink rounded-3 p-1 py-0 my-0 text-center">
          <img src="./Vector/1B/s/b_s_v.png" class="w-75 " alt="" srcset="">
        </button>
      </div>
      <div class="col-sm-3 p-2 py-1">
        <button id="btn6" class="btn bg-lpink rounded-3 p-1 py-0 my-0 text-center">
          <img src="./Vector/1B/s/b_s_s1.png" class="w-75 " alt="" srcset="">         
        </button>
      </div>

      <div class="col-sm-3 p-2   text-center">
        <br>
        <span class="fs-5 fw-bold " >Rectangle 
        </span>
        
      </div>
      <div class="col-sm-3 p-2 py-1">
        <button id="btn7" class=" btn bg-lpink rounded-3 p-1 py-0 my-0 text-center">
          <img src="./Vector/1B/r/b_r_c.png" class="w-75  " alt="" srcset="">         
        </button>
      </div>
      <div class="col-sm-3 p-2 py-1">
        <button id="btn8" class="btn bg-lpink rounded-3 p-1 py-0 my-0 text-center">
          <img src="./Vector/1B/r/b_r_v.png" class="w-75 " alt="" srcset="">
        </button>
      </div>
      <div class="col-sm-3 p-2 py-1">
        <button id="btn9" class="btn bg-lpink rounded-3 p-1 py-0 my-0 text-center">
          <img src="./Vector/1B/r/b_r_s.png" class="w-75 " alt="" srcset="">         
        </button>
      </div>


    </div>
  </div>
</div>

<script>
  let img = document.querySelector("#displayImg");
  let btn1 = document.querySelector("#btn1");
  let btn2 = document.querySelector("#btn2");
  let btn3 = document.querySelector("#btn3");
  let btn4 = document.querySelector("#btn4");
  let btn5 = document.querySelector("#btn5");
  let btn6 = document.querySelector("#btn6");
  let btn7 = document.querySelector("#btn7");
  let btn8 = document.querySelector("#btn8");
  let btn9 = document.querySelector("#btn9");
  let btnR = document.querySelector("#btnR");
  let btnS = document.querySelector("#btnS");
  let imgpath = document.querySelector("#imgpath");

  btn1.addEventListener('click', () => {
    img.src = './Vector/1B/sc/s_c_c.png';
    btnR.style.visibility = "visible";
    btnS.style.visibility = "visible";
    btnS.value = "B1";
    imgpath.value = './Vector/1B/sc/s_c_c.png';
  })
  btn2.addEventListener('click', () => {
    img.src = './Vector/1B/sc/s_c_v.png';
    btnR.style.visibility = "visible";
    btnS.style.visibility = "visible";
    btnS.value = "B2";
    imgpath.value = './Vector/1B/sc/s_c_v.png';
  })
  btn3.addEventListener('click', () => {
    img.src = './Vector/1B/sc/s_c_s.png';
    btnR.style.visibility = "visible";
    btnS.style.visibility = "visible";
    btnS.value = "B3";
    imgpath.value = './Vector/1B/sc/s_c_s.png';
  })
  btn4.addEventListener('click', () => {
    img.src = './Vector/1B/ss/s_s_c.png';
    btnR.style.visibility = "visible";
    btnS.style.visibility = "visible";
    btnS.value = "B4";
    imgpath.value = './Vector/1B/ss/s_s_c.png';
  })
  btn5.addEventListener('click', () => {
    img.src = './Vector/1B/ss/s_s_v.png';
    btnR.style.visibility = "visible";
    btnS.style.visibility = "visible";
    btnS.value = "B5";
    imgpath.value = './Vector/1B/ss/s_s_v.png';
  })
  btn6.addEventListener('click', () => {
    img.src = './Vector/1B/ss/s_s_s1.png';
    btnR.style.visibility = "visible";
    btnS.style.visibility = "visible";
    btnS.value = "B6";
    imgpath.value = './Vector/1B/ss/s_s_s1.png';
  })
  btn7.addEventListener('click', () => {
    img.src = './Vector/1B/sr/s_r_c.png';
    btnR.style.visibility = "visible";
    btnS.style.visibility = "visible";
    btnS.value = "B7";
    imgpath.value = './Vector/1B/sr/s_r_c.png';
  })
  btn8.addEventListener('click', () => {
    img.src = './Vector/1B/sr/s_r_v.png';
    btnR.style.visibility = "visible";
    btnS.style.visibility = "visible";
    btnS.value = "B8";
    imgpath.value = './Vector/1B/sr/s_r_v.png';
  })
  btn9.addEventListener('click', () => {
    img.src = './Vector/1B/sr/s_r_s.png';
    btnR.style.visibility = "visible";
    btnS.style.visibility = "visible";
    btnS.value = "B9";
    imgpath.value = './Vector/1B/sr/s_r_s.png';
  })
  btnR.addEventListener('click', () => {
  img.src = './Vector/def.png'; 
  btnR.style.visibility = "hidden";
  btnS.style.visibility = "hidden";
  })
</script>

<?php
  include './cxfooter.php';
?>