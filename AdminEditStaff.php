<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "fyp";

//create connection 
$connection = new mysqli($servername, $username, $password, $database);

$staffID = "";
$clinicID = "";
$emailStaff="";
$phoneNumStaff="";
$staffType ="";
$dateJoined ="";
$dateLeft ="";
$salary ="";
$firstNameStaff ="";
$lastNameStaff ="";
$genderStaff ="";
$dateOfBirthStaff ="";


$errorMessage ="";
$successMessage="";

  if ($_SERVER['REQUEST_METHOD']== 'GET'){
    //GET method: show the data 
  
    if (!isset($_GET["staffID"])){
      header("location:AdminAcctStaff.php");
    }
  
    $staffID = $_GET["staffID"];
  
    //read the row of the selected staff from db table
    $sql = "SELECT * FROM staff WHERE staffID=$staffID";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
  
    if (!$row){
      header("location:AdminAcctStaff.php");
      exit;
    }
    $emailStaff = $row["emailStaff"];
    $phoneNumStaff=$row["phoneNumStaff"];
    $staffType = $row["staffType"];
    $dateJoined = $row["dateJoined"];
    $dateLeft = $row["dateLeft"];
    $salary = $row["salary"];
    $firstNameStaff = $row["firstNameStaff"];
    $lastNameStaff = $row["lastNameStaff"];
    $genderStaff = $row["genderStaff"];
    $dateOfBirthStaff = $row["dateOfBirthStaff"];
  
  }
  else{
    //POST METHOD: Update the data 
  
    $staffID = $_POST["staffID"];
    $emailStaff = $_POST["emailStaff"];
    $phoneNumStaff=$_POST["phoneNumStaff"];
    $staffType = $_POST["staffType"];
    $dateJoined = $_POST["dateJoined"];
    $dateLeft = $_POST["dateLeft"];
    $salary = $_POST["salary"];
    $firstNameStaff = $_POST["firstNameStaff"];
    $lastNameStaff = $_POST["lastNameStaff"];
    $genderStaff = $_POST["genderStaff"];
    $dateOfBirthStaff = $_POST["dateOfBirthStaff"];

  
    do {
        if ( empty($emailStaff) || empty($phoneNumStaff) || empty($staffType) || empty($dateJoined) || empty($salary) || empty($firstNameStaff) || empty($lastNameStaff) || empty($genderStaff) || empty($dateOfBirthStaff) ) {
          $errorMessage = "All the fields are required";
          break;
        }
  
        $sql = "UPDATE staff 
                SET emailStaff='$emailStaff',
                phoneNumStaff='$phoneNumStaff',
                staffType='$staffType',
                dateJoined='$dateJoined',
                salary='$salary',
                firstNameStaff='$firstNameStaff',
                lastNameStaff='$lastNameStaff',
                genderStaff='$genderStaff',
                dateOfBirthStaff='$dateOfBirthStaff'
                WHERE staffID=$staffID";  
        $result =$connection->query($sql);
  
        if(!$result){
          $errorMessage = "Invalid query:  " . $connection->error;
          break;
        }

        $successMessage = "Staff Information updated!";
          
        header("location:AdminAcctStaff.php");
        exit;
  
    } while (false);
  
  }



?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Admin Update Staff</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">

    

    

<link href="dist/css/bootstrap.min.css" rel="stylesheet">

    

    
    <!-- Custom styles for this template -->
    <link href="dist/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">ToothScanner</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="unset.php">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <?php
        require_once("AdminNav.php");
    ?>



    <form method="post">

