<?php

$staffType = $_POST["staffType"];
$emailStaff = $_POST["emailStaff"];
$phoneNumStaff = $_POST["phoneNumStaff"];
$firstNameStaff = $_POST["firstNameStaff"];
$lastNameStaff = $_POST["lastNameStaff"];
$dateOfBirthStaff = $_POST["dateOfBirthStaff"];
$salary = $_POST["salary"];
$genderStaff = $_POST["genderStaff"];


$dbname = "fyp";

// Create database connection
$conn = new mysqli('localhost', 'root', '', 'fyp');


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {

    //insert into treatment database

    $stmt = $conn->prepare("INSERT INTO staff(staffType, emailStaff, phoneNumStaff, firstNameStaff, lastNameStaff, dateOfBirthStaff, salary, genderStaff  )
      values(?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisssss", $staffType, $emailStaff, $phoneNumStaff, $firstNameStaff, $lastNameStaff, $dateOfBirthStaff, $salary, $genderStaff);
    $stmt->execute();

  header("location:../addStaff.php");
    
    }

?>
