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
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
          <a class="nav-link" href="AdminDashboard.php">
              <span data-feather="home" class="align-text-bottom"></span>
              Admin Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="AdminVisitationHist.php">
              <span data-feather="pie-chart" class="align-text-bottom"></span>
              Visitation History
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="AdminAcctMgmt.php">
              <span data-feather="settings" class="align-text-bottom"></span>
              Account Management
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="AdminBillsnPayment.php">
              <span data-feather="dollar-sign" class="align-text-bottom"></span>
              Bills And Payments
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="AdminClinicInformation.php">
              <span data-feather="home" class="align-text-bottom"></span>
              Clinic Information
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="clock" class="align-text-bottom"></span>
              View Time Slots
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="AdminRegisterClinic.php">
              <span data-feather="plus" class="align-text-bottom"></span>
              Register Clinic
            </a>
          </li>
        </ul>   
      </div>
    </nav>

   


<form>

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
          <label for="companyName" class="form-label">Company Name</label>
          <input type="text" class="form-control" id="companyName" placeholder="" value="" required>
          <div class="invalid-feedback">
            Company name is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="owner" class="form-label">Owner</label>
          <input type="text" class="form-control" id="owner" placeholder="" value="" required>
          <div class="invalid-feedback">
            Owner is required.
          </div>
        </div>


        <div class="col-12">
          <label for="address" class="form-label">Mailing Address</label>
          <input type="text" class="form-control" id="address" placeholder="Street" required>
          <div class="invalid-feedback">
            Please enter Mailing Address.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="postalCode" class="form-label">Postal Code</label>
          <input type="text" class="form-control" id="postalCode" placeholder="" value="" required>
          <div class="invalid-feedback">
            Postal Code is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="phoneNumber" class="form-label">Phone Number</label>
          <input type="text" class="form-control" id="phoneNumber" placeholder="" value="" required>
          <div class="invalid-feedback">
            Phone Number is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="email" class="form-label">Email</label>
          <input type="text" class="form-control" id="email" placeholder="someone@example.com" value="" required>
          <div class="invalid-feedback">
            Email is required.
          </div>
        </div>

        <div class="col-sm-6">
          <label for="avgCost" class="form-label">Average Cost ($)</label>
          <input type="text" class="form-control" id="avgCost" placeholder="" value="" >

        </div>
      </div>
      <br>

      <div class="col-12">
          <label for="regDoctor" class="form-label">Register Doctor</label>
          <input type="text" class="form-control" id="regDoctor" placeholder="" required>
          <div class="invalid-feedback">
            Register Doctor.
          </div>
        </div>
      

      <hr class="my-4">

      <button class="w-100 btn btn-primary btn-lg" type="submit">Register</button>
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
  flex: 0 1 2000px;
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
    </style>