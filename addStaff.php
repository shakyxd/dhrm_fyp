<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="johan.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>


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
    <h3> Add Staff </h3>
</div>

<div class ="container" align="center">

<form method="post" action="includes\addStaff.inc.php">

<table>
    <tr>
        <td align="right"> Select staff type </td>
        <td align="left">
        <select name="staffType">
        <option value="Admin"> Admin </option>
        <option value="Dentist"> Dentist </option>
        <option value="Staff"> Staff </option>

        </select>
        </td>
    </tr>

    <tr>
        <td align="right"> Staff email: </td>
        <td align="left"><input type="text" name="emailStaff"></td>

        <td align="right"> Staff Phone Number: </td>
        <td align="left"><input type="text" name="phoneNumStaff"></td>

    </tr>

    <tr>
        <td align="right"> First Name: </td>
        <td align="left"><input type="text" name="firstNameStaff"></td>

        <td align="right"> Last Name: </td>
        <td align="left"><input type="text" name="lastNameStaff"></td>

    </tr>

    <tr>
        <td align="right"> Date Of Birth: </td>
        <td align="left"><input type="date" name="dateOfBirthStaff"></td>

        <td align="right"> Salary: $</td>
        <td align="left"><input type="text" name="salary"></td>

    </tr>

    <tr>
    <td align="right"> Gender: </td>
                
                <td>
                <input type="radio" name="genderStaff" value="M" required> Male </input>
                <input type="radio" name="genderStaff" value="F"> Female </input>
                </td>
    </tr>

    <tr>
         <td align="center" colspan=4> <input type="submit" value="Add Staff" class="submitBtn"></td>
    </tr>


</form>
</div>

<div>

<!-- Display Treatment Table -->




<table border="1">

<tr>

<th> Staff ID </th>
<th> Clinic ID </th>
<th> Email </th>
<th> Phone Number </th>
<th> Staff Type </th>
<th> First Name </th>
<th> Last Name </th>
<th> Gender </th>
<th> D.O.B </th>
<th> Salary </th>
<th> Deactivated </th>
<th> Active </th>
<th> Remove </th>

</tr>

<?php

$clinicID = $_SESSION["userID"];

$conn = new mysqli('localhost', 'root', '', 'fyp');
    if(!$conn) {
    die("Connection Error");
    }
$query = "select * from staff where clinicID = $clinicID ORDER BY staffID ASC";




if ($result = $conn->query($query)) {
         while ($row = $result->fetch_assoc()) {

        $column1 = $row["staffID"];
        $column2 = $row["clinicID"];
        $column3 = $row["emailStaff"];
        $column4 = $row["phoneNumStaff"];
        $column5 = $row["staffType"];
        $column6 = $row["firstNameStaff"];
        $column7 = $row["lastNameStaff"];
        $column8 = $row["genderStaff"];
        $column9 = $row["dateOfBirthStaff"];
        $column10 = $row["salary"];
        $column11 = $row["deactivated"];
        $column12 = "Active";
        $column13 = "Delete";
 

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
                <td>'.$column11.'</td>
                <td>'.$column12.'</td>
                <td>'.$column13.'</td>
                </tr>';

    }
    $result-> free();
}

?>

</table>


</div>


</body>
</html>



