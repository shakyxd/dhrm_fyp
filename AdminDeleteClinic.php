<?php
if(isset ($_GET["clinicID"]) ){
    $clinicID = $_GET["clinicID"];

    $servername = "localhost";
    $username = "id20359512_root";
    $password = "!wd!9J>f#!%lO}a$";
    $database = "id20359512_fyp";

    //create connection 
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM clinic WHERE clinicID=$clinicID";
    $connection->query($sql);


}

header("location:AdminAcctClinic.php");
exit;
?>