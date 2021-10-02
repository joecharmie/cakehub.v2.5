<?php
    session_start();
    include './dbh.inc.php';

    
    $role = $_POST['role'];
    if($role == 1){
        $prefix="HM-";
    }
    else if($role == 2){
        $prefix="AD-";
    }
    else if($role == 3){
        $prefix="BK-";
    }
    else if($role == 4){
        $prefix="SL-";
    }
    $UPID = $prefix.date("jms")."-".date("hiy");
    $contactid = date("mjyhis");

    $userName = $_POST['uname'];
    $userStat = 1;
    $userEmail = $_POST['email'];
    $userNum = $_POST['cnum'];
    $cxContactNum = $_POST['cnum'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat']; 
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    $personFname = ucwords(strtolower($_POST['fname']));
    $personMname = ucwords(strtolower($_POST['mname']));
    $personLname = ucwords(strtolower($_POST['lname'])); 
    $personImg = "not set";                             
    $personDate = gmdate("Y-m-j H:i:s", time() + 3600*(8+date("I")));

    if( empty($role) || empty($UPID) || empty($userName) || empty($password) || empty($passwordRepeat) || empty($personFname) || empty($personLname) || empty($userEmail)|| empty($userNum)|| empty($cxContactNum)){
        header("Location: ../../adUserManagement.php?error=signupemptyfields&role=".$role."&uname=".$userName."&fname=".$personFname."&mname=".$personMname."&lname=".$personLname."&email=".$userEmail."&cnum=".$userNum."&cnum=".$cxContactNum);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $userName)) {
        header("Location: ../../adUserManagement.php?error=invaliduid&role=".$role."&fname=".$personFname."&mname=".$personMname."&lname=".$personLname."&email=".$userEmail."&cnum=".$userNum."&cnum=".$cxContactNum);
        exit();
    }

    else if ($password !== $passwordRepeat) {
        header("Location: ../../adUserManagement.php?error=passwordcheck&role=".$role."&uname=".$userName."&fname=".$personFname."&mname=".$personMname."&lname=".$personLname."&email=".$userEmail."&cnum=".$userNum."&cnum=".$cxContactNum);
        exit();
    }

    else {

        $sql = "SELECT userName FROM user WHERE userName = '$userName'";
        if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
                header("Location: ../../adUserManagement.php?error=unametaken&role=".$role."&uname=".$userName."&fname=".$personFname."&mname=".$personMname."&lname=".$personLname."&email=".$userEmail."&cnum=".$userNum);
                exit();
            }
            else{
                //inserting a person and user -start
                $sql = "INSERT INTO person (personID, personFname, personMname, personLname, personImg, personDate) VALUES ('$UPID','$personFname','$personMname','$personLname','$personImg','$personDate')"; 
                mysqli_query($conn, $sql);                                               
    
                $sql = "INSERT INTO user (userID, userName, userRoleID, userStat, userEmail, userNum, userPassword, userPersonID) VALUES ('$UPID','$userName','$role','$userStat','$userEmail','$userNum', '$hashedPwd','$UPID')"; 
                mysqli_query($conn, $sql);

                $sql = "INSERT INTO `contact` (`cxTempID`, `cxName`, `cxAddress`, `cxBarangay`, `cxCity`, `cxContactNum`, `cxPersonID`) VALUES ('$contactid', '', '', '', '', '$userNum', '$UPID');"; 
                mysqli_query($conn, $sql);

                //inserting a person and user contact details-end
    
                // this part here is to upload pic if set - start
                if(isset($_FILES["theFILE"])) {
                    include './userupload.php';
                }      
                // this part here is to upload pic if set - end

                //this part here is added by joe for the activity log from line 88 and every line that follows

               
                DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');        
                $actDesc = "A user named ".$personFname." ".$personLname." was added by ".$_SESSION['userUid']." ".$_SESSION['userId'];
                $actDate = date("Y-m-j H:i:s", time());

                $actUserID = $_SESSION['userId'];
                $actCategoryID = 1;

                $sql = "INSERT INTO `activity` (`actID`, `actDesc`, `actDate`, `actUserID`, `actCategoryID`) VALUES (NULL,'$actDesc','$actDate','$actUserID','$actCategoryID')"; 
                
                $result = mysqli_query($conn, $sql);
                //this part here ends the lines added by joe for the activity log   
    
                header("Location: ../../adUserManagement.php?success=useradded&added=".$personFname." ".$personLname);
                exit();
    
                mysqli_close($conn);
            }
        }
        
    }

?>