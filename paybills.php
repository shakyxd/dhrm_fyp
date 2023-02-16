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
    if(isset($_GET["id"])){
        $id=$_GET["id"];
        $_SESSION["aid"]=$id;
        $sql="UPDATE appointment SET paid = 1 WHERE appointmentID = $id";
        $data->query($sql);
    }
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
    <script type="text/javascript">
        function change(id){
            var cname=document.getElementById(id).className;
            var ab=document.getElementById(id+"_hidden").value;
            document.getElementById("rating").value=ab;

            for(var i=ab;i>=1;i--)
            {
                document.getElementById(cname+i).src="images/star2.png";
            }
            var id=parseInt(ab)+1;
            for(var j=id;j<=5;j++)
            {
                document.getElementById(cname+j).src="images/star1.png";
            }
        }
    </script>
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

      img
      {
        margin-top:10px;
        width:50px;
        height:50px;
        float:left;
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
            <a class="nav-link" href="#">
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
            <a class="nav-link active" href="PatientBills.php">
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
        <h3>How well did we do?</h3> 
        <div class="card mb-8">
         <div class="card-body">
          <div class="col-lg-12">
            <br>
            <form method="post" action="insert_rating.php">
              <div class="row">
                <div class="d-flex justify-content-center">
                <div>
                    <input type="hidden" id="star1_hidden" value="1">
                    <img src="images/star1.png" onmouseover="change(this.id);" id="star1" class="star">
                    <input type="hidden" id="star2_hidden" value="2">
                    <img src="images/star1.png" onmouseover="change(this.id);" id="star2" class="star">
                    <input type="hidden" id="star3_hidden" value="3">
                    <img src="images/star1.png" onmouseover="change(this.id);" id="star3" class="star">
                    <input type="hidden" id="star4_hidden" value="4">
                    <img src="images/star1.png" onmouseover="change(this.id);" id="star4" class="star">
                    <input type="hidden" id="star5_hidden" value="5">
                    <img src="images/star1.png" onmouseover="change(this.id);" id="star5" class="star">
                </div>
                <input type="hidden" name="rating" id="rating" value="0">
                </div>
              </div>
              <br>
              <div clas="row">
                <div class="d-flex justify-content-center">
                  <input type="submit" class="btn btn-primary" name="submit_rating">
                </div>
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