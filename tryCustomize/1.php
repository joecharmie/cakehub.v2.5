<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- bootstrap 4 - start -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <!-- bootstrap 4 - end  -->

  <!-- navbar and font-awesome -start -->
  <link rel="stylesheet" href="./css/navbar1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
  <!-- navbar and font-awesome -end -->

  <link rel="stylesheet" href="./css/Ccustomize.css">

  <title>Customize | Cakebase</title>

</head>
<body>


  <nav style="background: rgb(209, 89,87); width: 100% !important;" >
    <div class="nav-center">
      <!-- nav header -->
      <div class="nav-header">
        <img src="./Images/1.png" class="logo" alt="logo" />
        <button class="nav-toggle">
          <i class="fas fa-bars"></i>
        </button>
      </div>
      <!-- links -->
      <ul class="links">
        <li>
          <a href="#" class="text-light">
            My Cart
            <i class="fa fa-shopping-cart text-light " aria-hidden="true"></i>
          </a>
        </li>
      </ul>
   
      
    </div>
  </nav>

  <main>
    <h2 id="txt-sample">CAKE BASE SETTINGS</h2> 
    <div class="row"> 

      <div class="options col-sm-6 col-md-6 col-lg-6 text-center" >

        
          <button class="btn btn-primary w-75 m-1 opt-btns" type="button" id="btn1">
            Round Butter | Php 100.00
            <img src="./imgcBase/7.png" alt="" class="w-25 rounded" srcset="">
          </button>
        
          <button class="btn btn-primary w-75 m-1 opt-btns" type="button" id="btn2">
            Round Chocolate | Php 125.00
            <img src="./imgcBase/8.png" alt="" class="w-25 rounded" srcset="">
          </button>
        
          <button class="btn btn-primary w-75 m-1 opt-btns" type="button" id="btn3">
            Round Strawberry | Php 150.00
            <img src="./imgcBase/9.png" alt="" class="w-25 rounded" srcset="">
          </button>    


      </div>

      <div class="display col-sm-6 col-md-6 col-lg-6 " >
        <img src="./imgcDisplay/11.png" class="w-75 rounded-img"  alt="" srcset="" id="displayImg">

        <button class="btn btn-primary r-btns w-75 m-1" type="button" id="btnR" style="visibility: hidden; ">
          Reset
        </button> 
        <form action="2.php" method="get">
          

          <button class="btn btn-primary w-75 m-1 opt-btns"  id="btnS" style="visibility: hidden;" name="current" type="submit">
            Submit
          </button> 
          <input type="text" name="imgpath" id="imgpath" style="visibility: hidden;"> 
        </form>

      </div>


    </div>
  </main>
  <script src="./js-customize/script-cakeBase3.js"></script>
  <script src="./js-customize/script-navbar1.js"></script>
  <!-- <script src="./js-customize/script-1.js"></script> -->
</body>
</html>