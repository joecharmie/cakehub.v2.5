<?php 

        require 'dbh.inc.php';

        $id = $_GET['view-submit'];
                
                $sqlImg = "SELECT prodImg FROM product WHERE prodID = '$id'";
                $resultImg = mysqli_query($conn, $sqlImg);
                while ($rowImg = mysqli_fetch_assoc($resultImg)){
                        if ($rowImg['prodImg']=='not set'){     
                            $src = "SBAdmin2/img/undraw_profile.svg";
                            echo "<img class='img-profile w-100' src='SBAdmin2/includes/produploads/defaultcake.jpg' > ";                           
                        }
                        else{
                                                       
                            echo "<img class='img-profile w-100' src='SBAdmin2/includes/".$rowImg['prodImg']."?".mt_rand()."' style='max-height:400px;' >";
                            
                        }
                }
        mysqli_close($conn);
            
        
        
//code po for the image upload and display - end
