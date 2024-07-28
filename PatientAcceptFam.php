<?php
    if(isset ($_GET["friendID"]) ){
        $friendID = $_GET["friendID"];
    
        $servername = "localhost";
        $username = "id20359512_root";
        $password = "!wd!9J>f#!%lO}a$";
        $database = "id20359512_fyp";
    
        //create connection 
        $connection = new mysqli($servername, $username, $password, $database);
    
        $sql = "UPDATE friend SET status='Friend' WHERE friendID=$friendID";
        $connection->query($sql);
    
    
    }
    
    header("location:PatientAddFam.php");
    exit;
?>