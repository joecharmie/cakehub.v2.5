<?php

  $upid = $_SESSION['userId'];

  $sql = "SELECT user.* , person.*, contact.* 
  FROM user JOIN person 
  ON user.userPersonID = person.personID 
  JOIN contact
  ON person.personID = contact.cxPersonID
  WHERE contact.cxPersonID='$upid'";
  if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
      while ($row = mysqli_fetch_assoc($result)){
        $fname = $row['personFname'];
        $lname = $row['personLname'];
        $uname = $row['userName'];
        $city = $row['cxCity'];
        $brgy = $row['cxBarangay'];
        $addr = $row['cxAddress'];
        $cnum = $row['cxContactNum'];
        $email = $row['userEmail'];
      }
    }
  }
    