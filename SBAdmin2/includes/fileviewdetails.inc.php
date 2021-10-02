<?php 

        require 'dbh.inc.php';

        $id = $_GET['view-submit'];
        $sql = "SELECT * FROM product
        WHERE (prodStat = '1' OR prodStat = '2') AND prodID='$id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){

                $pname = $row['prodName'];
                $pdesc = $row['prodDesc'];

                if ($row['prodTypeID'] == 1){
                    $ptype = "Classics";
                } 
                else if ($row['prodTypeID'] == 2){
                    $ptype = "Themed";
                }
                else if ($row['prodTypeID'] == 3){
                    $ptype = "Custom Cake Ingredient";
                }
                $type = $row['prodTypeID'];
                $pprice = $row['prodPrice'];
                $pqty = $row['prodQty'];
                
                if($row['prodStat'] == 1){
                    $stat = "Active";    
                }
                else if($row['prodStat'] == 2){
                    $stat = "Inactive";    
                }
                $pstat = $row['prodStat'];
                
                
            }
        }

        mysqli_close($conn);

        
//code po for the image upload and display - end
