<?php
    if(isset($_GET["trtmntID"])){
        $tID=$_GET["trtmntID"];
        $host="localhost";
        $user="id20359512_root";
        $password="!wd!9J>f#!%lO}a$";
        $db="id20359512_fyp";
        
        $data=mysqli_connect($host,$user,$password,$db);
        if($data===false){
            die("connection error");
        }
        $sql="UPDATE treatment SET `availability` = CASE 
            WHEN `availability` = 1 THEN 0
            WHEN `availability` = 0 THEN 1
            END
            WHERE treatmentID=$tID";
        $data->query($sql);
    }
    header("location:AdminViewTreatment.php");
    exit;
?>