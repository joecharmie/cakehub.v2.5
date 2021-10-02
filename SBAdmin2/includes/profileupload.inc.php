<?php
    
    
        $file = $_FILES["theFILE"];        
  
        //separate the data from the array into separate variables
        $FILEname = $_FILES["theFILE"]["name"];
        $FILEtype = $_FILES["theFILE"]["type"];
        $FILEtmp_name = $_FILES["theFILE"]["tmp_name"];
        $FILEerror = $_FILES["theFILE"]["error"];
        $FILEsize = $_FILES["theFILE"]["size"];
        
        $id = $upid;

        $fileExt = explode(".",$FILEname);
        
        $fileActualExt = strtolower(end($fileExt)); 
        $allow = array("jpg","jpeg","png");

        
            if(!$FILEerror == 0){
                header("Location: ../../adMyProfile.php?error=erroruploadingpic");
            }
            else if(!in_array($fileActualExt,$allow)){
                header("Location: ../../adMyProfile.php?error=extensionnotallowed");
                exit();
            } 
            else {
                if($FILEsize < 1000000){
                    $fileNewName = "profile".$UPID.".".$fileActualExt;
                    
                    $fileDestination = "useruploads/".$fileNewName;
            
                    move_uploaded_file($FILEtmp_name,$fileDestination);
                    
                    $sql = "UPDATE `person` SET `personImg` = '$fileDestination' WHERE `person`.`personID` = '$upid'";

                    $return = mysqli_query($conn,$sql);
                    
                    header("Location: ../../adMyProfile.php?error=".$UPID);

                }else {
                    header("Location: ../../adMyProfile.php?error=filetoolarge");
                    exit();
                }

            }
        
        
    
?>