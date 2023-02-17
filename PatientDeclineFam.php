<?php
    if(isset ($_GET["friendID"]) ){
        $friendID = $_GET["friendID"];
    
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "fyp";
    
        //create connection 
        $connection = new mysqli($servername, $username, $password, $database);
        $sql = "DELETE FROM friend WHERE friendID=$friendID";
        $connection->query($sql);
    
    
    }
    
    header("location:PatientAddFam.php");
    exit;
?>