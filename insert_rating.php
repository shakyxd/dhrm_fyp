<?php
    session_start();
    $host="localhost";
    $user="root";
    $password="";
    $db="fyp";
    $aid=$_SESSION["aid"];

    $data=mysqli_connect($host,$user,$password,$db);
    if($data===false){
        die("connection error");
    }
    if (isset($_POST['submit_rating'])){
        $rating=$_POST['rating'];
        $insert=mysqli_query($data,"UPDATE appointment SET rating=$rating WHERE appointmentID=$aid");
    }
    echo "$rating";
    unset($_SESSION["aid"]);
    // header("location:PatientVisitationHistory.php");
?>