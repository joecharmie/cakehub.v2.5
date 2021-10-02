<?php
require './includes/dbh.inc.php';

if(isset($_SESSION['userId'])){
  $ctr = 0;
  $cx = $_SESSION['userId'];
  $tprice = 0;
  $sql = "SELECT product.prodImg, product.prodName, product.prodPrice, cxcakeorder.cakeOrderID, cxcakeorder.cakeDelivD, cxcakeorder.cakeDelivT, cxcakeorder.cakeQty, cxcakeorder.cakeCompPrice, cxcartorder.cartOrderID, cxcartorder.cartStat
  FROM `contact` 
  JOIN `cxcartorder` ON contact.cxTempID = cxcartorder.cartCxID 
  JOIN `cxcakeorder` ON cxcartorder.cartCakeOID = cxcakeorder.cakeOrderID 
  JOIN product ON product.prodID = cxcakeorder.cakeProdID 
  WHERE contact.cxPersonID = 'CX-120914-073221' AND cxcakeorder.cakeStat = 2
  AND (cxcartorder.cartStat = 2 OR cxcartorder.cartStat = 3 OR cxcartorder.cartStat = 4);";

  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
      $cartid = strtoupper($row['cartOrderID']);
      $img = $row['prodImg'];
      $name = strtoupper($row['prodName']);    
      $delivD = date("M j, Y",strtotime($row['cakeDelivD']));
      $delivT = $row['cakeDelivT'];
      $qty = $row['cakeQty'];
      $price = number_format($row['cakeCompPrice']);              
      $prodprice = $row['prodPrice'];

      $tprice += $row['cakeCompPrice'];
      $cakeOID = $row['cakeOrderID'];

      if($row['cartStat'] == 2){
        $pstat = "Pending";
        $cstat = "Pending";
        $dstat = "Pending";
      }
      else if($row['cartStat'] == 3){
        $pstat = "Paid";
        $cstat = "Pending";
        $dstat = "Pending";
      }
      else if($row['cartStat'] == 4){
        $pstat = "Paid";
        $cstat = "Ready";
        $dstat = "Pending";
      }

      echo '
      
      <div class="row mx-auto my-3">

        <div class="row m-0 p-0">
          <div class="col-sm-5 m-0 p-0">
            <div class = "m-0 p-0 prod-container  w-100">
                <img class="img-container mt-3" src="./SBAdmin2/includes/'.$img.'?'.mt_rand().'">
            </div>
          </div>
          <div class="col-sm-7 row m-0 p-3 ">
            
            <div class="col-sm-6  my-auto">
              <h6 class="m-0 mb-3 fw-bold">CART ID: '.$cartid.'</h6>
              
              <h3 class="text-bold fs-3 m-0 ">'.$name.'</h3>
              <h4 class="text-bold m-0 ms-3 ">Php '.$price.'.00</h4>
              <h4 class="text-bold m-0 ms-3 ">Quantity: '.$qty.'</h4>
              <h6 class="m-0 mt-2 ms-3 ">Delivery Date: '.$delivD.'</h6>
              <h6 class="m-0 ms-3 ">Delivery Time: '.$delivT.'</h6>
                    
              
            </div>

            <div class="col-sm-6 p-0 my-auto text-center ">

              
              
              <h6 class="m-0 ms-3 fw-bold">Payment Status: '.$pstat.'</h6>
              <h6 class="m-0 ms-3 fw-bold">Cake Status: '.$cstat.'</h6>
              <h6 class="m-0 ms-3 fw-bold">Delivery Status: '.$dstat.'</h6>

              ';


              if($row['cartStat'] == 2){
              echo '
              <form action="./includes/cxordercancel.inc.php" method="get" > 
              <!-- button will disappear if customer has paid -->       
              <a href="./cxpayment.php?cake='.$cakeOID.'" class="btn mt-3 btn1 text-light text-bold">Pay up</a> 
              <!-- button will disappear if customer has paid --> 
              
                <button type="submit" name="cakeOID" value="'.$cakeOID.'" class="btn mt-3 btn1 text-light text-bold">Cancel </button>
              </form >
              <br>
              <small class=" m-0 p-0">Applicable only for pending payments.</small>
              ';
              }

              echo '
            </div>

          </div>
          
        </div>
      </div>
      <hr>
      ';
    }
  }
  else{
    echo "<div class='list-container text-center   my-3 py-5'>";
        echo '<img src="./Images/emptycart.svg" alt="" srcset="" class="w-25 mb-3">';
        echo "<p class='text-light'>Nothing to display</p>";
        echo '<a name="" id="" class=" rounded-pill btn btn-primary bg-danger" style="border-color:transparent; " href="./index.php" role="button">Browse Cakes</a>';
    echo "</div>";
    
  }
}
else{
  echo "<div class='list-container text-center   my-3 py-5'>";
        echo '<img src="./Images/emptycart.svg" alt="" srcset="" class="w-25 mb-3">';
        echo "<p class='text-light'>Nothing to display</p>";
        echo '<a name="" id="" class=" rounded-pill btn btn-primary bg-danger" style="border-color:transparent; " href="./index.php" role="button">Browse Cakes</a>';
    echo "</div>";
  
}