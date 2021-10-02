<?php
    require './includes/dbh.inc.php';

    $tprice = 0;
    $sql = "SELECT product.prodName, cxcakeorder.cakeCompPrice, cxcakeorder.cakeQty
    FROM product JOIN cxcakeorder ON product.ProdID = cxcakeorder.cakeProdID 
    JOIN cxcartorder ON cxcakeorder.cakeOrderID = cxcartorder.cartCakeOID 
    WHERE cxcartorder.cartCxID = '".$cx."';";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $name = $row['prodName'];    
                $qty = $row['cakeQty'];
                $price = number_format($row['cakeCompPrice']);

                $tprice += $row['cakeCompPrice'];
                echo "<tr>";
                    echo"<td>".$name." x ".$qty."(Qty)</td>";
                    echo"<td>&#8369;".$price.".00</td>";
                echo "</tr>";
            }
        }
    mysqli_close($conn);