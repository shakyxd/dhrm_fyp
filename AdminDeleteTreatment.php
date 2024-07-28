<?php
if(isset ($_GET["trtmntID"]) ){
    $treatmentID = $_GET["trtmntID"];

    $servername = "localhost";
    $username = "id20359512_root";
    $password = "!wd!9J>f#!%lO}a$";
    $database = "id20359512_fyp";

    //create connection 
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM treatment WHERE treatmentID=$treatmentID";
    $connection->query($sql);


}

header("location:AdminViewTreatment.php");
exit;
?>