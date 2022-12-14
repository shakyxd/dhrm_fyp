<?php

$username = $_POST["username"];
$password = $_POST["password"];
$profileID = $_POST["profileID"];
$dbname = "fyp";

// Create database connection
$conn = new mysqli('localhost', 'root', '', 'fyp');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else{
    $stmt = $conn->prepare("INSERT INTO accounts(username, password, profileID)
        values(?, ?, ?)");
    $stmt->bind_param("ssi", $username, $password, $profileID);
    $stmt->execute();

    echo "Account created successfully! Congrats!";

    $stmt->close();
    $conn->close();

}

?>