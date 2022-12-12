<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DHRM FYP</title>
        <link rel="stylesheet" href="profilestyle.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    </head>
    <body style="background-color:#D3D3D3;">
    <header>
        <nav>
            <div>
                <h3><a href=index.php>Dental Health Record Management System - (All Accounts)</a></h3>
            </div>
        </nav>
    </header>
    </br></br>

    </br></br>
    <table>
        <thead>
            <tr>
                <th>Account ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Profile ID</th>
				<th>Deactivated</th>
				<th>Update Account</th>
				<th>Suspend Account</th>
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
            $sql="SELECT * from accounts";
            $result=mysqli_query($data,$sql);
            while($row=$result->fetch_assoc()){
                echo "<tr>
                        <td>$row[accountID]</td>
                        <td>$row[username]</td>
						<td>$row[password]</td>
						<td>$row[profileID]</td>
                        <td>$row[deactivated]</td>
						<td><a href='updateAccount.php?aid=$row[accountID]' class='modbtn'>Update</a></td>";
                        if($row["deactivated"]==0){
                            echo"<td><a href='suspendAccount.php?aid=$row[accountID]' class='modbtn'>Suspend</a></td></tr>";
                        }
                        else{
                            echo"<td><a href='suspendAccount.php?aid=$row[accountID]' class='modbtn'>Activate</a></td></tr>";
                        }
					
						
            }?>
        </tbody>
    </table>
    </body>
</html>