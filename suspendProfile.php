<?php
    if(isset($_GET["pid"])){
        $pid=$_GET["pid"];
        $host="localhost";
        $user="root";
        $password="";
        $db="fyp";

        $data=mysqli_connect($host,$user,$password,$db);
        if($data===false){
            die("connection error");
        }
        $sql="UPDATE profiles SET deactivated = CASE 
            WHEN deactivated = 1 THEN 0
            WHEN deactivated = 0 THEN 1
            END
            WHERE profileID=$pid";
        $data->query($sql);
    }
    header("location:ViewProfile.php");
    exit;
?>