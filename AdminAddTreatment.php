<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "fyp";

//create connection 
$connection = new mysqli($servername, $username, $password, $database);

$treatmentID="";
$clinicID = "";
$treatmentType="";
$treatmentName="";
$price ="";
$availability ="";

$errorMessage ="";
$successMessage="";

if ($_SERVER['REQUEST_METHOD']== 'POST'){
  $clinicID=$_POST["clinicID"];
  $treatmentType = $_POST["treatmentType"];
  $treatmentName = $_POST["treatmentName"];
  $price = $_POST["price"];
  $availability = $_POST["status"];

  do {
      if ( empty($clinicID) || empty($treatmentType) || empty($treatmentName) || empty($price) || empty($availability) ) {
        $errorMessage = "All the fields are required";
        break;
      }

      $sql = "INSERT INTO treatment (clinicID, treatmentType, treatmentName, price)
              VALUES ('".$clinicID."', '".$treatmentType."', '".$treatmentName."', '".$price."')"; 
      $result =$connection->query($sql);

      if(!$result){
        $errorMessage = "Invalid query:  " . $connection->error;
        break;
      }

      $successMessage = "New Treatment Added!";
        
      header("location:AdminViewTreatment.php");
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
    <title>Add Treatment (Admin)</title>

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
      <a class="nav-link px-3" href="#">Sign out</a>
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
   <div class="col-md-7 col-lg-8">
    <h4 class="mb-3">Add Treatment</h4>
    <form  method="post">
      <div class="row g-3">
        <div class="col-12">
            <label for="treatmentName" class="form-label">Treatment Name</label>
            <input type="text" name="treatmentName" class="form-control" id="treatmentName" >
        </div>
        <div class="col-12">
            <label for="treatmentType" class="form-label">Treatment Type</label>
            <select name="treatmentType" class="form-select" id="inputGroupSelect02">
                <option value="General Checkup"> General Checkup </option> 
                <option value="Wisdom Tooth"> Wisdom Tooth </option> 
                <option value="Tooth Extraction"> Tooth Extraction </option> 
                <option value="Root Canal"> Root Canal </option> 
                <option value="Orthodontics(Braces)"> Orthodontics(Braces) </option> 
                <option value="Crown and Bridges"> Crown and Bridges </option> 
                <option value="Tooth Filling"> Tooth Filling </option> 
                <option value="Tooth Implant"> Tooth Implant </option> 
                <option value="Teeth Whitening"> Teeth Whitening </option> 
                <option value="Teeth Cleaning"> Teeth Cleaning </option> 
                <option value="X-ray"> X-ray </option>
            </select>
        </div>
        <div class="col-12">
            <label for="clinicID" class="form-label">Clinic</label>
            <select name="clinicID" class="form-select" id="inputGroupSelect04">
                <?php
                    $sql2="SELECT * FROM clinic";
                    $result2=mysqli_query($connection,$sql2);
                    foreach ($result2 as $clinic){
                        $compare=$clinic["clinicID"];
                        echo'<option value="'.$clinic["clinicID"].'">'.$clinic["nameClinic"].'</option>';
                    }
                ?>
            </select>
        </div>

        <div class="col-6">
          <label for="price" class="form-label">Price</label>
          <input type="number" required name="price" class="form-control" id="price">
        </div>
        <div class="col-6">
          <label for="availability" class="form-label">Availability</label>
          <select name="status" class="form-select" id="inputGroupSelect04">
            <option value='1'>Available</option>
            <option value='0'>Not Available</option>
          </select>
        </div>
        </div>
      </div>
      <br>


 

      <button class="btn btn-sm btn-outline-secondary" type="submit">Add</button>
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