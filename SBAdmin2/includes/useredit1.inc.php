<?php
    session_start();
    include './dbh.inc.php';

    $upid = $_POST['edit-submit'];
    $userName = $_POST['uname'];
    $role = $_POST['role'];
    $userStat = $_POST['stat'];
    $userEmail = $_POST['email'];
    $userNum = $_POST['cnum'];
    //$cxContactNum = $_POST['cnum'];


    $personFname = ucwords(strtolower($_POST['fname']));
    $personMname = ucwords(strtolower($_POST['mname']));
    $personLname = ucwords(strtolower($_POST['lname'])); 

    if( empty($role)  || empty($userStat)  ||empty($userName) || empty($personFname) || empty($personLname) || empty($userEmail)|| empty($userNum)){
        header("Location: ../../adUserManagement.php?error=editemptyfields&role=".$role."&stat=".$userRole."&uname=".$userName."&fname=".$personFname."&lname=".$personLname."&email=".$userEmail."&cnum=".$userNum."&cnum=".$cxContactNum);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
        header("Location: ../../adUserManagement.php?error=invaliduid&role=".$role."&fname=".$personFname."&mname=".$personMname."&lname=".$personLname."&email=".$userEmail."&cnum=".$userNum."&cnum=".$cxContactNum);
        exit();
    }

    else {
                //updating a person and user -start
                $sql = "UPDATE person SET personFname = '".$personFname."', personMname = '".$personMname."', personLname = '".$personLname."'  WHERE personID = '".$upid."' ;";
                mysqli_query($conn, $sql);                                               
    
                $sql = "UPDATE user SET userName ='".$userName."', userRoleID ='".$role."' , userStat ='".$userStat."' , userEmail ='".$userEmail."', userNum ='".$userNum."' WHERE userPersonID = '".$upid."' ;"; 
                mysqli_query($conn, $sql);

                 $sql = "UPDATE `contact` SET (`cxTempID`, `cxName`, `cxAddress`, `cxBarangay`, `cxCity`, `cxContactNum`, `cxPersonID`) VALUES ('$contactid', '', '', '', '', '$userNum', '$UPID');"; 
                mysqli_query($conn, $sql);

                //updating a person and user contact details-end

                // this part here is to upload pic if set - start
                if(isset($_FILES["theFILE"])) {
                include './usereditupload.php';
            }      
                // this part here is to upload pic if set - end
            
                //this part here is added by joe for the activity log from line 88 and every line that follows  
            DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');       
            $actDesc = "A user named ".$personFname." ".$personLname." was updated by ".$_SESSION['userUid']." ".$_SESSION['userId'];
            $actDate = date("Y-m-j H:i:s", time());

            $actUserID = $_SESSION['userId'];
            $actCategoryID = 2;

            $sql = "INSERT INTO `activity` (`actID`, `actDesc`, `actDate`, `actUserID`, `actCategoryID`) VALUES (NULL,'$actDesc','$actDate','$actUserID','$actCategoryID')"; 
            
            $result = mysqli_query($conn, $sql);
            //this part here ends the lines added by joe for the activity log   

            header("Location: ../../adUserManagement.php?success=useredited&edited=".$personFname." ".$personLname);
            exit();

            mysqli_close($conn);
        
    
    
}


?>