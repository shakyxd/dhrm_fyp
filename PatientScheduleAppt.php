<?php
session_start();
$host="localhost";
$user="root";
$password="";
$db="fyp";

$data=mysqli_connect($host,$user,$password,$db);
if($data===false){
    die("connection error");
}
$sql="SELECT * FROM treatment INNER JOIN clinic ON treatment.clinicID=clinic.clinicID";

if(isset($_GET["trtmnt"])){
    //only treatment chosen
    if($_GET["clinic"]=="Any"&&$_GET["trtmnt"]!="Any"&&$_GET["region"]=="Any"){
        $trtmnt=$_GET["trtmnt"];
        $sql .=" WHERE treatment.treatmentType='$trtmnt'";
    }
    //only region chosen
    else if($_GET["clinic"]=="Any"&&$_GET["trtmnt"]=="Any"&&$_GET["region"]!="Any"){
        $region=$_GET["region"];
        $sql .=" WHERE clinic.area='$region'";
    }
    //clinic and treatment chosen
    else if($_GET["clinic"]!="Any"&&$_GET["trtmnt"]!="Any"&&$_GET["region"]=="Any"){
        $clinicID=$_GET["clinic"];
        $trtmnt=$_GET["trtmnt"];
        $sql .=" WHERE clinic.clinicID=$clinicID AND treatment.treatmentType='$trtmnt'";
    }
    //treatment and region chosen
    else if($_GET["clinic"]=="Any"&&$_GET["trtmnt"]!="Any"&&$_GET["region"]!="Any"){
        $trtmnt=$_GET["trtmnt"];
        $region=$_GET["region"];
        $sql .=" WHERE treatment.treatmentType='$trtmnt' AND clinic.area='$region'";
    }
    //clinic and region chosen
    else if($_GET["clinic"]!="Any"&&$_GET["trtmnt"]=="Any"&&$_GET["region"]!="Any"){
        $clinicID=$_GET["clinic"];
        $region=$_GET["region"];
        $sql .=" WHERE clinic.clinicID=$clinicID AND clinic.area='$region'";
    }
    //clinic treatment and region chosen
    else if($_GET["clinic"]!="Any"&&$_GET["trtmnt"]!="Any"&&$_GET["region"]!="Any"){
        $clinicID=$_GET["clinic"];
        $trtmnt=$_GET["trtmnt"];
        $region=$_GET["region"];
        $sql .=" WHERE clinic.clinicID=$clinicID AND treatment.treatmentType='$trtmnt' AND clinic.area='$region'";
    }
}
if((isset($_GET["sort"]))AND($_GET["sort"]!="none")){
    //sort is set
    $sort=$_GET["sort"];
    $sort=str_replace("+", " ", $sort);
    $sql .=" ORDER BY $sort";
}
$result=mysqli_query($data,$sql);
?> 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Patient dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">

    

    

<link href="dist/css/bootstrap.min.css" rel="stylesheet">

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
    </style>

    
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
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="PatientDashboard.php">
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
            <a class="nav-link active" href="#">
              <span data-feather="book-open" class="align-text-bottom"></span>
              Schedule Appointment
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
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
       
       <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Lorem Ipsum</h1>     
        <div class="container py-5">
        <h3>Schedule an appointment</h3> 
        <div class="card mb-8">
         <div class="card-body">
          <div class="col-lg-12">
              <form action="PatientScheduleAppt.php" method="get">
                <div class="row">
                  <div class="col-sm-10">
                      <select name="trtmnt" class="form-select" id="inputGroupSelect02">
                          <option selected value="Any">Choose A Treatment Type</option>
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
                </div>            
                <hr>
                <div class="col-sm-10">
                    <select name="region" class="form-select" id="inputGroupSelect04">
                        <option selected value="Any">Filter By</option>
                        <option value="North">North</option>
                        <option value="NorthEast">North-East</option>
                        <option value="East">East</option>
                        <option value="Central">Central</option>
                        <option value="West">West</option>
                    </select>
                </div>
                </div>            
                <hr>
                <div class="col-sm-10">
                    <select name="sort" class="form-select" id="inputGroupSelect03">
                        <option selected value="none">Sort By</option>
                        <option value="rating">Rating (Ascending)</option>
                        <option value="rating DESC">Rating (Descending)</option>
                        <option value="price">Price (Ascending)</option>
                        <option value="price DESC">Price (Descending)</option>
                    </select>
                </div>
                </div>            
                <hr>
                <div class="row">
                  <div class="col-sm-12 d-flex justify-content-end align-items-center">
                    <button class="btn btn-outline-secondary" type="submit" Value="Submit">Search</button>
                    <a class="btn btn-outline-secondary" href="PatientScheduleAppt.php">Reset</a>
                  </div>
                </div>
                <hr>
                <div>
                  <table class='table table-bordered'>
                    <thead>
                      <tr>
                        <th>Package Name</th>
                        <th>Clinic</th>
                        <th>Address</th>
                        <th>email</th>
                        <th>Phone</th>
                        <th>Rating</th>
                        <th>Price (S$)</th>
                      </tr>
                    </thead>
                    <?php
                    while($row=$result->fetch_assoc()){
                        echo "<tr>
                          <td>$row[treatmentName]</td>
                          <td>$row[nameClinic]</td>
                          <td>$row[address]</td>
                          <td>$row[emailClinic]</td>
                          <td>$row[phoneNum]</td>
                          <td>$row[rating]</td>
                          <td>$row[price]</td>
                          <td><button>Book Now</button></td>
                      </tr>";
                    }
                    ?>
                  </table>
                  </div>
              </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

     <script src="dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dist/js/dashboard.js"></script>
  </body>
</html>