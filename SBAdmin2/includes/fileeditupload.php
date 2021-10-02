<?php
    require_once 'dbh.inc.php';
    if (isset($_FILES["theFILE"])) {
        
        $file = $_FILES["theFILE"];        
  
        //separate the data from the array into separate variables
        $FILEname = $_FILES["theFILE"]["name"];
        $FILEtype = $_FILES["theFILE"]["type"];
        $FILEtmp_name = $_FILES["theFILE"]["tmp_name"];
        $FILEerror = $_FILES["theFILE"]["error"];
        $FILEsize = $_FILES["theFILE"]["size"];
        
        $id = $_POST['edit-submit'];     
         
        $fileExt = explode(".",$FILEname);
        
        $fileActualExt = strtolower(end($fileExt)); 
        $allow = array("jpg","jpeg","png");

            
            
                if(!$FILEerror == 0){
                    header("Location: ../../adFileManagement.php?error");
                } 
                else if(!in_array($fileActualExt,$allow)){
                    header("Location: ../../adFileManagement.php?error=extensionnotallowed");
                    exit();
                    
                } 
                else {
                    if($FILEsize < 10000000){
                        $fileNewName = "product".$id.".".$fileActualExt;
                        
                        $fileDestination = "produploads/".$fileNewName;
                
                        move_uploaded_file($FILEtmp_name,$fileDestination);
                        
                        $sql = "UPDATE product SET prodImg ='".$fileDestination."' WHERE ProdID = '".$id."' ;";
                        $return = mysqli_query($conn,$sql);
                        
                    }else {
                        header("Location: ../../adFileManagement.php?error=filetoolarge");
                        exit();
                    }

                }
            
        
    }

