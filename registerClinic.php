<?php

$email = $_POST["email"];
$password = $_POST["password"];
$password2 = $_POST["password2"];
$nameClinic = $_POST["nameClinic"];
$phoneNum = $_POST["phoneNum"];
$address = $_POST["address"];
$area = $_POST["area"];
$specialisation = $_POST["specialisation"];


$dbname = "fyp";

// Create database connection
$conn = new mysqli('localhost', 'root', '', 'fyp');


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else{

    //insert into account

    if ($password == $password2) {

      $stmt = $conn->prepare("INSERT INTO clinic(emailClinic, passwordClinic, nameClinic, 
      phoneNum, address, area, specialisation)
      values(?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("sssisss", $email, $password, $nameClinic, $phoneNum, $address, $area, $specialisation);
      $stmt->execute();


    }else {
      echo "Passwords do not match";
    }


   
   
    $stmt->close();
    $conn->close();
}

?>
