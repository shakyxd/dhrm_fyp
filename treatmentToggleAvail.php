<?php
if(isset($_GET["id"])){
    $id=$_GET["id"];
    $host="localhost";
    $user="id20359512_root";
    $password="!wd!9J>f#!%lO}a$";
    $db="id20359512_fyp";

    $data=mysqli_connect($host,$user,$password,$db);
    if($data===false){
        die("connection error");
    }
    $sql="UPDATE treatment SET availability = (CASE availability WHEN 1 THEN 0 ELSE 1 END) WHERE treatmentID = $id";
    $data->query($sql);
}
header("location:ClinicAddTreatment.php");
exit;
?>