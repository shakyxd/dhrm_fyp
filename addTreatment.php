<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="johan.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>


<?php

$treatmentCat = array
(
"General Checkup",
"Wisdom Tooth Removal",
"Tooth Extraction",
"Root Canal",
"Orthodontics(Braces)",
"Crown and Bridges",
"Tooth Filling",
"Tooth Implant",
"Teeth Whitening",
"Teeth Cleaning",
"X-ray"
)

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
    <h3> Add Treatment </h3>
</div>

<div class ="container" align="center">

<form method="post" action="includes\addTreatment.inc.php">

<table>
    <tr>
        <td align="right"> Select treatment Type </td>
        <td align="left">
        <select name="treatmentType">
        <option value="General Checkup"> General Checkup </option>
        <option value="Wisdom Tooth"> Wisdom Tooth </option>
        <option value="Tooth Extraction"> Tooth Extraction </option>
        <option value="Root Canal"> Root Canal </option>
        <option value="Orthodontics(Braces)"> Orthodontics(Braces) </option>
        <option value="Crown and Bridges"> Crown and Bridges </option>
        <option value="Tooth Filling"> Tooth Filling </option>
        <option value="Tooth Implant"> Tooth Implant </option>
        <option value="Teeth Whitening"> Teeth Whitening </option>
        <option value="Teeth Cleaning"> Teeth Cleaning </option>
        <option value="X-ray"> X-ray </option>
        </select>
        </td>
    </tr>

    <tr>
        <td align="right"> Enter Treatment Name: </td>
        <td align="left"><input type="text" name="treatmentName"></td>

    </tr>

    <tr>
        <td align="right"> Enter Price: $ </td>
        <td align="left"><input type="text" name="price"></td>

    </tr>

    <tr>
         <td align="center" colspan=2> <input type="submit" value="Add Treatment" class="submitBtn"></td>
    </tr>


</form>
</div>

<div>

<!-- Display Treatment Table -->




<table border="1">

<tr>

<th> Treatment ID </th>
<th> Clinic ID </th>
<th> Treatment Name </th>
<th> Treatment Type </th>
<th> Price </th>
<th> Availability </th>
<th> Active </th>
<th> Remove </th>

</tr>

<?php

$clinicID = $_SESSION["userID"];

$conn = new mysqli('localhost', 'root', '', 'fyp');
    if(!$conn) {
    die("Connection Error");
    }
$query = "select * from treatment where clinicID = $clinicID ";




if ($result = $conn->query($query)) {
         while ($row = $result->fetch_assoc()) {

        $column1 = $row["treatmentID"];
        $column2 = $row["clinicID"];
        $column3 = $row["treatmentName"];
        $column4 = $row["treatmentType"];
        $column5 = $row["price"];
        $column6 = $row["availability"];
        $column7 = "Active";
        $column8 = "Delete";
 

            echo '<tr>
                <td>'.$column1.'</td>
                <td>'.$column2.'</td>
                <td>'.$column3.'</td>
                <td>'.$column4.'</td>
                <td>'.$column5.'</td>
                <td>'.$column6.'</td>
                <td>'.$column7.'</td>
                <td>'.$column8.'</td>
                </tr>';

    }
    $result-> free();
}

?>

</table>


</div>


</body>
</html>



