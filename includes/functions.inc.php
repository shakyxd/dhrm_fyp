<?php

require_once 'dbHandler.inc.php';

//SIGN UP
function emptyInputSignUpPatient($email, $password, $password2, $mobileNum, $fname, $lname, $addressPatient, $gender,  $dateOfBirth, $nationality) 
{
    $result = true;

    if (empty($email) || empty($password) || empty($password2) || empty($mobileNum)|| empty($fname) ||
     empty($lname) || empty($addressPatient) ||empty($gender)|| empty($dateOfBirth) || empty($nationality)) 
     {
        $result = true;
     }
     else 
     {
        $result = false;
     }
    return $result;
}

 function invalidEmail($email) {
        $result = true;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $result = true;
        }
         else 
         {
            $result = false;
         }
         return $result;
        } 
    

 function passwordMatch($password, $password2) {
        $result = true;
        if ($password !== $password2) 
        {
            $result = true;
        }
         else 
         {
            $result = false;
         }
         return $result;
    
        } 

function emailExistsPatient($conn, $email) {
    $sql = "SELECT * FROM patient WHERE emailPatient = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:./registerPatient.html?error=stmtfailed");
        exit();

    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {

        return $row;

    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);


}

function registerPatient($conn, $email, $password, $mobileNum, $fname,
 $lname, $addressPatient, $gender, $dateOfBirth, $nationality, $allergies, $deactivated) 
{
    $sql = "INSERT INTO patient(emailPatient, passwordPatient, mobileNum, 
    firstName, lastName, addressPatient, gender, dateOfBirth, nationality, allergiesList, deactivated)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:./registerPatient.html?error=stmtfailed");
        exit();

    }

    // $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssisssssssi", $email, $password, $mobileNum, $fname, $lname, $addressPatient, $gender, $dateOfBirth, $nationality, $allergies, $deactivated);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    echo '<script type="text/javascript">alert("Registration successful!");window.location.href="./homepage.php"
    </script>';
    // header("location:./registerPatient.html?error=noerror");
    exit();
}



//LOGIN FUNCTIONS

function emptyInputLogin($email, $password) 
{
    $result = true;

    if (empty($email) || empty($password)) 
     {
        $result = true;
     }
     else 
     {
        $result = false;
     }
    return $result;
}

function loginPatient($conn, $email, $password) {
    $emailExists = emailExistsPatient($conn, $email);

    if($emailExists === false) {

        header("location:./loginPatient.html?error=wronglogin");
        exit();
    }

    $passwordGet = $emailExists["passwordPatient"];
    // $passwordCheck = password_verify($password, $passwordGet);

    if ($password !== $passwordGet) {

        header("location:./loginPatient.html?error=passwordwrong");
        exit();
    }
    else if($password === $passwordGet){

        session_start();
        $_SESSION["userID"] = $emailExists["patientID"];

        header("location:./PatientDashboard.php");


    }

}


//CLINIC FUNCTIONS

function emptyInputSignUpClinic($email, $password, $password2, $nameClinic, $phoneNum, $address, $area, $specialisation) 
{
    $result = true;

    if (empty($email) || empty($password) || empty($password2) || empty($nameClinic)|| empty($phoneNum) ||
     empty($address) || empty($area) ||empty($specialisation)) 
     {
        $result = true;
     }
     else 
     {
        $result = false;
     }
    return $result;
}



function emailExistsClinic($conn, $email) {
    $sql = "SELECT * FROM clinic WHERE emailClinic = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:./registerClinic.html?error=stmtfailed");
        exit();

    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {

        return $row;

    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);


}


function registerClinic($conn, $email, $password, $nameClinic, $phoneNum,
 $address, $area, $specialisation) 
{
    $sql = "INSERT INTO clinic(emailClinic, passwordClinic, nameClinic, 
    phoneNum, address, area, specialisation)
    VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:./registerClinic.html?error=stmtfailed");
        exit();

    }

    // $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssisss", $email, $password, $nameClinic, $phoneNum, $address, $area, $specialisation);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    echo '<script type="text/javascript">alert("Registration successful!");window.location.href="./homepage.php"
    </script>';
    // header("location:./registerclinic.html?error=noerror");
    exit();
}




function loginClinic($conn, $email, $password) {
    $emailExists = emailExistsClinic($conn, $email);

    if($emailExists === false) {

        header("location:./loginClinic.html?error=wronglogin");
        exit();
    }

    $passwordGet = $emailExists["passwordClinic"];
    // $passwordCheck = password_verify($password, $passwordGet);

    if ($password !== $passwordGet) {

        header("location:./loginClinic.html?error=passwordwrong");
        exit();
    }
    else if($password === $passwordGet){

        session_start();
        $_SESSION["userID"] = $emailExists["clinicID"];

        header("location:./ClinicDashboard.php");


    }

}

// GENERATE TIMESLOT

function emptyInputGenerateTimeSlot($date) 
{
    $result = true;

    if (empty($date)) 
     {
        $result = true;
     }
     else 
     {
        $result = false;
     }
    return $result;
}


?>


