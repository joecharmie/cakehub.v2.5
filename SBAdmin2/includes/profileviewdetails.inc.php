<?php 

        require 'dbh.inc.php';

        $upid = $_SESSION['userId'];
        $sql = "SELECT user.* , person.* FROM user JOIN person ON user.userPersonID = person.personID WHERE personID='$upid'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $uname = $row['userName'];
                $fname = $row['personFname'];
                $mname = $row['personMname'];
                $lname = $row['personLname'];
                $email = $row['userEmail'];
                $cnum = $row['userNum'];
                
                if ($row['userRoleID'] == 1){
                    $role = 'Super Admin';
                }
                else if ($row['userRoleID'] == 2){
                    $role = 'Admin';
                }
                else if ($row['userRoleID'] == 3){
                    $role = 'Baker';
                }
                else if ($row['userRoleID'] == 4){
                    $role = 'Seller';
                }
 
                if ($row['userStat'] == 1){
                    $stat = 'Active';
                }
                else if ($row['userStat'] == 2){
                    $stat = 'Inactive';
                }
                else if ($row['userStat'] == 3){
                    $stat = 'Deactivated';
                } 
                else if ($row['userStat'] == 4){
                    $stat = 'Pending';
                }
                else{
                    $stat = "Undefined Status";
                }
                
                $statVal = $row['userStat'];
                $bakeryname = $row['personBakeryName'];
                $gcash = $row['personGcash'];
                $paymaya = $row['personPaymaya'];
                $coins = $row['personCoinsPH'];
            }
        }

        $sql = "SELECT * FROM contact WHERE cxPersonID='$upid'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $location = $row['cxBarangay'].", ".$row['cxCity'];
                $barangay = $row['cxBarangay'];
                $city = $row['cxCity'];
            }
        }



        mysqli_close($conn);

        
//code po for the image upload and display - end
