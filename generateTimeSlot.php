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


</form>
</div>

<div>

<!-- Display Time Slots Table -->




<table border="1">

<tr>

<th> TimeSlot ID </th>
<th> Clinic ID </th>
<th> Date </th>
<th> Time </th>
<th> Available Dentist </th>
<th> Remove Dentist From List </th>
<th> Remove </th>

</tr>

<?php

$userID = $_SESSION["userID"];

$conn = new mysqli('localhost', 'root', '', 'fyp');
    if(!$conn) {
    die("Connection Error");
    }
// $query = 'select * from timeslot ORDER BY date, time ASC ';
$query = "select * from timeslot WHERE clinicID = $userID ORDER BY date, time ASC";




if ($result = $conn->query($query)) {
         while ($row = $result->fetch_assoc()) {

        $column1 = $row["timeSlotID"];
        $column2 = $row["clinicID"];
        $column3 = $row["date"];
        $column4 = $row["time"];
        $column5 = $row["dentistList"];
        $column6 = json_decode($column5);
        $column7 = "Delete";

        $encode = json_encode($column5);
 

            echo '<tr>
                <td>'.$column1.'</td>
                <td>'.$column2.'</td>
                <td>'.$column3.'</td>
                <td>'.$column4.'</td>
                <td>'.$column5.'</td>
                <td> <select name="dentistName">';
        
             foreach($column6 as $value) {
                   echo '<option value ="'.$value.'">' .$value.
                    '</option>';

                }
                
                
                echo '</select>

                
                <td> <a href="includes/deleteDentist.inc.php?timeSlotID='.$column1.'&dentistName='.$value.'"> Remove </a> </td>
                <td>'.$column7.'</td>
                </tr>';

    }
    $result-> free();
}


?>

</table>


</div>


</body>
</html>



