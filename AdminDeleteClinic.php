<?php
if(isset ($_GET["clinicID"]) ){
    $clinicID = $_GET["clinicID"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "fyp";

    //create connection 
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM clinic WHERE clinicID=$clinicID";
    $connection->query($sql);


}

header("location:AdminAcctClinic.php");
exit;
?>