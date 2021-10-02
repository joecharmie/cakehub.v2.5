<?php 

        require 'dbh.inc.php';

        if ($type == 0){
            $sql = "SELECT product.ProdID, product.prodName, product.prodPrice, product.prodImg, person.personBakeryName, contact.cxBarangay, contact.cxCity
            FROM product
            JOIN person
            ON product.prodSellerID = person.personID
            JOIN contact
            ON person.personID = contact.cxPersonID
            WHERE (prodStat = '1' OR prodStat = '2')";
        }
        else {
            $sql = "SELECT product.ProdID, product.prodName, product.prodPrice, product.prodImg, person.personBakeryName, contact.cxBarangay, contact.cxCity
            FROM product
            JOIN person
            ON product.prodSellerID = person.personID
            JOIN contact
            ON person.personID = contact.cxPersonID
            WHERE (prodStat = '1' OR prodStat = '2') AND prodTypeID = '".$type."'";
        }
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
  
                $location = $row['cxBarangay'].", ".$row['cxCity'];
                if(empty($location)){
                    $location = "Unknown";
                }

                echo '
                    <div class="col-md-4 col-lg-4 col-sm-4 p-4  rounded-3  ">
                        <a href="cxcakeview.php?cake='.$row['ProdID'].'" >
                        <div class="prod-container text-center mb-2">
                            <img src="./SBAdmin2/includes/'.$row['prodImg'].'?'.mt_rand().'" class="img-container rounded-3 pb-2" alt="" srcset="" height="250px">       
                        </div>
                            <h4 class="fs-3 text-center text-bold m-0 link-ftr ">'.$row['prodName'].'</h4>
                            <h5 class="text-center m-0 text-dark mb-3">&#8369;'.$row['prodPrice'].'.00</h5>
                            <h6 class="text-center m-0 text-dark float-start ms-3">'.$row['personBakeryName'].'</h6>
                            <small class="text-center m-0 text-muted float-end me-3 align-bottom">'.$location.'</small>
                        </a>
                    </div>
                ';
            }
            
        }
        mysqli_close($conn);
        $crt = 0;

        