<?php
if(isset ($_GET["patientID"]) ){
    $patientID = $_GET["patientID"];

    $servername = "localhost";
    $username = "id20359512_root";
    $password = "!wd!9J>f#!%lO}a$";
    $database = "id20359512_fyp";

    //create connection 
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM patient WHERE patientID=$patientID";
    $connection->query($sql);


}

header("location:AdminAcctPatient.php");
exit;
?>