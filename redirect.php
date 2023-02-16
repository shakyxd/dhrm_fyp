<?php
session_start();
if(isset ($_GET["tID"]) ){
    $_SESSION["treatmentID"]=$_GET["tID"];
    $_SESSION["treatmentName"]=$_GET["tName"];
    $_SESSION["clinicID"]=$_GET["cID"];
    $_SESSION["price"]=$_GET["price"];
}
header("location:loginPatient.html");
exit;
?>