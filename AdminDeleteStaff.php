<?php
if(isset ($_GET["staffID"]) ){
    $staffID = $_GET["staffID"];

    $servername = "localhost";
    $username = "id20359512_root";
    $password = "!wd!9J>f#!%lO}a$";
    $database = "id20359512_fyp";

    //create connection 
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM staff WHERE staffID=$staffID";
    $connection->query($sql);


}

header("location:AdminAcctStaff.php");
exit;
?>