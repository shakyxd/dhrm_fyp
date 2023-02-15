<?php

if(isset($_GET["timeSlotID"])){
    $timeSlot = $_GET["timeSlotID"];
    $dentistName = $_GET["dentistName"];

    echo $timeSlot;
    echo $dentistName;

    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $database = "fyp";

    // //create connection 
    // $connection = new mysqli($servername, $username, $password, $database);

    // $sql = "DELETE FROM staff WHERE staffID=$staffID";
    // $connection->query($sql);


} else {

    header("location:../generateTimeSlot.php?error=somethingwentwrong");
    exit();

}


?>