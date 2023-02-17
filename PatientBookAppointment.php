<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "fyp";

//create connection 
$connection = new mysqli($servername, $username, $password, $database);

$loginID=$_SESSION["userID"];

if(isset($_SESSION["treatmentID"])){
  $treatmentName=$_SESSION["treatmentName"];
  $clinicID=$_SESSION["clinicID"];
  $price=$_SESSION["price"];
  $treatmentID=$_SESSION["treatmentID"];
}else{
  $clinicID=$_GET["clinicID"];
  $treatmentID=$_GET["tID"];
  $treatmentName=$_GET["tName"];
  $price=$_GET["price"];
}


if ($_SERVER['REQUEST_METHOD']== 'POST'){
  $staffID=$_POST["staffID"];
  $date=$_POST["date"];
  $time=$_POST["time"];
  $staffsql="SELECT firstNameStaff, lastNameStaff FROM staff WHERE staffID=$staffID";
  $staffresult =$connection->query($staffsql);
  while($staffrow=$staffresult->fetch_assoc()){
    $fnamestaff=$staffrow["firstNameStaff"];
    $lnamestaff=$staffrow["lastNameStaff"];
  }
  $patientsql="SELECT firstName, lastName FROM patient WHERE patientID=$loginID";
  $patientresult =$connection->query($patientsql);
  while($patientrow=$patientresult->fetch_assoc()){
    $fname=$patientrow["firstName"];
    $lname=$patientrow["lastName"];
  }
  $timeslotsql="SELECT * FROM timeslot WHERE clinicID=$clinicID AND `date`='".$date."' AND `time`='".$time."'";
  $timeslotresult =$connection->query($timeslotsql);
  while($trow=$timeslotresult->fetch_assoc()){
    $timeSlotID=$trow["timeSlotID"];
    $dentistOneID=$trow["dentistOneID"];
    $dentistTwoID=$trow["dentistTwoID"];
    $dentistThreeID=$trow["dentistThreeID"];
    $dentistFourID=$trow["dentistFourID"];
    $dentistFiveID=$trow["dentistFiveID"];
  }
  do {
    if (empty($date) || empty($time)) {
      echo "<script>alert('Please select your preferred date and time')</script>";
      break;
    }
    if(($dentistOneID==$staffID) || ($dentistTwoID==$staffID) || ($dentistThreeID==$staffID) || ($dentistFourID==$staffID) || ($dentistFiveID==$staffID)){
      $dremovesql="UPDATE timeslot 
      SET dentistOneID=(CASE WHEN dentistOneID=$staffID THEN 0 ELSE dentistOneID END),
      dentistTwoID=(CASE WHEN dentistTwoID=$staffID THEN 0 ELSE dentistTwoID END),
      dentistThreeID=(CASE WHEN dentistThreeID=$staffID THEN 0 ELSE dentistThreeID END),
      dentistFourID=(CASE WHEN dentistFourID=$staffID THEN 0 ELSE dentistFourID END),
      dentistFiveID=(CASE WHEN dentistFiveID=$staffID THEN 0 ELSE dentistFiveID END)
      WHERE timeSlotID=$timeSlotID";
      mysqli_query($connection,$dremovesql);
    }
    else{
      echo "<script>alert('Your chosen dentist is not available at this timeslot. Please choose another timeslot')</script>";
      break;
    }


    $sql = "INSERT INTO appointment (timeSlotID, patientID, clinicID, staffID, treatmentID, firstName, lastName, firstNameStaff, lastNameStaff, `date`, `time`, treatmentName, price, paid)
            VALUES ($timeSlotID, $loginID, $clinicID, $staffID, $treatmentID, '".$fname."', '".$lname."', '".$fnamestaff."', '".$lnamestaff."', '".$date."','".$time."','".$treatmentName."',$price, 0)"; 
    $result =$connection->query($sql);

    if(!$result){
      $errorMessage = "Invalid query:  " . $connection->error;
      break;
    }

    header("location:PatientVisitationHistory.php");
    echo "<script>alert('Booking Successful!');</script>";
    unset($_SESSION["treatmentID"]);
    
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
    <title>Book Appointment</title>

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
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">
              <span data-feather="home" class="align-text-bottom"></span>
              Patient Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="PatientVisitationHistory.php">
              <span data-feather="pie-chart" class="align-text-bottom"></span>
              Visitation History
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="PatientEditAccount.php">
              <span data-feather="settings" class="align-text-bottom"></span>
              Account Management
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="PatientTreatmentPlans.php">
              <span data-feather="thermometer" class="align-text-bottom"></span>
              Treatments
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="PatientScheduleAppt.php">
              <span data-feather="book-open" class="align-text-bottom"></span>
              Schedule Appointment
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="PatientBills.php">
              <span data-feather="dollar-sign" class="align-text-bottom"></span>
              Bills And Payments
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="PatientAddFam.php">
              <span data-feather="home" class="align-text-bottom"></span>
              Add Family Members
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="clock" class="align-text-bottom"></span>
              View Time Slots
            </a>
          </li>
        </ul>   
      </div>
    </nav>
    <section style="background-color: #eee;">

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
    <h4 class="mb-3">Book an appointment</h4>
    <form  method="post">
      <div class="row g-3">
        <div class="col-12">
            <?php
            $sql2="SELECT * FROM clinic WHERE clinicID=$clinicID";
            $result2=mysqli_query($connection,$sql2);
            foreach ($result2 as $clinic){
                $clinicName=$clinic["nameClinic"];
            }
            ?>
            <label for="clinicName" class="form-label">Clinic:</label>
            <input type="text" readonly name="clinicName" class="form-control" id="clinicName" value="<?php echo $clinicName;?>">
        </div>
        <div class="col-12">
            <label for="treatmentName" class="form-label">Treatment:</label>
            <input type="text" readonly name="treatmentName" class="form-control" id="treatmentName" value="<?php echo $treatmentName;?>">
        </div>
        <div class="col-6">
            <label for="date" class="form-label">Date:</label><br>
            <input type="date" id="date" name="date" min="2022-01-01" max="2023-12-31">
        </div>
        <div class="col-6">
            <label for="time" class="form-label">Time:</label><br>
            <select name="time" id="time">
              <option value="09:00">09:00 - 09:29</option>
              <option value="09:30">09:30 - 09:59</option>
              <option value="10:00">10:00 - 10:29</option>
              <option value="10:30">10:30 - 10:59</option>
              <option value="11:00">11:00 - 11:29</option>
              <option value="11:30">11:30 - 11:59</option>
              <option value="12:00">12:00 - 12:29</option>
              <option value="12:30">12:30 - 12:59</option>
              <option value="13:00">13:00 - 13:29</option>
              <option value="13:30">13:30 - 13:59</option>
              <option value="14:00">14:00 - 14:29</option>
              <option value="14:30">14:30 - 14:59</option>
              <option value="15:00">15:00 - 15:29</option>
              <option value="15:30">15:30 - 15:59</option>
              <option value="16:00">16:00 - 16:29</option>
              <option value="16:30">16:30 - 16:59</option>
              <option value="17:00">17:00 - 17:29</option>
              <option value="17:30">17:30 - 18:00</option>
            </select>
        </div>
        <div class="col-6">
          <label for="price" class="form-label">Price</label>
          <input type="number" readonly required name="price" class="form-control" id="price" value="<?php echo $price;?>">
        </div>
        <div class="col-6">
          <label for="staffID" class="form-label">Dentist:</label>
          <select name="staffID" class="form-select" id="inputGroupSelect01">
            <?php
            $sql3="SELECT * FROM staff WHERE clinicID=$clinicID AND staffType='Dentist'";
            $result3=mysqli_query($connection,$sql3);
            while($row3=$result3->fetch_assoc()){
              echo "<option value=".$row3['staffID'].">".$row3['firstNameStaff']." ".$row3['lastNameStaff']."</option>";
            }
            ?>
          </select>
        </div>
        </div>
      </div>
      <br>


 

      <button class="btn btn-sm btn-outline-secondary" type="submit">Book Appointment</button>
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