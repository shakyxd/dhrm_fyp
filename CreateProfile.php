<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Rent Buddy</title>
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
    $r = mysqli_query($data,"SHOW TABLE STATUS LIKE 'profiles'");
    $row = mysqli_fetch_array($r);
    $auto_increment = $row['Auto_increment'];
    $profileName="";
    $deactivate="";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $profileName= $_POST["profileName"];
        $deactivate=$_POST["deactivated"];
        do{
            if(empty($profileName)){
                $errorMessage="Profile Name is required";
                break;
            }
                $sql="INSERT INTO profiles (profileName, deactivated) 
                        VALUES('$profileName','$deactivate')";
                $result=mysqli_query($data,$sql);
                if(!$result){
                    $errorMessage="Invalid query: ".$data->error;
                    break;
                }
                $profileName="";
                $deactivate="";
    
                $successMessage="New Profile added successfully";
    
                header("location:ViewProfile.php");
                exit;
        }while(false);
    }
    ?>
    <div class="createProfile-container"> 
        <h2>Create new User Profile</h2></br>
        <?php
        if(!empty($errorMessage)){
            echo "<strong>$errorMessage</strong>";
        }
        ?>
        <form method="post">
            <label>Profile ID:</label>
            <input type="text" name="profileID" value="<?php echo $auto_increment;?>" readonly size=4 style="text-align:center;">
            </br><label>Profile Name:</label>
            <input type="text" name="profileName" value="<?php echo $profileName;?>">
            </br><label>Status:</label>
            <select name="status" value="<?php echo$deactivate;?>">
                <option value="0">Activate</option>
                <option value="1">Suspend</option>
            </select>
            <?php
                if(!empty($successMessage)){
                    echo"<strong>$successMessage</strong>";
                }
            ?>
            </br></br><button type="submit" class="createProfileSubmitbtn">Submit</button>
            <a href="ViewProfile.php" class=delbtn role="button">Cancel</a>
        </form>
    </div>
    </body>
</html>