<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $emailClinic = $_POST['emailClinic'];
  $passwordClinic = $_POST['passwordClinic'];
  $confirmPassword = $_POST['confirmPassword'];
  $nameClinic = $_POST['nameClinic'];
  $phoneNum = $_POST['phoneNum'];
  $address = $_POST['address'];
  $area = $_POST['area'];
  $specialisation = $_POST['specialisation'];
  

  // Validate the inputs
  if (empty($emailClinic) || empty($passwordClinic) || empty($confirmPassword) || empty($nameClinic) || empty($phoneNum) || empty($address) || empty($area) || empty($specialisation)) {
    echo "All fields are required.";
  } else {
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "fyp");

    // Check if the connection is successful
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Insert the new user into the database
    $sql = "INSERT INTO clinic (emailClinic, passwordClinic, nameClinic, phoneNum, address, area, specialisation)
            VALUES ('$emailClinic', '$passwordClinic', '$nameClinic', '$phoneNum', '$address', '$area', '$specialisation')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Record added successfully!');window.location.href = 'AdminClinicInformation.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

    // Close the connection
    mysqli_close($conn);
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Register Clinic (Admin)</title>

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

<div class="form-center">
<div class="background">
<div class="container">
<div class="card mb-4">
  <div class="screen-body">
    <div class="screen-body-item">
      <div class="app-form">
    <form action="" method="post">
 
      <div class="col-md-7 col-lg-8">
    <h4 class="mb-3">Register Clinic</h4>

    <form class="needs-validation" novalidate>
      <div class="row g-3">
        <div class="col-sm-6">
      <label for="emailClinic" class="form-label">Clinic Email</label>
      <input type="text" id="emailClinic" class="form-control" name="emailClinic">
      </div>

      <div class="col-sm-6">      
      <label for="nameClinic" class="form-label">Clinic Name</label>
      <input type="text" id="nameClinic" class="form-control" name="nameClinic">
</div>

        <div class="col-sm-6">
      <label for="passwordClinic" class="form-label">Password</label>
      <input type="password" id="passwordClinic" class="form-control" name="passwordClinic">
      <input type="checkbox" onclick="togglePassword()"> Show Password </td>
      </div>




        <div class="col-sm-6">
      <label for="confirmPassword" class="form-label">Confirm Password</label>
      <input type="password" id="confirmPassword" class="form-control" name="confirmPassword">
      <td> <input type="checkbox" onclick="togglePassword2()"> Show Password </td>
</div>



<div class="col-sm-6">
      <label for="phoneNum" class="form-label">Phone Number</label>
      <input type="text" id="phoneNum" class="form-control" name="phoneNum">
</div>

<div class="col-sm-6">
      <label for="address" class="form-label">Address</label>
      <input type="text" id="address" class="form-control" name="address">
</div>

<div class="col-12">
      <label for="area" class="form-label">Area:</label>
        <select id="area" class="form-select" name="area">
            <option value="">Select Area:</option>
            <option value="North">North</option>
            <option value="NorthEast">NorthEast</option>
            <option value="East">East</option>
            <option value="Central">Central</option>
            <option value="West">West</option>
</select> 
</div>

<div class="col-12">
      <label for="specialisation" class="form-label">Specialisation</label>
      <input type="text" id="specialisation" class="form-control" name="specialisation">
      </div>
      <br>


      <hr class="my-4">
      <button class="my-button" type="submit" value="Submit">Register</button>
    </form>

    <script>

function togglePassword() {
var x = document.getElementById("passwordClinic");
if (x.type === "passwordClinic") {
x.type = "text";
} else {
x.type = "passwordClinic";
}
}

function togglePassword2() {
var x = document.getElementById("confirmPassword");
if (x.type === "confirmPassword") {
x.type = "text";
} else {
x.type = "confirmPassword";
}
}


</script>
    
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