<?php
    require './includes/dbh.inc.php';
    
    if(isset($_SESSION['userId'])){
        $ctr = 0;
        $cx = $_SESSION['userId'];
        $tprice = 0;
        $sql = "SELECT  product.prodImg, product.prodName, product.prodPrice, cxcakeorder.cakeOrderID, cxcakeorder.cakeDelivD, cxcakeorder.cakeDelivT, cxcakeorder.cakeQty, cxcakeorder.cakeCompPrice
        FROM product JOIN cxcakeorder ON product.prodID = cxcakeorder.cakeProdID 
        JOIN cxcartorder ON cxcakeorder.cakeOrderID = cxcartorder.cartCakeOID 
        WHERE cxcakeorder.cakeStat = 1 AND cxcartorder.cartCxID = '".$cx."' ;";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)){
                    $ctr += 1;
                    $img = $row['prodImg'];
                    $name = strtoupper($row['prodName']);    
                    // $delivD = $row['cakeDelivD'];
                    $delivD = date("M j, Y",strtotime($row['cakeDelivD']));
                    $delivT = $row['cakeDelivT'];
                    $qty = $row['cakeQty'];
                    $price = number_format($row['cakeCompPrice']);              
                    $prodprice = $row['prodPrice'];

                    $tprice += $row['cakeCompPrice'];
                    $OID = $row['cakeOrderID'];

                    echo '
                        
                    <div class="row w-75 mx-auto bg-pink text-light rounded-3 my-3">

                        <div class="row m-0 p-0">
                            <div class="col-sm-5 m-0 p-0">
                                <div class = "m-0 p-0 prod-container  w-100">
                                    <img class="img-container mt-3" src="./SBAdmin2/includes/'.$img.'?'.mt_rand().'">
                                </div>
                            </div>

                            <div class="col-sm-7 row m-0 p-3 ">
                                
                                <div class="col-sm-6  my-auto">
                                <h3 class="text-bold fs-3 m-0 ">'.$name.'</h3>
                                <h4 class="text-bold m-0 ms-3 ">Php '.$prodprice.'.00</h4>
                                <h6 class="m-0 mt-2 ms-3 ">Delivery Date: '.$delivD.'</h6>
                                <h6 class="m-0 ms-3 ">Delivery Time: '.$delivT.'</h6>
                                <h6 class="m-0 text-bold mt-3 ">COMPUTED PRICE: '.$price.'</h6>
                                </div>

                                <div class="col-sm-3  p-0 my-auto">
                                <div class="p-0 pt-3 m-0 text-center row m-0">
                                    <span>QUANTITY</span>
                                    <form action="./includes/itemqty.inc.php" method="get">
                                    <div class=" text-center  p-0 m-0" >
                                        <button class=" btn1 p-1  no-outline1 minus-btn" type="button" name="button"  onclick="confirmBtn'.$ctr.'()" ><i class="fa fa-minus" aria-hidden="true"></i>
                                        </button>
                                        <input class="no-outline text-center rounded-3" id="qtyValue'.$ctr.'" style="width: 29%;" type="text" name="qty" value="'.$qty.'" onkeyup="confirmBtn'.$ctr.'()">
                                        <button class=" btn1 p-1  no-outline1 plus-btn"  type="submit" name="button" onclick="confirmBtn'.$ctr.'()"><i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <button class="btn mt-3 btn1 text-light text-bold w-75 mx-auto" id="confirm'.$ctr.'" disabled type="submit" name="id" value="'.$OID.'"><small>Confirm</small></button>
                                    </form>

                                </div> 
                                </div>
                                <div class="col-sm-3 p-0 my-auto text-center ">
                                    <form action="./includes/itemremove.inc.php" method="get">
                                        <button class="btn mt-3 btn1 text-light text-bold" name="id" value="'.$OID.'">Remove</button>
                                    </form>
                                </div>

                            </div>
                            
                        </div>
                    </div>
                    ';


                    echo '
                    
                        <script>
                            
                        

                            function confirmBtn'.$ctr.'() {   
                                var y = document.getElementById("confirm'.$ctr.'");

                                y.disabled = false;
                            }
                        </script>
                    ';


                    
                    
                }
            }
            else{
                echo "<div class='list-container text-center   my-3 '>";
                echo '<img src="./Images/emptycart.svg" alt="" srcset="" class="w-25 mb-3">';
                echo "<p class='text-dark'>Nothing to display</p>";
                echo '<a name="" id="" class=" rounded-pill btn btn-primary bg-danger" style="border-color:transparent; " href="./index.php" role="button">Browse Cakes</a>';
                echo "</div>";
            }
        mysqli_close($conn);
    }
    else{
        echo "<div class='list-container text-center   my-3 '>";
        echo '<img src="./Images/emptycart.svg" alt="" srcset="" class="w-25 mb-3">';
        echo "<p class='text-dark'>Nothing to display</p>";
        echo '<a name="" id="" class=" rounded-pill btn btn-primary bg-danger" style="border-color:transparent; " href="./index.php" role="button">Browse Cakes</a>';
        echo "</div>";
        $tprice = 0;
    }