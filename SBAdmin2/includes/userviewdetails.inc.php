<?php 

        require 'dbh.inc.php';

        $upid = $_GET['view-submit'];
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
                $rolevalue = $row['userRoleID'];
                $statvalue = $row['userStat'];

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
                else if ($row['userRoleID'] == 5){
                    $role = 'Customer';
                }
 
                if ($row['userStat'] == 1){
                    $stat = 'Active';
                }
                else if ($row['userStat'] == 2){
                    $stat = 'Inactive';
                }
                else if ($row['userStat'] == 4){
                    $stat = 'Pending';
                }
            }
        }

      

        
//code po for the image upload and display - end
