<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Patient dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">

    <?php
    session_start();
    $conn = new mysqli('localhost', 'root', '', 'fyp');

    if(! $conn ) {
        die('Could not connect: ' . mysqli_error($conn));
      }
  
    $loginID = $_SESSION["userID"];
  
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $familyemail = $_POST["familyemail"];
      $sql="SELECT * FROM patient WHERE emailPatient='".$familyemail."'";
      $result = $conn->query($sql);
      while($row=mysqli_fetch_assoc($result)){
        $friendID=$row["patientID"];
        $friendemail=$row["emailPatient"];
      }
      $emailsql="SELECT * FROM patient WHERE patientID=$loginID";
      $emailresult = $conn->query($emailsql);
      while($emailrow=mysqli_fetch_assoc($emailresult)){
        $email=$emailrow["emailPatient"];
      }
      do{
          $sql2="INSERT INTO friend (oneFriendID, oneFriendemail, twoFriendID, twoFriendemail, `status`)
                  VALUES ($loginID, '".$email."', $friendID, '".$friendemail."', 'Pending')";
          mysqli_query($conn,$sql2);
          echo "<script>alert('Request submitted successfully!')</script>";
  
      }while(false);
    
    }
    
    ?>
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
            <a class="nav-link" href="PatientScheduleAppt.php">
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
            <a class="nav-link active" href="#">
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
        <h3>Add A Family Member</h3> 
        <div class="card mb-8">
         <div class="card-body">
          <div class="col-lg-12">
              <form method="post">
                <div class="row">
                  <div class="col-sm-7">
                    <label for="email">Enter your family member email:</label>
                    <input type="email" id="email" name="familyemail" ><br><br> 
                  </div>
                </div>                        
                <div class="row">
                  <div class="col-sm-12 d-flex justify-content-end align-items-center">
                    <button type="submit" class="btn btn-primary">Confirm</button>
                  </div>
                </div>
              </form>
              <hr>
              <div class="container">
                  <?php
                  $sql3="SELECT * FROM friend 
                        WHERE `status`='Pending'
                        AND twoFriendID=$loginID";
                  $result3=mysqli_query($conn,$sql3);
                  while($row3=$result3->fetch_assoc()){
                    echo"<div class='row'>";
                    echo "<div class='col'><label class='lead'>Pending friend request from $row3[oneFriendemail]<label></div>";
                    echo "<div class='col'><a type=button class='btn btn-success' href='PatientAcceptFam.php?friendID=$row3[friendID]'>Accept Request</a></div>";
                    echo "</div>";
                  }
                  ?>
              </div>
          </div>
        </div>
      </div>
      <br>
      <h3>Family Members's History</h3>
      <div class="card mb-8">
        <div class="card-body">
          <div class="col-lg-12">
            <div class="row">
               <?php
               $sql4="SELECT * FROM `appointment` 
                      JOIN `friend` 
                      ON IF(friend.oneFriendID=$loginID,friend.twoFriendID=appointment.patientID,friend.oneFriendID=appointment.patientID)
                      JOIN `clinic`
                      ON (appointment.clinicID = clinic.clinicID)
                      WHERE friend.status='Friend'
                      AND (friend.twoFriendID=$loginID OR friend.oneFriendID=$loginID)"
                    ;
               $result4=mysqli_query($conn,$sql4);
               echo "<table class='table'>
                <thead>
                  <tr>
                    <th scope='col'>Appointment ID</th>
                    <th scope='col'>Clinic Name</th>
                    <th scope='col'>Date</th>
                    <th scope='col'>Time</th>
                    <th scope='col'>treatmentName</th>
                    <th scope='col'>Staff Name</th>
                    <th scope='col'>Patient Name</th>
                  </tr>
                </thead>
                <tbody>";
               while($row4=$result4->fetch_assoc()){ 
                echo "<tr>
                <td>$row4[appointmentID]</td>
                <td>$row4[nameClinic]</td>
                <td>$row4[date]</td>
                <td>$row4[time]</td>
                <td>$row4[treatmentName]</td>
                <td>$row4[firstName]&nbsp".
                "$row4[lastName]</td>".
                "<td>$row4[firstNameStaff]&nbsp".
                "$row4[lastNameStaff]</td></tr>";
              }
               ?>   
            </div>
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