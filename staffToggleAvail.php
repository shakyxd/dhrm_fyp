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
    $sql="UPDATE staff SET deactivated = (CASE deactivated WHEN 1 THEN 0 ELSE 1 END) WHERE staffID = $id";
    $data->query($sql);
}
header("location:addStaff.php");
exit;
?>