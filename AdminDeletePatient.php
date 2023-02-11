<?php
if(isset ($_GET["patientID"]) ){
    $patientID = $_GET["patientID"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "fyp";

    //create connection 
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM patient WHERE patientID=$patientID";
    $connection->query($sql);


}

header("location:AdminAcctPatient.php");
exit;
?>