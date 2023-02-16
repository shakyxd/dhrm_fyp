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

    $clinicsql="SELECT rating FROM clinic WHERE clinicID=(SELECT clinicID FROM appointment WHERE appointmentID=$aid)";
    $clinicresult=$data->query($clinicsql);
    while($row=$clinicresult->fetch_assoc()){
        $clinicrating=$row["rating"];
    }

    $ratingsql="SELECT rating FROM appointment WHERE clinicID=(SELECT clinicID FROM appointment WHERE appointmentID=$aid) AND rating IS NOT NULL";
    $result=$data->query($ratingsql);
    $total=(mysqli_num_rows($result))+1;
    while($row=$result->fetch_assoc()){
        $ratingarray[]=$row["rating"];
    }

    array_push($ratingarray,$clinicrating);
    $finalrating=(array_sum($ratingarray)/$total);

    $ratingupdatesql="UPDATE clinic SET rating=$finalrating WHERE clinicID=(SELECT clinicID FROM appointment WHERE appointmentID=$aid)";
    mysqli_query($data,$ratingupdatesql);

    unset($_SESSION["aid"]);
    header("location:PatientVisitationHistory.php");
?>