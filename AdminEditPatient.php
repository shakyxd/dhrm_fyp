<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "fyp";

//create connection 
$connection = new mysqli($servername, $username, $password, $database);

$patientID = "";
$emailPatient="";
$passwordPatient="";
$mobileNum ="";
$firstName ="";
$lastName ="";
$addressPatient ="";
$gender ="";
$dateOfBirth ="";
$nationality ="";
$allergiesList ="";


$errorMessage ="";
$successMessage="";

  if ($_SERVER['REQUEST_METHOD']== 'GET'){
    //GET method: show the data 
  
    if (!isset($_GET["patientID"])){
      header("location:AdminAcctPatient.php");
    }
  
    $patientID = $_GET["patientID"];
  
    //read the row of the selected patient from db table
    $sql = "SELECT * FROM patient WHERE patientID=$patientID";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
  
    if (!$row){
      header("location:AdminAcctPatient.php");
      exit;
    }
    $emailPatient = $row["emailPatient"];
    $passwordPatient=$row["passwordPatient"];
    $mobileNum = $row["mobileNum"];
    $firstName = $row["firstName"];
    $lastName = $row["lastName"];
    $addressPatient = $row["addressPatient"];
    $gender = $row["gender"];
    $dateOfBirth = $row["dateOfBirth"];
    $nationality = $row["nationality"];
    $allergiesList = $row["allergiesList"];
  
  }
  else{
    //POST METHOD: Update the data 
  
    $patientID = $_POST["patientID"];
    $emailPatient = $_POST["emailPatient"];
    $passwordPatient=$_POST["passwordPatient"];
    $mobileNum = $_POST["mobileNum"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $addressPatient = $_POST["addressPatient"];
    $gender = $_POST["gender"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $nationality = $_POST["nationality"];
    $allergiesList = $_POST["allergiesList"];

  
    do {
        if ( empty($emailPatient) || empty($passwordPatient) || empty($mobileNum) || empty($firstName) || empty($lastName) || empty($addressPatient) || empty($gender) || empty($dateOfBirth) || empty($nationality) || empty($allergiesList) ) {
          $errorMessage = "All the fields are required";
          break;
        }
  
        $sql = "UPDATE patient 
                SET emailPatient='$emailPatient',
                passwordPatient='$passwordPatient',
                mobileNum='$mobileNum',
                firstName='$firstName',
                lastName='$lastName',
                addressPatient='$addressPatient',
                gender='$gender',
                dateOfBirth='$dateOfBirth',
                nationality='$nationality',
                allergiesList='$allergiesList'
                WHERE patientID=$patientID";  
        $result =$connection->query($sql);
  
        if(!$result){
          $errorMessage = "Invalid query:  " . $connection->error;
          break;
        }

        $successMessage = "Patient Information updated!";
          
        header("location:AdminAcctPatient.php");
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
    <title>Admin Update Patient</title>

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
       <input type="hidden" name ="patientID" value="<?php echo $patientID; ?>">
   <div class="col-md-7 col-lg-8">
    <h4 class="mb-3">Update Patient</h4>
    <form  method="post">
      <div class="row g-3">
        <div class="col-12">
            <label for="emailPatient" class="form-label">Patient Email</label>
            <input type="text" name="emailPatient" class="form-control" id="emailPatient" value="<?php echo $emailPatient; ?>" >
        </div>

        <div class="col-12">
            <label for="passwordPatient" class="form-label">Patient Password</label>
            <input type="text" name="passwordPatient" class="form-control" id="passwordPatient" value="<?php echo $passwordPatient; ?>" >
        </div>

        <div class="col-12">
            <label for="mobileNum" class="form-label">Mobile Number</label>
            <input type="text" name="mobileNum" class="form-control" id="mobileNum" value="<?php echo $mobileNum;?>" >
        </div>

        <div class="col-12">
          <label for="firstName" class="form-label">First Name</label>
          <input type="text" name="firstName" class="form-control" id="firstName" value="<?php echo $firstName; ?>">
        </div>
        <div class="col-12">
          <label for="lastName" class="form-label">Last Name</label>
          <input type="text" name="lastName" class="form-control" id="lastName" value="<?php echo $lastName;?>">
        </div>
        <div class="col-sm-6">
          <label for="addressPatient" class="form-label">Patient Address</label>
          <input type="text" name="addressPatient" class="form-control" id="addressPatient"  value="<?php echo $addressPatient;?>">
        </div>


        <div class="col-sm-6">
          <label for="gender" class="form-label">Gender</label>
          <select name="gender" class="form-select" id="inputGroupSelect04" value="<?php echo $gender;?>">
            <option value="M" <?php if($gender=="M") {echo "selected";}?>>M</option>
            <option value="F" <?php if($gender=="F") {echo "selected";}?>>F</option>
          </select>  
        </div>

        <div class="col-sm-6">
          <label for="dateOfBirth" class="form-label">Date Of Birth</label>
          <input type="text" name="dateOfBirth" class="form-control" id="dateOfBirth"  value="<?php echo $dateOfBirth;?>">
        </div>


        <div class="col-sm-6">
          <label for="nationality" class="form-label">Nationality</label>
          <input type="text" name="nationality" class="form-control" id="nationality"  value="<?php echo $nationality;?>">
        </div>

        <div class="col-12">
          <label for="allergiesList" class="form-label">Allergies List</label>
          <input type="text" name="allergiesList" class="form-control" id="allergiesList"  value="<?php echo $allergiesList;?>">
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