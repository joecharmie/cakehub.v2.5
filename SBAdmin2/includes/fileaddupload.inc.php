<?php
    session_start();
    require_once 'dbh.inc.php';
    
        $file = $_FILES["THEfile"];        
  
        $FILEname = $_FILES["THEfile"]["name"];
        $FILEtype = $_FILES["THEfile"]["type"];
        $FILEtmp_name = $_FILES["THEfile"]["tmp_name"];
        $FILEerror = $_FILES["THEfile"]["error"];
        $FILEsize = $_FILES["THEfile"]["size"];
        
        
        $sql = "SELECT ProdID FROM product 
                WHERE prodName = '$pname';";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                                $id = $row['ProdID'];
                            }
                        }
                    } 

        $fileExt = explode(".",$FILEname);     
        $fileActualExt = strtolower(end($fileExt)); 
        $allowed = array("jpg","jpeg","png");

        if(!in_array($fileActualExt,$allowed)){
            header("Location: ../../adFileManagement.php?error=extensionnotallowed");
            exit();
        } 
        else{
            if(!$FILEerror == 0){
                header("Location: ../../adFileManagement.php?error");
            } else {
                if($FILEsize < 10000000){
                    $fileNewName = "product".$id.".".$fileActualExt;
                    
                    $fileDestination = "produploads/".$fileNewName;
                    
                    move_uploaded_file($FILEtmp_name,$fileDestination);
                    
                    $sql = "UPDATE product SET prodImg = '".$fileDestination."' WHERE ProdID='".$id."';";
                    $return = mysqli_query($conn,$sql);

                }else {
                    //10000000B = 10MB
                    header("Location: ../../adFileManagement.php?error=filetoolarge");
                    exit();
                }

            }
        }


