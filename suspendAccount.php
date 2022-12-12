<?php
    if(isset($_GET["aid"])){
        $aid=$_GET["aid"];
        $host="localhost";
        $user="root";
        $password="";
        $db="fyp";

        $data=mysqli_connect($host,$user,$password,$db);
        if($data===false){
            die("connection error");
        }
        $sql="UPDATE accounts SET deactivated = CASE 
            WHEN deactivated = 1 THEN 0
            WHEN deactivated = 0 THEN 1
            END
            WHERE accountID=$aid";
        $data->query($sql);
    }
    header("location:viewAccount.php");
    exit;
?>