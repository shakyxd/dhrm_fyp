<?php


$email = $_POST["email"];
$password = $_POST["password"];


// Create database connection


$conn = new mysqli('localhost', 'root', '', 'fyp');
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}else{
    $stmt = $conn->prepare("SELECT * FROM Patients where email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password) {
            echo "<h2> Login Successfully </h2>";
        }else {
            echo "<h2> Invalid email or password </h2>";
        }

    }else{
        echo "<h2> Invalid email or password </h2>";
    }
    $stmt->close();
    $conn->close();

}

?>