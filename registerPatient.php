<?php

if (isset($_POST["submit"])) {

  $email = $_POST["email"];
  $password = $_POST["password"];
  $password2 = $_POST["password2"];
  $mobileNum = $_POST["mobileNum"];
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $addressPatient = $_POST["addressPatient"];
  $gender = $_POST["gender"];
  $dateOfBirth = $_POST["dateOfBirth"];
  $nationality = $_POST["nationality"];
  $allergies = $_POST["allergies"];
  $deactivated = 0;

  require_once 'includes/dbHandler.inc.php';
  require_once 'includes/functions.inc.php';

  if(emptyInputSignUpPatient($email, $password, $password2, $mobileNum, $fname, $lname, $addressPatient, $gender,  $dateOfBirth, $nationality) !== false) {
    echo '<script type="text/javascript">alert("Please fill in all fields!");window.location.href="registerPatient.html?error=emptyinput"
    </script>';
    // header("location: registerPatient.html?error=emptyinput");
    exit();
  }

  if(invalidEmail($email) !== false) {
    echo '<script type="text/javascript">alert("Email is invalid!");window.location.href="registerPatient.html?error=invalidemail"
    </script>';
    // header("location: registerPatient.html?error=invalidemail");
    exit();
  }

  if(passwordMatch($password, $password2) !== false) {
    echo '<script type="text/javascript">alert("Passwords do not match!");window.location.href="registerPatient.html?error=passwordsdontmatch"
    </script>';
    // header("location: registerPatient.html?error=passwordsdontmatch");
    exit();
  }

  if(emailExistsPatient($conn, $email) !== false) {
    echo '<script type="text/javascript">alert("Email already exists, please use another!");window.location.href="registerPatient.html?error=emailtaken"
    </script>';
    // header("location:registerPatient.html?error=emailtaken");
    exit();
  }

  registerPatient(
    $conn,
    $email,
    $password,
    $mobileNum,
    $fname,
    $lname,
    $addressPatient,
    $gender,
    $dateOfBirth,
    $nationality,
    $allergies,
    $deactivated
  );


}

else {



  header("location: registerPatient.html");
  exit();

}

?>

