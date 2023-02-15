<?php

if (isset($_POST["generate"])) {


    $clinicID = 2;
    // $_SESSION("userID");
    $date = $_POST["date"];
    $staffType = "Dentist";

    
    $time = array(
        "09:00", 
        "09:30", 
        "10:00", 
        "10:30", 
        "11:00",
        "11:30",  
        "12:00", 
        "12:30", 
        "13:00", 
        "13:30", 
        "14:00", 
        "14:30", 
        "15:00",
        "15:30", 
        "16:00", 
        "16:30", 
        "17:00", 
        "17:30", 
        "18:00",
    );

    require_once 'functions.inc.php';

    if(emptyInputGenerateTimeSlot($date) !== false) {
        header("location:../generateTimeSlot.php?error=emptyinput");
        exit();
      }

    // Create database connection
    $conn = new mysqli('localhost', 'root', '', 'fyp');


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {

        $stmt = $conn->prepare("SELECT * FROM staff WHERE clinicID = ? AND staffType = ?");
        $stmt->bind_param("ss", $clinicID, $staffType);
        $stmt->execute();

        $stmt_result = $stmt->get_result();
        
        if ($stmt_result->num_rows > 0) {
          while($row = $stmt_result->fetch_assoc()) {
            $dentistList[] = $row["firstNameStaff"]. " " .$row["lastNameStaff"];
            $dentistJSON = json_encode($dentistList);
         } 
         echo $date;
         echo $dentistJSON;
        
        } else {
          echo "Error Retrieving Data";
        }
        
        $stmt1 = $conn->prepare("DELETE FROM timeslot WHERE clinicID = ? AND date = ?");
        $stmt1->bind_param("is", $clinicID, $date);
        $stmt1->execute();  

        //insert into treatment database

        foreach ($time as $value) {

            $stmt = $conn->prepare("INSERT INTO timeslot(clinicID, date, time, dentistList)
            values(?, ?, ?, ?)");
            $stmt->bind_param("isss", $clinicID, $date, $value, $dentistJSON);
            $stmt->execute();    

        }
       
        header("location:../generateTimeSlot.php?error=noerror");
    
    }

}
else {



    header("location: generateTimeSlot.html");
    exit();
    
    }

?>