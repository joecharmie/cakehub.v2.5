<?php
  include './dbh.inc.php';

  $uname = $_GET['uname'];
  $pwd = $_GET['pwd'];
  $pwdrepeat = $_GET['pwd-repeat'];
  $fname = ucwords(strtolower($_GET['fname']));
  $lname = ucwords(strtolower($_GET['lname']));
  $bname = ucwords(strtolower($_GET['bname']));
  $city = $_GET['category'];
  $barangay = $_GET['subcategory'];
  $addr = ucwords(strtolower($_GET['addr']));
  $contactnum = $_GET['contactnum'];
  $gcash = $_GET['gcash'];
  $paymaya = $_GET['paymaya'];
  $coins = $_GET['coins'];
  $email = $_GET['email'];

  // other variables needed to insert to tables
  $cxID ="SL-".date("jms")."-".date("hiy");
  $personImg = "not set";                
  DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');  
  $personDate = date("Y-m-j H:i:s", time());
  $userRole = 4;
  $userStat = 4;
  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
  $cxname = $fname." ".$lname;
  

  if( empty($uname) || empty($pwd) || empty($pwdrepeat) || empty($fname) || empty($lname) || empty($city) || empty($barangay) || empty($addr) || empty($email) || empty($contactnum) || empty($bname) ){
    header("Location: ../cxseller.php?error=signupemptyfields&uname=".$uname."&fname=".$fname."&lname=".$lname."&bname=".$bname."&category=".$city."&subcategory=".$barangay."&addr=".$addr."&contactnum=".$contactnum."&gcash=".$gcash."&paymaya=".$paymaya."&coins=".$coins."&email=".$email);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $uname)) {
    header("Location: ../cxseller.php?error=invaliduid&fname=".$fname."&lname=".$lname."&category=".$city."&subcategory=".$barangay."&addr=".$addr."&contactnum=".$contactnum."&gcash=".$gcash."&paymaya=".$paymaya."&coins=".$coins."&bname="."&email=".$email);
    exit();
  }
  
 
  else if (!preg_match("/^[0-9]*$/", $contactnum)) {
    header("Location: ../cxseller.php?error=invalidcontact&uname=".$uname."&fname=".$fname."&lname=".$lname."&category=".$city."&subcategory=".$barangay."&addr=".$addr."&contactnum=".$contactnum."&gcash=".$gcash."&paymaya=".$paymaya."&coins=".$coins."&bname=".$bname."&email=".$email);
    exit();
  }
  else if (!preg_match("/^[0-9]*$/",  $gcash)) {
    header("Location: ../cxseller.php?error=invalidcontact&uname=".$uname."&fname=".$fname."&lname=".$lname."&category=".$city."&subcategory=".$barangay."&addr=".$addr."&contactnum=".$contactnum."&gcash=".$gcash."&paymaya=".$paymaya."&coins=".$coins."&bname=".$bname."&email=".$email);
    exit();
  }
  else if (!preg_match("/^[0-9]*$/", $paymaya)) {
    header("Location: ../cxseller.php?error=invalidcontact&uname=".$uname."&fname=".$fname."&lname=".$lname."&category=".$city."&subcategory=".$barangay."&addr=".$addr."&contactnum=".$contactnum."&gcash=".$gcash."&paymaya=".$paymaya."&coins=".$coins."&bname=".$bname."&email=".$email);
    exit();
  }
  else if (!preg_match("/^[0-9]*$/", $coins)) {
    header("Location: ../cxseller.php?error=invalidcontact&uname=".$uname."&fname=".$fname."&lname=".$lname."&category=".$city."&subcategory=".$barangay."&addr=".$addr."&contactnum=".$contactnum."&gcash=".$gcash."&paymaya=".$paymaya."&coins=".$coins."&bname=".$bname."&email=".$email);
    exit();
  }


  else if ($pwd !== $pwdrepeat) {
    header("Location: ../cxseller.php?error=passwordcheck&uname=".$uname."&fname=".$fname."&lname=".$lname."&category=".$city."&subcategory=".$barangay."&addr=".$addr."&contactnum=".$contactnum."&gcash=".$gcash."&paymaya=".$paymaya."&coins=".$coins."&bname=".$bname."&email=".$email);
    exit();
  }
  else{
    $sql = "SELECT userName FROM user WHERE userName = '$uname'";
    if($result = mysqli_query($conn, $sql)){
      if(mysqli_num_rows($result) > 0){
        header("Location: ../cxseller.php?error=unametaken&fname=".$fname."&lname=".$lname."&category=".$city."&subcategory=".$barangay."&addr=".$addr."&contactnum=".$contactnum."&gcash=".$gcash."&paymaya=".$paymaya."&coins=".$coins."&bname=".$bname);
        exit();
      }
      else{
        $sql = "INSERT INTO person (personID, personFname, personMname, personLname, personBakeryName, personGcash , personPaymaya , personCoinsPH, personImg, personDate) VALUES ('$cxID','$fname','','$lname','$bname', '$gcash', '$paymaya', '$coins','$personImg','$personDate')"; 
        mysqli_query($conn, $sql);                                               


        $sql = "INSERT INTO user (userID, userName, userRoleID, userStat, userEmail, userPassword, userPersonID) VALUES ('$cxID','$uname','$userRole','$userStat','$email','$hashedPwd','$cxID')"; 
        mysqli_query($conn, $sql);

        $sql = "INSERT INTO `contact` (`cxTempID`, `cxName`, `cxAddress`, `cxBarangay`, `cxCity`, `cxContactNum`, `cxPersonID`) VALUES ('$cxID', '$cxname', '$addr', '$barangay', '$city', '$contactnum', '$cxID')";
        mysqli_query($conn, $sql);

        header("Location: ../adlogin.php?success=cxregistered&cxname=".$cxname);
        exit();
      }
    }
  }



?>