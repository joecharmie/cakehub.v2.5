<?php 

        

        $id = $row['userPersonID'];
                
                $sqlImg = "SELECT personImg FROM person WHERE personID = '$id'";
                $resultImg = mysqli_query($conn, $sqlImg);
                while ($rowImg = mysqli_fetch_assoc($resultImg)){
                        if ($rowImg['personImg']=='not set'){     
                            echo "<img class='img-profile rounded-circle' src='SBAdmin2/img/undraw_profile.svg' height='50px' style='margin-right: 15px; margin-left: 100px;'> "; 
                                                     
                        }
                        else{
                            echo "<img class='img-profile rounded-circle' src='SBAdmin2/includes/".$rowImg['personImg']."?".mt_rand()."' height='50px' style='margin-right: 15px; margin-left: 100px;'>";
                            
                        }
                }
