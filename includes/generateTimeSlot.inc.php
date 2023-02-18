<?php
session_start();

if (isset($_POST["generate"])) {


    $clinicID = $_SESSION["userID"];
    $date = $_POST["date"];
    $staffType = "Dentist";

    $dentistOne = $_POST["dentistOne"];
    $dentistTwo = $_POST["dentistTwo"];
    $dentistThree = $_POST["dentistThree"];
    $dentistFour = $_POST["dentistFour"];
    $dentistFive = $_POST["dentistFive"];

    $dentistList = array($dentistOne, $dentistTwo, $dentistThree, $dentistFour, $dentistFive);

    $del_value = 0;

    //removes all empty dentist List
    foreach ($dentistList as $key => $value) {
        if ($value == $del_value) {
            unset($dentistList[$key]);
        }
    }


    function dupesExist(array $dentistList) {
        $result = true;
        if(count($dentistList) === count(array_unique($dentistList))){
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }



    
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
        // echo '<script>alert("Please select a date!")</script>';
        echo '<script type="text/javascript">alert("Please select a date!");window.location.href="../generateTimeSlots.php?error=emptyinput"
    </script>';
        // header("location:../generateTimeSlot.php?error=emptyinput");
        exit();
      }


      if(dupesExist($dentistList) !== false) {
        echo '<script type="text/javascript">alert("There were two or more dentist per slot!");window.location.href="../generateTimeSlots.php?error=emptyinput"
        </script>';
        // header("location:../generateTimeSlot.php?error=duplicatesExist");
        exit();
      }

    // Create database connection
    $conn = new mysqli('localhost', 'root', '', 'fyp');


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        // //Old way of getting dentistList with JSON
        // $stmt = $conn->prepare("SELECT * FROM staff WHERE clinicID = ? AND staffType = ?");
        // $stmt->bind_param("ss", $clinicID, $staffType);
        // $stmt->execute();

        // $stmt_result = $stmt->get_result();
        
        // if ($stmt_result->num_rows > 0) {
        //   while($row = $stmt_result->fetch_assoc()) {
        //     $dentistList[] = $row["firstNameStaff"]. " " .$row["lastNameStaff"];
        //     $dentistJSON = json_encode($dentistList);
        //  } 
        //  echo $date;
        //  echo $dentistJSON;
        
        // } else {
        //   echo "Error Retrieving Data";
        // }
        
        $stmt1 = $conn->prepare("DELETE FROM timeslot WHERE clinicID = ? AND date = ?");
        $stmt1->bind_param("is", $clinicID, $date);
        $stmt1->execute();  

        //insert into treatment database

        foreach ($time as $value) {

            $stmt = $conn->prepare("INSERT INTO timeslot(clinicID, date, time, dentistOneID, dentistTwoID, dentistThreeID, dentistFourID, dentistFiveID)
            values(?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("issiiiii", $clinicID, $date, $value, $dentistOne, $dentistTwo, $dentistThree, $dentistFour, $dentistFive);
            $stmt->execute();    

        }
       
        header("location:../generateTimeSlots.php?error=noerror");
    
    }

}
else {



    header("location: generateTimeSlots.php");
    exit();
    
    }

?>