<?php

$treatmentType = $_POST["treatmentType"];
$treatmentName = $_POST["treatmentName"];
$price = $_POST["price"];
$availability = 1;

$dbname = "fyp";

// Create database connection
$conn = new mysqli('localhost', 'root', '', 'fyp');


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {

    //insert into treatment database

    $stmt = $conn->prepare("INSERT INTO treatment(treatmentType, treatmentName, price, availability)
      values(?, ?, ?, ?)");
    $stmt->bind_param("sssi", $treatmentType, $treatmentName, $price, $availability);
    $stmt->execute();

  header("location:../addTreatment.php");
    
    }

?>
