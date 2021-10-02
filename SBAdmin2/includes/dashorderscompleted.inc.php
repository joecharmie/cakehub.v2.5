<?php 

        require 'dbh.inc.php';
        $userID = $_SESSION['userId'];
        $sql = "SELECT user.* , person.* FROM user JOIN person ON user.userPersonID = person.personID WHERE personID='$userID'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
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
            }
        }

        $isPersonalInfoComplete = 0;

        $sql = "SELECT COUNT(personId) AS completePersonInfo FROM person WHERE personId = '".$userID."' AND personFname != '' AND personLname != ''
        AND personBakeryName != '' AND personGcash != '' AND personPaymaya != '' AND personCoinsPH != '' AND personImg != 'not set'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)){
                $isPersonalInfoComplete = $row['completePersonInfo'];
            }
        }

        $isContactInfoComplete = 0;
        $sql = "SELECT COUNT(cxTempID) AS completeContactInfo FROM contact WHERE cxPersonID = '".$userID."' AND cxName != '' AND cxAddress != '' AND cxBarangay != ''
        AND cxCity != '' AND cxContactNum != ''";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)){
                $isContactInfoComplete = $row['completeContactInfo'];
            }
        }


        $sumStat = 0;
        $sql = "SELECT COUNT(cartStat) AS countStat
        FROM cxcartorder WHERE cartStat != 1 AND cartStat != 6";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $sumStat =+ $row['countStat'];
            }
        }


        $pendingPayment = 0;
        $sql = "SELECT COUNT(cartStat) AS countStat
        FROM cxcartorder
        WHERE cartStat = '2'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $pendingPayment =+ $row['countStat'];
            }
        }
        $completedPayment = intval(($pendingPayment / $sumStat) * 100); 
        
        $pendingCake = 0;
        $sql = "SELECT COUNT(cartStat) AS countStat
        FROM cxcartorder
        WHERE cartStat = '3'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $pendingCake =+ $row['countStat'];
            }
        }
        $completedCake = intval(($pendingCake / $sumStat) * 100); 

        $pendingDelivery = 0;
        $sql = "SELECT COUNT(cartStat) AS countStat
        FROM cxcartorder
        WHERE cartStat = '4'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $pendingDelivery =+ $row['countStat'];
            }
        }
        $completedDelivery = intval(($pendingDelivery / $sumStat) * 100); 
        
        //get monthly sale graph
        $MonthArray = array();
        $sql = "SELECT TRUNCATE(AVG(cartTotalPrice), 2) AS Monthly, MONTH(cartDate) AS MONTH, DATE_FORMAT(cartDate, '%b') AS MONTHNAME FROM cxcartorder WHERE (cartStat = '5') AND YEAR(NOW()) = YEAR(cartDate) GROUP BY MONTH";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $MonthArray['result'][''] = $result -> fetch_all(MYSQLI_ASSOC);            
        }
        else {
            $MonthArray['result'][''] = null;
        }
        //get monthly sale graph
        $AnnualArray = array();
        $sql = "SELECT TRUNCATE(AVG(cartTotalPrice), 2) AS Yearly, YEAR(cartDate) AS YEAR FROM cxcartorder WHERE (cartStat = '5') GROUP BY YEAR";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $AnnualArray['result'][''] = $result -> fetch_all(MYSQLI_ASSOC);            
        }
        else {
            $AnnualArray['result'][''] = null;
        }
        //get average monthly earnings
        $Monthly = 0;
        $MonthCount = 0;
        $sql = "SELECT TRUNCATE(AVG(cartTotalPrice), 2) AS Monthly, MONTH(cartDate) AS MONTH FROM cxcartorder WHERE (cartStat >= '3') AND YEAR(NOW()) = YEAR(cartDate) GROUP BY MONTH";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $Monthly += $row['Monthly'];
                $MonthCount++;
            }
        }
        $MonthlyFinal = $MonthCount === 0 ? 0 : $Monthly / $MonthCount; 


        $UserArray = array();
        $sql = "SELECT COUNT(*) AS NumberOfUser, userRoleID, rl.roleDesc FROM USER AS usr JOIN ROLE rl ON usr.userRoleId = rl.roleID WHERE userRoleID != 6 GROUP BY userRoleID";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $UserArray['result'][''] = $result -> fetch_all(MYSQLI_ASSOC);            
        }
        else {
            $UserArray['result'][''] = null;
        }
        $pendingApproval = 0;
        $sql = "SELECT COUNT(*) AS pendingApproval FROM USER WHERE userStat = 4";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $pendingApproval += $row['pendingApproval'];
            }
        }
        mysqli_close($conn);

//code po for the image upload and display - end
