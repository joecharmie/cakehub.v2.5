<?php
  session_start();
  if(isset($_SESSION['userId'])){
    include "./SBAdmin2/includes/dbh.inc.php";
    //get roleid to determine access, and get first name to display in layout
    $personID = $_SESSION['userId'];
    $sql = "SELECT person.personFname FROM person WHERE personID = '$personID'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            $_SESSION['ufn'] = $row['personFname']; //user first name
        }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="icon" href="Images/favicon2.ico" type = "ico" sizes = "16x16">
  <title><?php echo $title;  ?></title>


  <!-- bootstrap 5 and font-awesome -- start -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

  <!-- font awesome -->
  
  <link rel="stylesheet" href="./css/cxnav4.css">
  <link rel="stylesheet" href="./css/cxfooter1.css">
  <link rel="stylesheet" href="./css/cxcolor.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/> 
  <!-- bootstrap and font-awesome -- end -->
  
  <!-- jquery - start -->
  <!-- <script src="jquery-3.5.1.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>
  <!-- jquery - end -->

  <style>
    #button-addon2:hover{
      color:rgb(209, 89,87) !important;
      border-color:hsl(360, 71%, 66%) !important;
    }
    .btn:focus {
    outline: 0 !important;
    box-shadow: unset;
    background: var(--clr-red-light);
    }
    @font-face {
        font-family: noah;
        src: url(Noah/WEB/Noah-Regular.woff);
    }
    @font-face {
        font-family: noah-bold;
        src: url(Noah/WEB/Noah-Bold.woff);
    }
    body{
      font-family: noah;
    }
    .text-bold{
      font-family: noah-bold;
    }
    .text-noah{
      font-family:noah;
    }
    .clr-pink{
      color: var(--clr-dark-pink) !important;
    }
    .bg-dpink{
      background: var(--clr-dark-pink) !important;
    }
    .bg-dpink:hover{
      background: var(--clr-red-light) !important;
    }
    .bg-transparent{
      background: transparent !important;
      box-shadow: unset !important;
      border: transparent !important;
    }
    .bg-lpink{     
      background: var(--clr-red-light) !important;  
    }
    .bg-lpink:hover{     
      background: #f5d7d5 !important;   
    }
    .bg-pink{     
      background: var(--clr-dark-pink) !important; 
    }
    .border-pink{
      border: solid 1px var(--clr-dark-pink) !important; 
      background: transparent ;
    }
  </style>

</head>
<body style="background:  #f5e3e1; ">
  <nav style="background: rgb(209, 89,87); width: 100% !important;  z-index: 2; position:fixed !important; margin-top: 0 !important;" >
    <div class="nav-center">
      <!-- nav header -->
      <div class="nav-header ">
        <a href="index.php">
        <img src="./Images/1.png" class="logo" alt="logo" />
        </a>
        <button class="nav-toggle">
          <i class="fas fa-bars text-white"></i>
        </button>
      </div>
      <!-- links -->
  
   
      <ul class="links p-0 m-0  align-middle ">
  
        <li class="px-1 py-1 text-start">
            <a  class="fw-bold btn m-0 p-0 h-100 text-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"  style="display: unset;" >
              <i class="fa fa-2x text-light fa-birthday-cake pe-1" aria-hidden="true"></i>
              Cake Types
            </a>
            <ul class="dropdown-menu dropdown-menu-end mt-3">
              <li><a href="cxcakes.php?type=1" class="dropdown-item link-ftr fw-bold" >Classic Cakes</a></li>
              <li><a href="cxcakes.php?type=2" class="dropdown-item link-ftr fw-bold">Themed Cakes</a></li>
              <li><a href="./cxcustom.base.php" class="dropdown-item link-ftr fw-bold" >Customize Your Cake</a></li>
              <li><a href="cxcakes.php" class="dropdown-item link-ftr fw-bold" >For You</a></li>
            </ul>
        </li>

        <li class="px-1 py-1 text-start">
          <div class="input-group">
            <input type="text" class="form-control " placeholder="Cake Name" aria-label="Cake Name" aria-describedby="button-addon2">
            <button class="btn btn-outline-light text-light " type="button" id="button-addon2">Search</button>
          </div>
        </li>
        <li class="px-1 py-1 text-start">
          <a href="./cxseller.php" class="btn m-0 p-0 text-light " style="display: unset;">
            <i class="fa fa-2x fa-hand-holding-usd text-light " aria-hidden="true"></i> 
            <span id="cxseller" class="fw-bold"></span>
            </a>
        </li>
        <li class="px-1 py-1 text-start">
          <a href="./cxcart.php" class="btn m-0 p-0 text-light " style="display: unset;">
            <i class="fa fa-2x fa-shopping-cart text-light " aria-hidden="true"></i> 
            <span id="cxcart" class="fw-bold"></span>
            </a>
        </li>
      
        <li class="px-1 py-1 text-start">
            <a class="btn m-0 p-0 text-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="display: unset;">
         
            <i class="fa fa-2x fa-user-circle text-light " aria-hidden="true"></i>
            <span id="myprofile" class="fw-bold"></span>
              
            </a>

            <ul class="dropdown-menu dropdown-menu-end mt-3 ">
              <?php
                if(isset($_SESSION['userId'])){
                  echo '
                    <li><a href="./cxprofile.php" class="dropdown-item link-ftr fw-bold" >'.$_SESSION['ufn'].'</a></li>
                  ';

                  // my orders opt should be gone if user is NOT signed in
                  echo '
                    <li><a href="./cxorder.php" class="dropdown-item link-ftr fw-bold" >My Orders</a></li>
                  ';

                  //log out opt should be gone if user is NOT signed in
                  echo '
                    <li><a href="./includes/logout.inc.php" class="dropdown-item link-ftr fw-bold" >Logout</a></li>
                  ';
                  
                }
                else{
                  // register opt should be gone if user is signed in 
                  echo '
                    <li><a href="./cxregister.php" class="dropdown-item link-ftr fw-bold" >Register</a></li>
                  ';

                  // log in opt should be gone if user is signed in
                  echo '
                    <li><a href="./cxlogin.php" class="dropdown-item link-ftr fw-bold" >Login</a></li>
                  ';
                  
                  
                }
              ?>
              
            </ul>
        </li>
     
      </ul>
   
      
    </div>
  </nav>
  <br><br><br>
