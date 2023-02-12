<?php
    if(isset($_GET["id"])){
        $id=$_GET["id"];
        $host="localhost";
        $user="root";
        $password="";
        $db="fyp";

        $data=mysqli_connect($host,$user,$password,$db);
        if($data===false){
            die("connection error");
        }
        $sql="UPDATE appointment SET paid = 1 WHERE appointmentID = $id";
        $data->query($sql);
    }
    header("location:PatientBills.php");
    exit;
?>