<?php





if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once 'includes/dbHandler.inc.php';
    require_once 'includes/functions.inc.php';

    if(emptyInputLogin($email, $password) !== false) {
        header("location: loginPatient.html?error=emptyinput");
        exit();
      }

    loginPatient($conn, $email, $password);
}
    else {


        header("location: loginPatient.html");
        exit();
      
      }

?>