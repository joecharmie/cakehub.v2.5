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

  <title>Online Payment</title>

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
    <div class="text-center">
      <div class="w-75 card m-auto mt-3">
        <img class="card-img-top" src="holder.js/100x180/" alt="">
        <div class="card-body">
          <h2 class="card-title mt-3 mb-4">Online Payment</h2>
          
          <p>Total Amount: Php (amount).00 </p>
          <p class="card-text">Choose your payment method:</p>

          <button type="button" class="w-75 btn btn-primary m-3 p-3" data-bs-toggle="modal" data-bs-target="#modalGCash">GCash</button>
          <button type="button" class="w-75 btn btn-success m-3 p-3" data-bs-toggle="modal" data-bs-target="#modalPaymaya">Paymaya</button>
          <button type="button" class="w-75 btn btn-warning m-3 p-3" data-bs-toggle="modal" data-bs-target="#modalCoinsPH">Coins.ph</button>
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
            <form action="#" method="get">
              <p>Total Amount: Php (Amount).00</p>
              <p>Send to this number: 09123456789</p>

              <label for="">Reference ID:</label>
              <input type="text" class="form-control" name="refid" id="" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Enter the reference id of the transaction after transferring the money</small>
              
              <br><br>
              <input type="checkbox" name="confirm" id="myCheck1" onclick="funcBtnAble1()" >
              <small class="form-text text-muted">I hereby confirm that I have entered the correct reference id of the transaction and have transferred the correct amount that was stated. In case that there are problems, I will be in touch with CakeHub to settle such matters</small>
              <br>
              <button type="submit" class="float-end btn btn-success" id="btnPaid1" disabled>Paid</button>

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
            <form action="#" method="get">
              <p>Total Amount: Php (Amount).00</p>
              <p>Send to this number: 09123456789</p>

              <label for="">Reference ID:</label>
              <input type="text" class="form-control" name="refid" id="" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Enter the reference id of the transaction after transferring the money</small>
              
              <br><br>
              <input type="checkbox" name="confirm" id="myCheck2" onclick="funcBtnAble2()" >
              <small class="form-text text-muted">I hereby confirm that I have entered the correct reference id of the transaction and have transferred the correct amount that was stated. In case that there are problems, I will be in touch with CakeHub to settle such matters</small>
              <br>
              <button type="submit" class="float-end btn btn-success" id="btnPaid2" disabled>Paid</button>

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
            <form action="#" method="get">
              <p>Total Amount: Php (Amount).00</p>
              <p>Send to this number: 09123456789</p>

              <label for="">Reference ID:</label>
              <input type="text" class="form-control" name="refid" id="" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">Enter the reference id of the transaction after transferring the money</small>
              
              <br><br>
              <input type="checkbox" name="confirm" id="myCheck3" onclick="funcBtnAble3()" >
              <small class="form-text text-muted">I hereby confirm that I have entered the correct reference id of the transaction and have transferred the correct amount that was stated. In case that there are problems, I will be in touch with CakeHub to settle such matters</small>
              <br>
              <button type="submit" class="float-end btn btn-success" id="btnPaid3" disabled>Paid</button>

            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="./js-customize/script-navbar1.js"></script>
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
</body>
</html>