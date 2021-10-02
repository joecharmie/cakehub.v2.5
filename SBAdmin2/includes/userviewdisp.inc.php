<?php 

        require 'SBAdmin2/includes/dbh.inc.php';
        
        $id = $_GET['view-submit'];
                
                $sqlImg = "SELECT personImg FROM person WHERE personID = '$id'";
                $resultImg = mysqli_query($conn, $sqlImg);
                while ($rowImg = mysqli_fetch_assoc($resultImg)){
                        if ($rowImg['personImg']=='not set'){     
                            $src = "SBAdmin2/img/undraw_profile.svg";
                            echo "<img class='img-profile rounded-circle w-100 ' src='SBAdmin2/includes/useruploads/defaultprofile.jpg' > ";                           
                        }
                        else{
                                                       
                            echo "<img class='img-profile rounded-circle w-100' src='SBAdmin2/includes/".$rowImg['personImg']."?".mt_rand()."' >";
                            
                        }
                }
        mysqli_close($conn);
            
        
        
//code po for the image upload and display - end
