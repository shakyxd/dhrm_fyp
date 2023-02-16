<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="johan.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>


<?php
session_start();

?>



<body style="background-color:#D3D3D3;">


<header>
    <nav>
        <div>
            <h3><a href=index.php>Dental Health Record Management System</a></h3>
        </div>
    </nav>
</header>
<br>

<div class ="container" align="center">
    <h3> Genearate Time Slot </h3>
</div>

<div class ="container" align="center">

<form method="post" action="includes\generateTimeSlot.inc.php">

<table>

    <tr>
        <td align="right"> Enter Date: </td>
        <td align="left"><input type="date" name="date"></td>

    </tr>

    <tr>
         <td align="center" colspan=2> <input type="submit" value="Generate" class="submitBtn" name=generate></td>
    </tr>



</div>



<div class ="container" align="center">

<!-- Display Staff Table -->




<table border="1">

<tr>

<th> Staff ID </th>
<th> Staff Type </th>
<th> First Name </th>
<th> Last Name </th>
<th> Gender </th>
</tr>


<?php

$userID = $_SESSION["userID"];

$conn = new mysqli('localhost', 'root', '', 'fyp');
    if(!$conn) {
    die("Connection Error");
    }

$query = "select * from staff WHERE clinicID = $userID AND staffType = 'Dentist' ORDER BY staffID ASC";




if ($result = $conn->query($query)) {
         while ($row = $result->fetch_assoc()) {

        $column1 = $row["staffID"];
        $column2 = $row["staffType"];
        $column3 = $row["firstNameStaff"];
        $column4 = $row["lastNameStaff"];
        $column5 = $row["genderStaff"];


            echo '<tr>
                <td>'.$column1.'</td>
                <td>'.$column2.'</td>
                <td>'.$column3.'</td>
                <td>'.$column4.'</td>
                <td>'.$column5.'</td>
                </tr>';
                
                }       

    }
    $result-> free();

?>

</table>

<!-- Display Select Table -->

</div>

<br>
<br>

<div class ="container" align="center">
                
    <table border=1>
    <tr>
    <th> Dentist One </th>
    <th> Dentist Two </th>
    <th> Dentist Three </th>
    <th> Dentist Four </th>
    <th> Dentist Five </th>
    </tr>

    <tr>


<?php

$userID = $_SESSION["userID"];

$conn = new mysqli('localhost', 'root', '', 'fyp');
    if(!$conn) {
    die("Connection Error");
    }

$query = "select * from staff WHERE clinicID = $userID AND staffType = 'Dentist' ORDER BY staffID ASC";


echo '<td><select name=dentistOne>
<option value="0">None</option>';
if ($result = $conn->query($query)) {

         while ($row = $result->fetch_assoc()) {

        $column1 = $row["staffID"];
        $column2 = $row["staffType"];
        $column3 = $row["firstNameStaff"];
        $column4 = $row["lastNameStaff"];
        $column5 = $row["genderStaff"];
       
                echo '<option value ="'.$column1.'">' .$column3. ' '.$column4.
                '</option>';
                                 
                }       

    }echo '</select></td>';
    $result-> free();


    echo '<td><select name=dentistTwo>
    <option value="0">None</option>';
    if ($result = $conn->query($query)) {
 
             while ($row = $result->fetch_assoc()) {
    
            $column1 = $row["staffID"];
            $column2 = $row["staffType"];
            $column3 = $row["firstNameStaff"];
            $column4 = $row["lastNameStaff"];
            $column5 = $row["genderStaff"];
           
                    echo '<option value ="'.$column1.'">' .$column3. ' '.$column4.
                    '</option>';
                                     
                    }       
    
        }echo '</select></td>';
        $result-> free();

        echo '<td><select name=dentistThree>
        <option value="0">None</option>';

        if ($result = $conn->query($query)) {
 
                 while ($row = $result->fetch_assoc()) {
        
                $column1 = $row["staffID"];
                $column2 = $row["staffType"];
                $column3 = $row["firstNameStaff"];
                $column4 = $row["lastNameStaff"];
                $column5 = $row["genderStaff"];
               
                        echo '<option value ="'.$column1.'">' .$column3. ' '.$column4.
                        '</option>';
                                         
                        }       
        
            }echo '</select></td>';
            $result-> free();


            echo '<td><select name=dentistFour>
            <option value="0">None</option>';
            if ($result = $conn->query($query)) {
      
                     while ($row = $result->fetch_assoc()) {
            
                    $column1 = $row["staffID"];
                    $column2 = $row["staffType"];
                    $column3 = $row["firstNameStaff"];
                    $column4 = $row["lastNameStaff"];
                    $column5 = $row["genderStaff"];
                   
                            echo '<option value ="'.$column1.'">' .$column3. ' '.$column4.
                            '</option>';
                                             
                            }       
            
                }echo '</select></td>';
                $result-> free();


                echo '<td><select name=dentistFive>
                <option value="0">None</option>';
                if ($result = $conn->query($query)) {
               
                         while ($row = $result->fetch_assoc()) {
                
                        $column1 = $row["staffID"];
                        $column2 = $row["staffType"];
                        $column3 = $row["firstNameStaff"];
                        $column4 = $row["lastNameStaff"];
                        $column5 = $row["genderStaff"];
                       
                                echo '<option value ="'.$column1.'">' .$column3. ' '.$column4.
                                '</option>';
                                                 
                                }       
                
                    }echo '</select></td>';
                    $result-> free();






?>

</tr>

</table>


</form>


</div>


<br>
<br>
<br>


<!-- Display Time Slots Table -->

<div class ="container" align="center">


<table border="1">

<tr>

<th> TimeSlot ID </th>
<th> Clinic ID </th>
<th> Date </th>
<th> Time </th>
<th> Dentist One </th>
<th> Dentist Two </th>
<th> Dentist Three </th>
<th> Dentist Four </th>
<th> Dentist Five </th>
<th> Remove Dentist From List </th>
<th> Delete </th>

</tr>

<?php

$userID = $_SESSION["userID"];

$conn = new mysqli('localhost', 'root', '', 'fyp');
    if(!$conn) {
    die("Connection Error");
    }
$query2 = "select * from timeslot WHERE clinicID = $userID ORDER BY date, time ASC";



if ($result = $conn->query($query2)) {
         while ($row = $result->fetch_assoc()) {

        $column1 = $row["timeSlotID"];
        $column2 = $row["clinicID"];
        $column3 = $row["date"];
        $column4 = $row["time"];
        $column5 = $row["dentistOneID"];
        $column6 = $row["dentistTwoID"];
        $column7 = $row["dentistThreeID"];
        $column8 = $row["dentistFourID"];
        $column9 = $row["dentistFiveID"];
        $column10 = "Delete";

            echo '<tr>
                <td>'.$column1.'</td>
                <td>'.$column2.'</td>
                <td>'.$column3.'</td>
                <td>'.$column4.'</td>
                <td>'.$column5.'</td>
                <td>'.$column6.'</td>
                <td>'.$column7.'</td>
                <td>'.$column8.'</td>
                <td>'.$column9.'</td>
                <td>'.$column10.'</td>
                </tr>';

    }
    $result-> free();
}


?>

</table>


</div>


</body>
</html>



