<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create New Item</title>
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
    <?php
    $host="localhost";
    $user="root";
    $password="";
    $db="fyp";

    $data=mysqli_connect($host,$user,$password,$db);
    if($data===false){
        die("connection error");
    }
    //$lastIDquery= 'SELECT AUTO_INCREMENT FROM information_schema.TABLES 
    //        WHERE TABLE_SCHEMA = "fyp" AND TABLE_NAME = "profiles"';
    //$lastID=mysqli_query($data,$lastIDquery);
    $r = mysqli_query($data,"SHOW TABLE STATUS LIKE 'material'");
    $row = mysqli_fetch_array($r);
    $auto_increment = $row['Auto_increment'];
    $itemName="";
    $itemQty="";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $itemName= $_POST["itemName"];
        $itemQty=$_POST["itemQty"];
        do{
            if(empty($itemName)){
                $errorMessage="Item Name is required";
                break;
                }
                $sql="INSERT INTO material (itemName, itemQty) 
                        VALUES('$itemName','$itemQty')";
                $result=mysqli_query($data,$sql);
                if(!$result){
                    $errorMessage="Invalid query: ".$data->error;
                    break;
                }
                $itemName="";
                $itemQty="";
    
                $successMessage="New Item added successfully";
    
                header("location:AdminViewItem.php");
                exit;
        }while(false);
    }
    ?>
    <div class="createProfile-container"> 
        <h2>Create new Item</h2></br>
        <?php
        if(!empty($errorMessage)){
            echo "<strong>$errorMessage</strong>";
        }
        ?>
        <form method="post">
            <label>Item ID:</label>
            <input type="text" name="itemID" value="<?php echo $auto_increment;?>" readonly size=4 style="text-align:center;">
            </br><label>Item Name:</label>
            <input type="text" name="itemName" value="<?php echo $itemName;?>">
            </br><label>Item Quantity:</label>
            <input type="number" name="itemQty" value="<?php echo $itemQty;?>" size=6 style="text-align:center;">
            <?php
                if(!empty($successMessage)){
                    echo"<strong>$successMessage</strong>";
                }
            ?>
            </br></br><button type="submit" class="createProfileSubmitbtn">Submit</button>
            <a href="AdminViewItem.php" class=delbtn role="button">Cancel</a>
        </form>
    </div>
    </body>
</html>