<div class="form-center">
<div class="background">
<div class="container">
<div class="card mb-4">

  <div class="screen-body">
    <div class="screen-body-item">
      <div class="app-form">

       <form method="post">
       <input type="hidden" name ="staffID" value="<?php echo $staffID; ?>">
   <div class="col-md-7 col-lg-8">
    <h4 class="mb-3">Update Staff</h4>
    <form  method="post">
      <div class="row g-3">
        <div class="col-12">
            <label for="emailStaff" class="form-label">Staff Email</label>
            <input type="text" name="emailStaff" class="form-control" id="emailStaff" value="<?php echo $emailStaff; ?>" >
        </div>

        <div class="col-12">
            <label for="phoneNumStaff" class="form-label">Staff Phone Number</label>
            <input type="text" name="phoneNumStaff" class="form-control" id="phoneNumStaff" value="<?php echo $phoneNumStaff; ?>" >
        </div>

        <div class="col-sm-6">
          <label for="staffType" class="form-label">Staff Type</label>
          <select name="staffType" class="form-select" id="inputGroupSelect04" value="<?php echo $staffType;?>">
            <option value="Dentist" <?php if($staffType=="M") {echo "selected";}?>>Dentist</option>
            <option value="Admin" <?php if($staffType=="F") {echo "selected";}?>>Admin</option>
          </select>  
        </div>
        <div class="col-sm-6">
          <label for="dateJoined" class="form-label">Date Jpined</label>
          <input type="date" name="dateJoined" class="form-control" id="dateJoined"  value="<?php echo $dateJoined;?>">
        </div>

        <div class="col-12">
          <label for="dateLeft" class="form-label">Date Left</label>
          <input type="date" name="dateLeft" class="form-control" id="dateLeft"  value="<?php echo $dateLeft;?>">
        </div>
        <div class="col-12">
          <label for="salary" class="form-label">Salary</label>
          <input type="text" name="salary" class="form-control" id="salary" value="<?php echo $salary; ?>">
        </div>

        <div class="col-12">
          <label for="firstNameStaff" class="form-label">First Name</label>
          <input type="text" name="firstNameStaff" class="form-control" id="firstNameStaff" value="<?php echo $firstNameStaff; ?>">
        </div>
        <div class="col-12">
          <label for="lastNameStaff" class="form-label">Last Name</label>
          <input type="text" name="lastNameStaff" class="form-control" id="lastNameStaff" value="<?php echo $lastNameStaff;?>">
        </div>


        <div class="col-sm-6">
          <label for="genderStaff" class="form-label">Gender</label>
          <select name="genderStaff" class="form-select" id="inputGroupSelect05" value="<?php echo $genderStaff;?>">
            <option value="M" <?php if($genderStaff=="M") {echo "selected";}?>>M</option>
            <option value="F" <?php if($genderStaff=="F") {echo "selected";}?>>F</option>
          </select>  
        </div>

        <div class="col-sm-6">
          <label for="dateOfBirthStaff" class="form-label">Date Of Birth</label>
          <input type="date" name="dateOfBirthStaff" class="form-control" id="dateOfBirthStaff"  value="<?php echo $dateOfBirthStaff;?>">
        </div>

      

        </div>
      </div>
      <br>


 

      <button class="my-button" type="submit">Update</button>
        </div>
      </div>

    </form>
</div>
</div>
</div>


    <script src="dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dist/js/dashboard.js"></script>
  </body>
</html>

<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .background {
  display: flex;
  min-height: 50vh;
}

.container {
  flex: 0 1 800px;
  margin: auto;
  padding: 20px;
}

.screen-body {
  display: flex;
}

.screen-body-item {
  flex: 2;
  padding: 10px;
}


.app-form-group {
  margin-bottom: 15px;
}

.app-form-group.message {
  margin-top: 40px;
}



.app-form-control {
  width: 100%;
  padding: 15px 0;
  background: none;
  border: none;
  border-bottom: 1px solid #666;
  color: #ffffff;
  font-size: 14px;
  outline: none;
  transition: border-color .2s;
}

.app-form-control::placeholder {
  color: #d4d4d4;
}



@media screen and (max-width: 520px) {
  .screen-body {
    flex-direction: column;
  }



  .app-title span {
    margin-right: 12px;
  }

  .app-title:after {
    display: none;
  }
}

@media screen and (max-width: 600px) {
  .screen-body {
    padding: 40px;
  }

  .screen-body-item {
    padding: 0;
  }
}
.error
	{
		color: #fc0303;
		font-size: 16px;
	}
	
	.app-form-group {
  margin-bottom: 10px;
  margin-top: -2px;
}




.app-form-control {
  width: 100%;
  padding: 4px 2px;
  background: none;
  border: none;
  border-bottom: 2px solid #eeeeee;
  color: #4169E1;
  font-size: 16px;
  outline: none;
  transition: border-color .2s;
}

.app-form-control::placeholder {
  color: #000000;
}

.form-center {
  position: static;
  width:120%;
  height:0em;
}
.my-button {
    display: inline-block;
    margin: 5px; /* space between buttons */
    background: #c1e1e0; /* background color */
    color: #333; /* text color */
    font-size: 1.8em;
    font-family: ‘Monaco’, serif;
    font-style: bold;
    border-radius: 30px; /* rounded corners */
    padding: 8px 16px; /* space around text */
    -moz-transition: all 0.2s;
    -webkit-transition: all 0.2s;
    transition: all 0.2s;
}

.my-button:hover {
    background: #666;
    color: #c1e1e0;
}
    </style>