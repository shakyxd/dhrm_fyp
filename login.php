<?php





if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once 'includes/dbHandler.inc.php';
    require_once 'includes/functions.inc.php';

    if(emptyInputLogin($email, $password) !== false) {
        header("location: login.html?error=emptyinput");
        exit();
      }

    loginUser($conn, $email, $password);
}
    else {


        header("location: login.html");
        exit();
      
      }



// Create database connection


// $conn = new mysqli('localhost', 'root', '', 'fyp');
// // Check connection
// if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
// }else{
//     $stmt = $conn->prepare("SELECT * FROM patient where emailPatient = ?");
//     $stmt->bind_param("s", $email);
//     $stmt->execute();
//     $stmt_result = $stmt->get_result();

//     if($stmt_result->num_rows > 0) {
//         $data = $stmt_result->fetch_assoc();
//         if($data['passwordPatient'] === $password) {
//             echo "<h2> Login Successfully </h2>";
//         }else {
//             echo "<h2> Invalid email or password </h2>";
//         }

//     }else{
//         echo "<h2> Invalid email or password </h2>";
//     }
//     $stmt->close();
//     $conn->close();

// }

?>