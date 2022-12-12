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
        $sql="DELETE FROM material WHERE itemID=$id";
        $data->query($sql);
    }
    header("location:AdminViewItem.php");
    exit;
?>