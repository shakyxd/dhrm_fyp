<?php
session_start();

$treatmentType = $_POST["treatmentType"];
$treatmentName = $_POST["treatmentName"];
$price = $_POST["price"];

$clinicID = $_SESSION["userID"];


$dbname = "fyp";

// Create database connection
$conn = new mysqli('localhost', 'root', '', 'fyp');


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    $stmt = $conn->prepare("INSERT INTO treatment (clinicID, treatmentType, treatmentName, price)
      values(?, ?, ?, ?)");
    $stmt->bind_param("issi", $clinicID, $treatmentType, $treatmentName, $price);
    $stmt->execute();

    header("location: ClinicAddTreatment.php");

}

?>



