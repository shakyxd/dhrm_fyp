<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Accounts</title>
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
            <li><a href="createAccount.html" class="profile-menu-item">Create a new User Account</a></li>
        </ul>
        </br>
        <form method="GET" class="searchbar">
            <input type="text" required name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" placeholder="Type anything to search">
            <button type="submit" name="submit" class="modbtn">Search</button>
            <a href="viewAccount.php" class="modbtn" role="button">Refresh</a>
        </form>
    </div>
    </br>
    <table>
        <thead>
            <tr>
                <th>Account ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Staff/Patient ID</th>
                <th>First Name</th>
                <th>Last Name</th>
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
            if(isset($_GET['search'])){
                $filtervalues=$_GET['search'];
                $sql="SELECT accounts.accountID, accounts.username, accounts.password, accounts.profileID, 
                accounts.deactivated, patients.patientID, patients.firstName, patients.lastName,
                patients.accountID, patients.planID, staffs.staffID, staffs.firstName, staffs.lastName,
                staffs.retired, staffs.accountID
                FROM accounts
                LEFT JOIN patients ON patients.accountID=accounts.accountID
                LEFT JOIN staffs ON staffs.accountID=accounts.accountID
                GROUP BY accounts.accountID
                WHERE CONCAT(accounts.username,patients.firstName,patients.lastName,staffs.firstName,staffs.lastName) 
                LIKE '%$filtervalues%'";
            }
            else{
                $sql="SELECT accounts.accountID, accounts.username, accounts.password, accounts.profileID, 
                accounts.deactivated, patients.patientID, patients.firstName as pfn, patients.lastName as pln,
                patients.accountID as p_aid, patients.planID, staffs.staffID, staffs.firstName as sfn, staffs.lastName as sln,
                staffs.retired, staffs.accountID as s_aid
                FROM accounts
                LEFT JOIN patients ON patients.accountID=accounts.accountID
                LEFT JOIN staffs ON staffs.accountID=accounts.accountID
                GROUP BY accounts.accountID";
            }
            // $sql="SELECT * from accounts 
            //     LEFT JOIN patients ON accounts.accountID=patients.accountID
            //     UNION
            //     SELECT * FROM accounts
            //     RIGHT JOIN patients ON accounts.accountID=patients.accountID";
            // $sql="SELECT *
            // FROM accounts LEFT JOIN patients ON accounts.accountID = patients.accountID
            //         LEFT JOIN staffs ON accounts.accountID = staffs.accountID
            // UNION
            // SELECT *
            // FROM patients LEFT JOIN accounts ON accounts.accountID = patients.accountID
            //         LEFT JOIN staffs ON patients.accountID = staffs.accountID
            // WHERE accounts.accountID is NULL
            // UNION
            // SELECT *
            // FROM staffs LEFT JOIN accounts ON accounts.accountID = staffs.accountID
            //         LEFT JOIN patients ON patients.accountID = staffs.accountID
            // WHERE accounts.accountID IS NULL AND patients.accountID IS NULL";
            
            $result=mysqli_query($data,$sql);
            while($row=$result->fetch_assoc()){
                if($row["profileID"]==3){
                    echo "<tr>
                        <td>$row[p_aid]</td>
                        <td>$row[username]</td>
						<td>$row[password]</td>
                        <td>$row[patientID]</td>
                        <td>$row[pfn]</td>
                        <td>$row[pln]</td>
						<td>$row[profileID]</td>
                        <td>$row[deactivated]</td>
						<td><a href='UpdateAccount.php?aid=$row[accountID]' class='modbtn'>Update</a></td>";
                        if($row["deactivated"]==0){
                            echo"<td><a href='suspendAccount.php?aid=$row[accountID]' class='delbtn'>Suspend</a></td></tr>";
                        }
                        else{
                            echo"<td><a href='suspendAccount.php?aid=$row[accountID]' class='modbtn'>Activate</a></td></tr>";
                        }
                }
                else if($row["profileID"]==2){
                    echo "<tr>
                        <td>$row[s_aid]</td>
                        <td>$row[username]</td>
						<td>$row[password]</td>
                        <td>$row[staffID]</td>
                        <td>$row[sfn]</td>
                        <td>$row[sln]</td>
						<td>$row[profileID]</td>
                        <td>$row[deactivated]</td>
						<td><a href='UpdateAccount.php?aid=$row[accountID]' class='modbtn'>Update</a></td>";
                        if($row["deactivated"]==0){
                            echo"<td><a href='suspendAccount.php?aid=$row[accountID]' class='delbtn'>Suspend</a></td></tr>";
                        }
                        else{
                            echo"<td><a href='suspendAccount.php?aid=$row[accountID]' class='modbtn'>Activate</a></td></tr>";
                        }
                    }
                else{
                    echo "<tr>
                        <td>$row[accountID]</td>
                        <td>$row[username]</td>
						<td>$row[password]</td>
                        <td>N/A</td>
                        <td>N/A</td>
                        <td>N/A</td>
						<td>$row[profileID]</td>
                        <td>$row[deactivated]</td>
						<td><a href='UpdateAccount.php?aid=$row[accountID]' class='modbtn'>Update</a></td>";
                        if($row["deactivated"]==0){
                            echo"<td><a href='suspendAccount.php?aid=$row[accountID]' class='delbtn'>Suspend</a></td></tr>";
                        }
                        else{
                            echo"<td><a href='suspendAccount.php?aid=$row[accountID]' class='modbtn'>Activate</a></td></tr>";
                        }
                }
            }?>
        </tbody>
    </table>
    </body>
</html>