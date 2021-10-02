<?php
  include './dbh.inc.php';

  $uname = $_GET['uname'];
  $pwd = $_GET['pwd'];
  $pwdrepeat = $_GET['pwd-repeat'];
  $fname = ucwords(strtolower($_GET['fname']));
  $lname = ucwords(strtolower($_GET['lname']));
  $city = $_GET['category'];
  $barangay = $_GET['subcategory'];
  $addr = ucwords(strtolower($_GET['addr']));
  $contactnum = $_GET['contactnum'];
  $email = $_GET['email'];

  // other variables needed to insert to tables
  $cxID ="CX-".date("jms")."-".date("hiy");
  $personImg = "not set";                             
  $personDate = gmdate("Y-m-j H:i:s", time() + 3600*(8+date("I")));
  $userRole = 5;
  $userStat = 1;
  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
  $cxname = $fname." ".$lname;

  if( empty($uname) || empty($pwd) || empty($pwdrepeat) || empty($fname) || empty($lname) || empty($city) || empty($barangay) || empty($addr) || empty($contactnum) || empty($email) ){
    header("Location: ../cxregister.php?error=signupemptyfields&uname=".$uname."&fname=".$fname."&lname=".$lname."&category=".$city."&subcategory=".$barangay."&addr=".$addr."&contactnum=".$contactnum."&email=".$email);
    exit();
  }

  else if (!preg_match("/^[a-zA-Z0-9]*$/", $uname)) {
    header("Location: ../cxregister.php?error=invaliduid&fname=".$fname."&lname=".$lname."&category=".$city."&subcategory=".$barangay."&addr=".$addr."&contactnum=".$contactnum."&email=".$email);
    exit();
  }

  else if (!preg_match("/^[0-9]*$/", $contactnum)) {
    header("Location: ../cxregister.php?error=invalidcontact&uname=".$uname."&fname=".$fname."&lname=".$lname."&category=".$city."&subcategory=".$barangay."&addr=".$addr."&email=".$email);
    exit();
  }

  else if ($pwd !== $pwdrepeat) {
    header("Location: ../cxregister.php?error=passwordcheck&uname=".$uname."&fname=".$fname."&lname=".$lname."&category=".$city."&subcategory=".$barangay."&addr=".$addr."&contactnum=".$contactnum."&email=".$email);
    exit();
  }
  else{
    $sql = "SELECT userName FROM user WHERE userName = '$uname'";
    if($result = mysqli_query($conn, $sql)){
      if(mysqli_num_rows($result) > 0){
        header("Location: ../cxregister.php?error=unametaken&fname=".$fname."&lname=".$lname."&category=".$city."&subcategory=".$barangay."&addr=".$addr."&contactnum=".$contactnum."&email=".$email);
        exit();
      }
      else{
        $sql = "INSERT INTO person (personID, personFname, personMname, personLname, personImg, personDate) VALUES ('$cxID','$fname','','$lname','$personImg','$personDate')"; 
        mysqli_query($conn, $sql);                                               

        $sql = "INSERT INTO user (userID, userName, userRoleID, userStat, userEmail, userNum, userPassword, userPersonID) VALUES ('$cxID','$uname','$userRole','$userStat','$email','$contactnum','$hashedPwd','$cxID')"; 
        mysqli_query($conn, $sql);

        $sql = "INSERT INTO `contact` (`cxTempID`, `cxName`, `cxAddress`, `cxBarangay`, `cxCity`, `cxContactNum`, `cxPersonID`) VALUES ('$cxID', '$cxname', '$addr', '$barangay', '$city', '$contactnum', '$cxID')";
        mysqli_query($conn, $sql);

        header("Location: ../cxlogin.php?success=cxregistered&cxname=".$cxname);
        exit();
      }
    }
  }



?>