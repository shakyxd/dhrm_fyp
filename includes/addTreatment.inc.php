<?php

$treatmentType = $_POST["treatmentType"];
$treatmentName = $_POST["treatmentName"];
$price = $_POST["price"];

$dbname = "fyp";

// Create database connection
$conn = new mysqli('localhost', 'root', '', 'fyp');


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {

    //insert into treatment database

    $stmt = $conn->prepare("INSERT INTO treatment(treatmentType, treatmentName, price)
      values(?, ?, ?)");
    $stmt->bind_param("sss", $treatmentType, $treatmentName, $price);
    $stmt->execute();

  header("location:../addTreatment.php");
    
    }

?>
