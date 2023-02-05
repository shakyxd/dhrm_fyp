<?php

$email = $_POST["email"];
$password = $_POST["password"];
$password2 = $_POST["password2"];
$nameClinic = $_POST["nameClinic"];
$phoneNum = $_POST["phoneNum"];
$blockNum = $_POST["blockNum"];
$streetName = $_POST["streetName"];
$unitNum = $_POST["unitNum"];
$postalCode = $_POST["postalCode"];
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
      phoneNum, blockNum, streetName, unitNum, postalCode, specialisation)
      values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("sssiissis", $email, $password, $nameClinic, $phoneNum, $blockNum, $streetName, $unitNum, $postalCode, $specialisation);
      $stmt->execute();


    }else {
      echo "Passwords do not match";
    }


   
   
    $stmt->close();
    $conn->close();
}

?>
