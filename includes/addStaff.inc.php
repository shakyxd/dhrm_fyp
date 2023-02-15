<?php
session_start();



$staffType = $_POST["staffType"];
$emailStaff = $_POST["emailStaff"];
$phoneNumStaff = $_POST["phoneNumStaff"];
$firstNameStaff = $_POST["firstNameStaff"];
$lastNameStaff = $_POST["lastNameStaff"];
$dateOfBirthStaff = $_POST["dateOfBirthStaff"];
$salary = $_POST["salary"];
$genderStaff = $_POST["genderStaff"];
$deactivated = 0;

$clinicID = $_SESSION["userID"];


$dbname = "fyp";

// Create database connection
$conn = new mysqli('localhost', 'root', '', 'fyp');


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {

    //insert into treatment database

    $stmt = $conn->prepare("INSERT INTO staff(clinicID, staffType, emailStaff, phoneNumStaff, firstNameStaff, lastNameStaff, dateOfBirthStaff, salary, genderStaff, deactivated )
      values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ississsssi", $clinicID, $staffType, $emailStaff, $phoneNumStaff, $firstNameStaff, $lastNameStaff, $dateOfBirthStaff, $salary, $genderStaff, $deactivated);
    $stmt->execute();

  header("location:../addStaff.php");
    
    }

?>
