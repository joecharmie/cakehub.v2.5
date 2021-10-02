<?php
    require './includes/dbh.inc.php';
    
    if(isset($_SESSION['userId'])){
      $cx = $_SESSION['userId'];
      $sql = "SELECT  product.prodName, cxcakeorder.cakeQty, cxcakeorder.cakeCompPrice, cxcartorder.cartOrderID
      FROM product JOIN cxcakeorder ON product.prodID = cxcakeorder.cakeProdID 
      JOIN cxcartorder ON cxcakeorder.cakeOrderID = cxcartorder.cartCakeOID 
      WHERE cxcakeorder.cakeStat = 1 AND cxcartorder.cartCxID = '".$cx."' ;";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){              
          $name = $row['prodName'];    
          $qty = $row['cakeQty'];
          $price = number_format($row['cakeCompPrice']);              
          echo '
            <tr >
              <th>'.$name.'</th>
              <th>'.$qty.'</th>
              <th>Php '.$price.'.00</th>
            </tr>
          ';

        }
      }

      
      
    }