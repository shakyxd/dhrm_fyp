<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Inventory</title>
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
            <li><a href="CreateItem.php" class="profile-menu-item">Create a new Item</a></li>
        </ul>
    </div>
    </br></br>
    <table>
        <thead>
            <tr>
                <th>Item ID</th>
                <th>Item Name</th>
                <th>Quantity</th>
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
            $sql="SELECT * from material";
            $result=mysqli_query($data,$sql);
            while($row=$result->fetch_assoc()){
                echo "<tr>
                        <td>$row[itemID]</td>
                        <td>$row[itemName]</td>
                        <td>$row[itemQty]</td>
                        <td>
                            <a href='UpdateItem.php?id=$row[itemID]&pid=2' class='modbtn'>Update</a>
                        </td>
                     </tr>";
            }?>
        </tbody>
    </table>
    </body>
</html>