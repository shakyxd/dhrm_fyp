<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
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
<?php 

$host="localhost";
$user="root";
$password="";
$db="fyp";

$data=mysqli_connect($host,$user,$password,$db);
if($data===false){
    die("connection error");
}
$itemID="";
$itemName="";
$itemQty="";
$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']=='GET'){
    if(!isset($_GET["id"])){
        header("location:AdminViewItem.php");
        exit;
    }

    $itemID = $_GET["id"];

    $sql="SELECT * FROM material WHERE itemID=$itemID";
    $result=$data->query($sql);
    $row=$result->fetch_assoc();
    if(!$row){
        header("location:AdminViewItem.php");
        exit;
    }
    $itemName=$row["itemName"];
    $itemQty=$row["itemQty"];
}
else{
    $itemID=$_POST["itemID"];
    $itemName= $_POST["itemName"];
    $itemQty= $_POST["itemQty"];

    do{
        if(empty($itemName)||empty($itemQty)){
            $errorMessage="All fields are required";
            break;
        }
            $sql="UPDATE material SET itemName='$itemName', itemQty='$itemQty' WHERE itemID='$itemID'";
            $result=mysqli_query($data,$sql);
            if(!$result){
                $errorMessage="Invalid query: ".$data->error;
                break;
            }

            $successMessage="Item updated successfully";

            header("location:AdminViewItem.php");
            exit;
    }while(false);
}
?>
    <div class="createProfile-container"> 
        <h2>Update Item Details</h2></br>
        <?php
        if(!empty($errorMessage)){
            echo "<strong>$errorMessage</strong>";
        }
        ?>
        <form method="post">
            <label>Item ID:</label>
            <input type="text" size=4 readonly name="itemID" value ="<?php echo $itemID;?>" style="text-align:center;">
            </br><label>Item Name:</label>
            <input type="text" name="itemName" value="<?php echo $itemName;?>">
            </br><label>Quantity:</label>
            <input type="number" name="itemQty" value="<?php echo $itemQty;?>">
            <?php
                if(!empty($successMessage)){
                    echo"<strong>$successMessage</strong>";
                    
                }
            ?>
            </br></br><button type="submit" class="createProfileSubmitbtn">Submit</button>
            <button onclick="history.back()" class="delbtn"role="button">Cancel</a>
        </form>
    </div>

    </body>
</html>