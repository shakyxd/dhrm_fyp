<?php
if(isset ($_GET["trtmntID"]) ){
    $treatmentID = $_GET["trtmntID"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "fyp";

    //create connection 
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM treatment WHERE treatmentID=$treatmentID";
    $connection->query($sql);


}

header("location:AdminViewTreatment.php");
exit;
?>