<?php 

        require 'dbh.inc.php';

        $id = $_GET['view-submit'];
        $sql = "SELECT cxcakeorder.*, cxcartorder.*, product.prodName, product.prodPrice, contact.cxName
        FROM cxcakeorder 
        JOIN cxcartorder
        ON cxcakeorder.cakeOrderID = cxcartorder.cartCakeOID
        JOIN product
        ON cxcakeorder.cakeProdID = product.prodID
        JOIN contact
        ON cxcartorder.cartCxID = contact.cxTempID
        WHERE  cakeStat = '2' AND cartCakeOID='$id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $pname = $row['prodName'];
                $pid = $row['cakeProdID'];
                $cqty = $row['cakeQty'];
                $uprice = $row['prodPrice'];
                $tprice = $uprice * $cqty; 
                $cdate = $row['cakeDelivD'];
                $cxref = $row['cartCxID'];
                $cxname = $row['cxName'];
                $oref = $row['cartCakeOID'];

                
                if($row['cartStat'] == 1){
                    $stat = "In Cart";    
                }
                else if($row['cartStat'] == 2){
                    $stat = "Pending Payment";    
                }
                else if($row['cartStat'] == 3){
                    $stat = "Baking in Process";    
                }
                else if($row['cartStat'] == 4){
                    $stat = "Pending Deliveries";    
                }
                else if($row['cartStat'] == 5){
                    $stat = "Completed";    
                }
                
            }
        }
        else{
                $pname = "not found";
                $pid = "not found";
                $cqty = "not found";
                $uprice = "not found";
                $tprice = "not found"; 
                $cdate = "not found";
                $cxref = "not found";
                $cxname = "not found";
                $oref = "not found";

        }
        mysqli_close($conn);

        
//code po for the image upload and display - end
?>