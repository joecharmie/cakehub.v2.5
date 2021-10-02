<?php 

        require 'SBAdmin2/includes/dbh.inc.php';

        $loginID = $_SESSION['userId'];
        $sql = "SELECT userPersonID FROM user WHERE userID='$loginID'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $id = $row['userPersonID'];
                
                $sqlImg = "SELECT personImg FROM person WHERE personID = '$id'";
                $resultImg = mysqli_query($conn, $sqlImg);
                while ($rowImg = mysqli_fetch_assoc($resultImg)){
                        if ($rowImg['personImg']=='not set'){     
                            echo "<img class='img-profile rounded-circle' src='SBAdmin2/img/undraw_profile.svg'> ";                           
                        }
                        else{
                            echo "<img class='img-profile rounded-circle' src='SBAdmin2/includes/".$rowImg['personImg']."?".mt_rand()."'>";
                            
                        }
                }
            }
        }
        
//code po for the image upload and display - end
