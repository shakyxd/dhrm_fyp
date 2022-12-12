<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DHRM fyp</title>
        <link rel="stylesheet" href="profilestyle.css">
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
    </br></br>
    <div class="profile">
        <ul class="profile-menu">
            <li><a href="CreateProfile.php" class="profile-menu-item">Create a new User Profile</a></li>
        </ul>
    </div>
    </br></br>
    <table>
        <thead>
            <tr>
                <th>Profile ID</th>
                <th>Name</th>
                <th>Deactivated</th>
                <th>modify</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $host="localhost";
            $user="root";
            $password="";
            $db="fyp";
        
            $data=mysqli_connect($host,$user,$password,$db);
            if($data===false){
                die("connection error");
            }
            $sql="SELECT * from profiles";
            $result=mysqli_query($data,$sql);
            while($row=$result->fetch_assoc()){
                echo "<tr>
                        <td>$row[profileID]</td>
                        <td>$row[profileName]</td>
                        <td>$row[deactivated]</td>";
                        if($row["deactivated"]==0){
                            echo"<td><a href='suspendProfile.php?pid=$row[profileID]' class='modbtn'>Suspend</a></td></tr>";
                        }
                        else{
                            echo"<td><a href='suspendProfile.php?pid=$row[profileID]' class='modbtn'>Activate</a></td></tr>";
                        }
            }?>
        </tbody>
    </table>
    </body>
</html>