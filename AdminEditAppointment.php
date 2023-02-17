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

$errorMessage ="";
$successMessage="";

  if ($_SERVER['REQUEST_METHOD']== 'GET'){
    //GET method: show the data 
  
    if (!isset($_GET["id"])){
      header("location:AdminViewAppointment.php");
    }
  
    $appointmentID = $_GET["id"];
  
    //read the row of the selected clinic from db table
    $sql = "SELECT * FROM appointment WHERE appointmentID=$appointmentID";
    $result = $connection->query($sql);

    while($row=$result->fetch_assoc()){
        $treatmentID = $row["treatmentID"];
        $clinicID=$row["clinicID"];
        $treatmentName = $row["treatmentName"];
        $date = $row["date"];
        $time = $row["time"];
        $staffID= $row["staffID"];
        $timeSlotID=$row["timeSlotID"];
    }
    
  }
  else{
    //POST METHOD: Update the data 
    $treatmentID=$_POST["treatmentID"];
    $treatmentName=$_POST["treatmentName"];
    $staffID=$_POST["staffID"];
    $date=$_POST["date"];
    $time=$_POST["time"];

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
      $updatesql="UPDATE appointment 
            SET treatmentID=$treatmentID,
            treatmentName='$treatmentName',
            staffID=$staffID,
            firstNameStaff=(SELECT firstNameStaff FROM staff WHERE staffID=$staffID),
            lastNameStaff=(SELECT lastNameStaff FROM staff WHERE staffID=$staffID),
            timeSlotID=$timeSlotID,
            `date`='$date',`time`='$time' WHERE appointmentID=$appointmentID";
      $updateresult=$connection->query($updatesql);

      if(!$updateresult){
        $errorMessage = "Invalid query:  " . $connection->error;
        break;
      }

      $successMessage = "Appointment Information updated!";
      
      header("location:AdminViewAppointment.php");
      exit;
  
    } while (false);
    echo "<script>alert('stupid')</script>";
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Edit Appointment (Admin)</title>

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
       <input type="hidden" name ="treatmentID" value="<?php echo $treatmentID; ?>">
   <div class="col-md-7 col-lg-8">
    <h4 class="mb-3">Update Appointment</h4>
    <form method="post">
      <div class="row g-3">
        <div class="col-12">
            <label for="treatmentName" class="form-label">Treatment Name</label>
            <select name="treatmentName" class="form-select" id="inputGroupSelect04">
                <?php
                $sql3="SELECT * FROM treatment WHERE clinicID=$clinicID";
                $result3=mysqli_query($connection,$sql3);
                while($row3=$result3->fetch_assoc()){
                
                echo "<option value='".$row3['treatmentID']."' ".(($row3['treatmentID']==$treatmentID)?"selected":"").">".$row3['treatmentName']."</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-12">
            <label for="staff" class="form-label">Staff:</label>
            <select name="staff" class="form-select" id="inputGroupSelect04">
                <?php
                $staffsql="SELECT * FROM staff WHERE clinicID=$clinicID";
                $staffresult=mysqli_query($connection,$staffsql);
                while($staffrow=$staffresult->fetch_assoc()){
                    echo "<option value='".$staffrow['staffID']."' ".(($staffrow['staffID']==$staffID)?"selected":"").">".$staffrow['firstNameStaff']." ".$staffrow['lastNameStaff']."</option>";
                }
                ?>
            </select>
            
        </div>
        <div class="col-6">
            <label for="date" class="form-label">Date:</label><br>
            <input type="date" id="date" name="date" min="2022-01-01" max="2023-12-31" value="<?php echo $date;?>">
        </div>
        <div class="col-6">
            <label for="time" class="form-label">Time:</label><br>
            <select name="time" id="time">
              <option <?php if($time=="09:00") {echo "selected";}?> value="09:00">09:00 - 09:29</option>
              <option <?php if($time=="09:30") {echo "selected";}?> value="09:30">09:30 - 09:59</option>
              <option <?php if($time=="10:00") {echo "selected";}?> value="10:00">10:00 - 10:29</option>
              <option <?php if($time=="10:30") {echo "selected";}?> value="10:30">10:30 - 10:59</option>
              <option <?php if($time=="11:00") {echo "selected";}?> value="11:00">11:00 - 11:29</option>
              <option <?php if($time=="11:30") {echo "selected";}?> value="11:30">11:30 - 11:59</option>
              <option <?php if($time=="12:00") {echo "selected";}?> value="12:00">12:00 - 12:29</option>
              <option <?php if($time=="12:30") {echo "selected";}?> value="12:30">12:30 - 12:59</option>
              <option <?php if($time=="13:00") {echo "selected";}?> value="13:00">13:00 - 13:29</option>
              <option <?php if($time=="13:30") {echo "selected";}?> value="13:30">13:30 - 13:59</option>
              <option <?php if($time=="14:00") {echo "selected";}?> value="14:00">14:00 - 14:29</option>
              <option <?php if($time=="14:30") {echo "selected";}?> value="14:30">14:30 - 14:59</option>
              <option <?php if($time=="15:00") {echo "selected";}?> value="15:00">15:00 - 15:29</option>
              <option <?php if($time=="15:30") {echo "selected";}?> value="15:30">15:30 - 15:59</option>
              <option <?php if($time=="16:00") {echo "selected";}?> value="16:00">16:00 - 16:29</option>
              <option <?php if($time=="16:30") {echo "selected";}?> value="16:30">16:30 - 16:59</option>
              <option <?php if($time=="17:00") {echo "selected";}?> value="17:00">17:00 - 17:29</option>
              <option <?php if($time=="17:30") {echo "selected";}?> value="17:30">17:30 - 18:00</option>
            </select>
        </div>
        </div>
      </div>
      <br>


 

      <button class="btn btn-sm btn-outline-secondary" type="submit">Update</button>
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