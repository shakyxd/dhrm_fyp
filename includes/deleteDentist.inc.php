<?php

if(isset($_GET["timeSlotID"])){
    $timeSlot = $_GET["timeSlotID"];
    $dentistName = $_GET["dentistName"];

    echo $timeSlot;
    echo $dentistName;

} else {

    header("location:../generateTimeSlot.php?error=somethingwentwrong");
    exit();

}


?>