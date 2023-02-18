<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Dentist dashboard</title>

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
<?php

$loginID = $_SESSION["userID"];

// Create database connection

$conn = new mysqli('localhost', 'root', '', 'fyp');

if(! $conn ) {
    die('Could not connect: ' . mysqli_error($conn));
}

$sql = "SELECT * FROM clinic WHERE clinicID = $loginID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $column1 = $row["clinicID"];
        $column2 = $row["emailClinic"];
        $column3 = $row["passwordClinic"];
        $column4 = $row["nameClinic"];
        $column5 = $row["phoneNum"];
        $column6 = $row["address"];
        $column7 = $row["area"];
        $column8 = $row["specialisation"];
        $column9 = $row["rating"];
    }
} else {
    echo "0 results";
}

?>
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
            <a class="nav-link" aria-current="page" href="ClinicDashboard.php">
              <span data-feather="home" class="align-text-bottom"></span>
              Clinic Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addStaff.php">
              <span data-feather="pie-chart" class="align-text-bottom"></span>
              View Dentists/Add Staff
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ClinicEditAccount.php">
              <span data-feather="settings" class="align-text-bottom"></span>
              Clinic Management
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ClinicAddTreatment.php">
              <span data-feather="thermometer" class="align-text-bottom"></span>
              Add Treatment
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="generateTimeSlots.php">
              <span data-feather="thermometer" class="align-text-bottom"></span>
              Generate Timeslots
            </a>
          </li>
        </ul>   
      </div>
    </nav>

    <section style="background-color: #eee;">
       
       <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Lorem Ipsum</h1>     
        <div class="container py-5">
        <h3>Generate Time slots</h3> 
        <div class="row">
          <div class="card mb-8">
            <div class="card-body">
             <div class="col-lg-12">
                 <form method="post" action="includes\generateTimeSlot.inc.php">
                    <!-- <form method="post" action="test.php"> -->

                    <div class ="container" align="center">

                    <table>

                        <tr>
                            <td align="right"> Enter Date: </td>
                            <td align="left"><input type="date" name="date"></td>

                        </tr>

                        <tr>
                             <td align="center" colspan=2> <input type="submit" value="Generate" class="submitBtn" name=generate></td>
                        </tr>



                    </div>



                    <div class ="container" align="center">

                    <!-- Display Staff Table -->




                    <table class="table">
                    <thead>
                    <tr>

                    <th> Staff ID </th>
                    <th> Staff Type </th>
                    <th> First Name </th>
                    <th> Last Name </th>
                    <th> Gender </th>
                    </tr>


                    <?php

                    $userID = $_SESSION["userID"];

                    $conn = new mysqli('localhost', 'root', '', 'fyp');
                    if(!$conn) {
                        die("Connection Error");
                    }

                    $query = "select * from staff WHERE clinicID = $userID AND staffType = 'Dentist' ORDER BY staffID ASC";




                    if ($result = $conn->query($query)) {
                        while ($row = $result->fetch_assoc()) {

                            $column1 = $row["staffID"];
                            $column2 = $row["staffType"];
                            $column3 = $row["firstNameStaff"];
                            $column4 = $row["lastNameStaff"];
                            $column5 = $row["genderStaff"];


                            echo '<tr>
                                    <td>'.$column1.'</td>
                                    <td>'.$column2.'</td>
                                    <td>'.$column3.'</td>
                                    <td>'.$column4.'</td>
                                    <td>'.$column5.'</td>
                                    </tr>';
        
                        }       

                    }
                    $result-> free();

                    ?>

                    </table>

                    <!-- Display Select Table -->

                    </div>

                    <br>
                    <br>

                    <div class ="container" align="center">
                
                        <table class="table">
                        <thead>
                        <tr>
                        <th> Dentist One </th>
                        <th> Dentist Two </th>
                        <th> Dentist Three </th>
                        <th> Dentist Four </th>
                        <th> Dentist Five </th>
                        </tr>

                        <tr>


                    <?php

                    $userID = $_SESSION["userID"];

                    $conn = new mysqli('localhost', 'root', '', 'fyp');
                    if(!$conn) {
                        die("Connection Error");
                    }

                    $query = "select * from staff WHERE clinicID = $userID AND staffType = 'Dentist' ORDER BY staffID ASC";



                    if ($result = $conn->query($query)) {

                        echo '<td><select name="dentistOne">
                        <option value="0">None</option>';

                        while ($row = $result->fetch_assoc()) {

                            $column1 = $row["staffID"];
                            $column2 = $row["staffType"];
                            $column3 = $row["firstNameStaff"];
                            $column4 = $row["lastNameStaff"];
                            $column5 = $row["genderStaff"];
        
                            echo '<option value ="'.$row["staffID"].'">' .$column3. ' '.$column4.
                            '</option>';
        
                        }       

                    }echo '</select></td>';
                    $result-> free();



                    if ($result = $conn->query($query)) {

                        echo '<td><select name="dentistTwo">
                            <option value="0">None</option>';
    
                        while ($row = $result->fetch_assoc()) {
        
                            $column1 = $row["staffID"];
                            $column2 = $row["staffType"];
                            $column3 = $row["firstNameStaff"];
                            $column4 = $row["lastNameStaff"];
                            $column5 = $row["genderStaff"];
        
                            echo '<option value ="'.$row["staffID"].'">' .$column3. ' '.$column4.
                            '</option>';
        
                        }       
    
                    }echo '</select></td>';
                    $result-> free();


                    if ($result = $conn->query($query)) {

    
                        echo '<td><select name="dentistThree">
                            <option value="0">None</option>';
    
                        while ($row = $result->fetch_assoc()) {
        
                            $column1 = $row["staffID"];
                            $column2 = $row["staffType"];
                            $column3 = $row["firstNameStaff"];
                            $column4 = $row["lastNameStaff"];
                            $column5 = $row["genderStaff"];
        
                            echo '<option value ="'.$row["staffID"].'">' .$column3. ' '.$column4.
                            '</option>';
        
                        }       
    
                    }echo '</select></td>';
                    $result-> free();


                    if ($result = $conn->query($query)) {

    
                        echo '<td><select name="dentistFour">
                                <option value="0">None</option>';
    
                        while ($row = $result->fetch_assoc()) {
        
                            $column1 = $row["staffID"];
                            $column2 = $row["staffType"];
                            $column3 = $row["firstNameStaff"];
                            $column4 = $row["lastNameStaff"];
                            $column5 = $row["genderStaff"];
        
                            echo '<option value ="'.$row["staffID"].'">' .$column3. ' '.$column4.
                            '</option>';
        
                        }       
    
                    }echo '</select></td>';
                    $result-> free();


                    if ($result = $conn->query($query)) {

    
                        echo '<td><select name="dentistFive">
                                    <option value="0">None</option>';
    
                        while ($row = $result->fetch_assoc()) {
        
                            $column1 = $row["staffID"];
                            $column2 = $row["staffType"];
                            $column3 = $row["firstNameStaff"];
                            $column4 = $row["lastNameStaff"];
                            $column5 = $row["genderStaff"];
        
                            echo '<option value ="'.$row["staffID"].'">' .$column3. ' '.$column4.
                            '</option>';
        
                        }       
    
                    }echo '</select></td>';
                    $result-> free();



                    ?>

                    </tr>

                    </table>

                    </div>


                    </form>
                 <br>
                <br>
                <br>


                <!-- Display Time Slots Table -->

                <div class ="container" align="center">


                <table class="table">
                <thead>
                <tr>

                <th> TimeSlot ID </th>
                <th> Clinic ID </th>
                <th> Date </th>
                <th> Time </th>
                <th> Dentist One </th>
                <th> Dentist Two </th>
                <th> Dentist Three </th>
                <th> Dentist Four </th>
                <th> Dentist Five </th>
                <th> Delete </th>

                </tr>

                <?php

                $userID = $_SESSION["userID"];

                $conn = new mysqli('localhost', 'root', '', 'fyp');
                if(!$conn) {
                    die("Connection Error");
                }
                $query2 = "select * from timeslot WHERE clinicID = $userID ORDER BY date, time ASC";



                if ($result = $conn->query($query2)) {
                    while ($row = $result->fetch_assoc()) {

                        $column1 = $row["timeSlotID"];
                        $column2 = $row["clinicID"];
                        $column3 = $row["date"];
                        $column4 = $row["time"];
                        $column5 = $row["dentistOneID"];
                        $column6 = $row["dentistTwoID"];
                        $column7 = $row["dentistThreeID"];
                        $column8 = $row["dentistFourID"];
                        $column9 = $row["dentistFiveID"];
                        $column10 = "Delete";

                        echo '<tr>
                                <td>'.$column1.'</td>
                                <td>'.$column2.'</td>
                                <td>'.$column3.'</td>
                                <td>'.$column4.'</td>
                                <td>'.$column5.'</td>
                                <td>'.$column6.'</td>
                                <td>'.$column7.'</td>
                                <td>'.$column8.'</td>
                                <td>'.$column9.'</td>';
                        echo "<td><a class=my-button href=dropTimeSlot.php?id=$row[timeSlotID]>Delete</a></td>";
                        '</tr>';

                    }
                    $result-> free();
                }


                ?>

                </table>
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