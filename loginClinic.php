<?php





if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once 'includes/dbHandler.inc.php';
    require_once 'includes/functions.inc.php';

    if(emptyInputLogin($email, $password) !== false) {
        header("location: loginClinic.html?error=emptyinput");
        exit();
      }

    loginClinic($conn, $email, $password);
}
    else {


        header("location: loginClinic.html");
        exit();
      
      }


?>