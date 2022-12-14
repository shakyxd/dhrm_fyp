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
$accountID="";
$username="";
$password="";
$profileID="";
$deactivated="";
$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']=='GET'){
    if(!isset($_GET["aid"])){
        header("location:viewAccount.php");
        exit;
    }

    $accountID = $_GET["aid"];

    $sql="SELECT * FROM accounts WHERE accountID=$accountID";
    $result=$data->query($sql);
    $row=$result->fetch_assoc();
    /*if(!$row){
        if(isset($_GET["pid"])){
            header("location:DentistViewItem.php");
        }
        else{
            header("location:AdminViewItem.php");
        }
        exit;
    }*/
    $username=$row["username"];
    $password=$row["password"];
}
else{
    $username= $_POST["username"];
    $password= $_POST["password"];
    $accountID = $_GET["aid"];
    do{
        if(empty($password)){
            $errorMessage="All fields are required";
            break;
        }
            $sql="UPDATE accounts 
                SET password='$password'
                WHERE accountID='$accountID'";
            $result=mysqli_query($data,$sql);
            if(!$result){
                $errorMessage="Invalid query: ".$data->error;
                break;
            }

            $successMessage="Account updated successfully";

            // if(isset($_GET["pid"])){
            //     header("location:DentistViewItem.php");
            // }
            // else{
            //     header("location:AdminViewItem.php");
            // }
            // exit;
            header("location:viewAccount.php");
    }while(false);
}
if(isset($_POST['button'])){
    echo $_SERVER['HTTP_REFERER']; 
   }
   
?>
    <div class="createProfile-container"> 
        <h2>Update Account Details</h2></br>
        <?php
        if(!empty($errorMessage)){
            echo "<strong>$errorMessage</strong>";
        }
        ?>
        <form method="post">
            <label>Account ID:</label>
            <input type="text" size=4 readonly name="accountID" value ="<?php echo $accountID;?>" style="text-align:center;">
            </br><label>Username:</label>
            <input type="text" name="username" readonly value="<?php echo $username;?>">
            </br><label>Password:</label>
            <input type="text" name="password" value="<?php echo $password;?>">
            <?php
                if(!empty($successMessage)){
                    echo"<strong>$successMessage</strong>";    
                }
            ?>
            </br></br><button type="submit" class="createProfileSubmitbtn">Submit</button>
            <?php
                // if(isset($_GET["pid"])){
                //     echo("<a href='.php' class=delbtn role='button'>Cancel</a>");
                // }
                // else{
                //     echo("<a href='viewAccount.php' class=delbtn role='button'>Cancel</a>");
                // }
            ?>
            <a href='viewAccount.php' class=delbtn role='button'>Cancel</a>
        </form>
    </div>

    </body>
</html>