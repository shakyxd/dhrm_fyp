<?php

if (isset($_POST["submit"])) {



  $email = $_POST["email"];
  $password = $_POST["password"];
  $password2 = $_POST["password2"];
  $nameClinic = $_POST["nameClinic"];
  $phoneNum = $_POST["phoneNum"];
  $address = $_POST["address"];
  $area = $_POST["area"];
  $specialisation = $_POST["specialisation"];


  require_once 'includes/dbHandler.inc.php';
  require_once 'includes/functions.inc.php';

  if(emptyInputSignUpClinic($email, $password, $password2, $nameClinic, $phoneNum, $address, $area, $specialisation)  !== false) {
    echo '<script type="text/javascript">alert("Please fill in all fields!");window.location.href="registerClinic.html?error=emptyinput"
    </script>';
    // header("location: registerClinic.html?error=emptyinput");
    exit();
  }

  if(invalidEmail($email) !== false) {
    echo '<script type="text/javascript">alert("Email is invalid!");window.location.href="registerClinic.html?error=invalidemail"
    </script>';
    // header("location: registerClinic.html?error=invalidemail");
    exit();
  }

  if(passwordMatch($password, $password2) !== false) {
    echo '<script type="text/javascript">alert("Passwords do not match!");window.location.href="registerClinic.html?error=passwordsdontmatch"
    </script>';
    // header("location: registerClinic.html?error=passwordsdontmatch");
    exit();
  }

  if(emailExistsClinic($conn, $email) !== false) {
    echo '<script type="text/javascript">alert("Email already exists, please use another!");window.location.href="registerClinic.html?error=emailtaken"
    </script>';
    // header("location:registerClinic.html?error=emailtaken");
    exit();
  }

  registerClinic($conn, $email, $password, $nameClinic, $phoneNum,
  $address, $area, $specialisation);


}

else {



header("location: registerPatient.html");
exit();

}




















// // Create database connection
// $conn = new mysqli('localhost', 'root', '', 'fyp');


// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }else{

//     //insert into account

//     if ($password == $password2) {

//       $stmt = $conn->prepare("INSERT INTO clinic(emailClinic, passwordClinic, nameClinic, 
//       phoneNum, address, area, specialisation)
//       values(?, ?, ?, ?, ?, ?, ?)");
//       $stmt->bind_param("sssisss", $email, $password, $nameClinic, $phoneNum, $address, $area, $specialisation);
//       $stmt->execute();


//     }else {
//       echo "Passwords do not match";
//     }


   
   
//     $stmt->close();
//     $conn->close();
// }

?>
