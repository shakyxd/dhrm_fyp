<?php

$email = $_POST["email"];
$password = $_POST["password"];
$password2 = $_POST["password2"];
$mobileNum = $_POST["mobileNum"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$gender = $_POST["gender"];
$dateOfBirth = $_POST["dateOfBirth"];
$nationality = $_POST["nationality"];
$allergies = $_POST["allergies"];




$dbname = "fyp";

// Create database connection
$conn = new mysqli('localhost', 'root', '', 'fyp');


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else{

    //insert into account

    if ($password == $password2) {

      $stmt = $conn->prepare("INSERT INTO patient(emailPatient, passwordPatient, mobileNum, 
      firstName, lastName, gender, dateOfBirth, nationality, allergiesList)
      values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssissssss", $email, $password, $mobileNum, $fname, $fname, $gender, $dateOfBirth, $nationality, $allergies);
      $stmt->execute();


    }else {
      echo "Passwords do not match";
    }


//     // getting accountID
    
//     $stmt = $conn->prepare("SELECT * FROM accounts where (username = ? && password = ?)");
//     $stmt->bind_param("ss", $username, $password);
//     $stmt->execute();
//     $stmt_result = $stmt->get_result();

//   if ($stmt_result->num_rows > 0) {
//     $data = $stmt_result->fetch_assoc();
//     if ($data['password'] === $password) {
//       $accountID = $data["accountID"];
//     } else {
//       echo "<h2> Failure to get accountID </h2>";
//     }
//   }


//         //staff
//         if ($profileID == 2) {

//           $retired = 0;

//           $stmt =  $conn->prepare("INSERT INTO staffs(firstName, lastName, retired, accountID)
//           values(?, ?, ?, ?)");

//           $stmt->bind_param("ssii", $fname, $lname, $retired, $accountID);
//           $stmt->execute();
    
//         }

//         //patient
//         else if ($profileID == 3) {

//           $planID = 0;
//           $treatmentID = 0;

//           $stmt =  $conn->prepare("INSERT INTO patients(firstName, lastName, accountID, planID, treatmentID)
//           values(?, ?, ?, ?, ?)");

//           $stmt->bind_param("ssiii", $fname, $lname, $accountID, $planID, $treatmentID);
//           $stmt->execute();


//         }

        

//     header("location:viewAccount.php");

   
   
    $stmt->close();
    $conn->close();
}

?>