<?php

require_once 'dbHandler.inc.php';

function emptyInputSignUp($email, $password, $password2, $mobileNum, $fname, $lname, $gender,  $dateOfBirth, $nationality) 
{
    $result = true;

    if (empty($email) || empty($password) || empty($password2) || empty($mobileNum)|| empty($fname) ||
     empty($lname) || empty($gender)|| empty($dateOfBirth) || empty($nationality)) 
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

function emailExists($conn, $email) {
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
 $lname, $gender, $dateOfBirth, $nationality, $allergies) 
{
    $sql = "INSERT INTO patient(emailPatient, passwordPatient, mobileNum, 
    firstName, lastName, gender, dateOfBirth, nationality, allergiesList)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:./registerPatient.html?error=stmtfailed");
        exit();

    }

    // $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssissssss", $email, $password, $mobileNum, $fname, $lname, $gender, $dateOfBirth, $nationality, $allergies);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header("location:./registerPatient.html?error=noerror");
    exit();
}



?>


