<?php 

        require 'dbh.inc.php';

        $id = $_GET['cake'];
        $sql = "SELECT *
        FROM product
        WHERE (prodStat = '1' OR prodStat = '2') AND ProdID = ".$id;
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $name = strtoupper($row['prodName']);
                $tabname=$row['prodName'];
                $desc = $row['prodDesc'];
                $type = $row['prodTypeID'];
                $price = $row['prodPrice'];
                $img = $row['prodImg'];
            }            
        }

        if($type == 1){
            $typename = "Classics";
        }
        else if($type == 2){
            $typename = "Themed";
        }
        mysqli_close($conn);

        