<?php
session_start();

$treatmentType = $_POST["treatmentType"];
$treatmentName = $_POST["treatmentName"];
$price = $_POST["price"];
$availability = 1;

$clinicID = $_SESSION["userID"];

$dbname = "fyp";

// Create database connection
$conn = new mysqli('localhost', 'root', '', 'fyp');


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {

    //insert into treatment database

    $stmt = $conn->prepare("INSERT INTO treatment(clinicID, treatmentType, treatmentName, price, availability)
      values(?, ?, ?, ?, ?)");
    $stmt->bind_param("isssi", $clinicID, $treatmentType, $treatmentName, $price, $availability);
    $stmt->execute();

  header("location:../addTreatment.php");
    
    }

?>
