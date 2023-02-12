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
            <a class="nav-link active" href="#">
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
        <h3>Treatment Plans</h3> 
        <div class="card mb-8">
         <div class="card-body">
          <div class="col-lg-12">
                <div class="row">
                  <div class="col-sm-3">
                    <h6>General Checkup</h6>
                  </div>
                  <div class="col-sm-7">
                      <p>Regular checkup with a dentist to keep teeth healthy and strong.</p>
                      <ul>
                        <li>Assess if gums are in good condition.</li>
                        <li>Checking of cavities, margins of previous fillings and restorations.</li>
                        <li>X-ray if needed.</li>
                        <li>Cleaning and removing of plaque and stain build up.</li>
                      </ul>
                  </div>
                  <div class="col-sm-2 d-flex justify-content-center align-items-center">
                    <a type="button" class="btn btn-primary" href="PatientScheduleAppt.php?trtmnt=General+Checkup&area=Any&sort=none">Book a regular dental care now!</a>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6>Wisdom Tooth Removal</h6>
                  </div>
                  <div class="col-sm-7">
                      <p>Wisdom teeth removal might be due to different reasons.</p>
                      <ul>
                        <li>It is impacting the teeth beside.</li>
                        <li>Tooth decay due to plague build up.</li>
                        <li>Bacterial infection in the cheek, tongue or throat.</li>
                        <li>Abscess.</li>
                      </ul>
                  </div>
                  <div class="col-sm-2 d-flex justify-content-center align-items-center">
                    <a type="button" class="btn btn-primary" href="PatientScheduleAppt.php?trtmnt=Wisdom+Tooth&area=Any&sort=none">Book a wisdom tooth removal session now!</a>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6>Tooth Extractions</h6>
                  </div>
                  <div class="col-sm-7">
                    <p>Extractions are done when the tooth's damage is too serious to be repaired or restored with a filling/crown.</p>
                  </div>
                  <div class="col-sm-2 d-flex justify-content-center align-items-center">
                    <a type="button" class="btn btn-primary" href="PatientScheduleAppt.php?trtmnt=Tooth+Extraction&area=Any&sort=none">Book a Teeth Extraction treatment now!</a>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6>Root Canal</h6>
                  </div>
                  <div class="col-sm-7">
                    <p>Root canals are needed for a cracked tooth from injury or genetics, a deep cavity, or issues from a previous filling. Patients generally need a root canal when they notice their teeth are sensitive, particularly to hot and cold sensations.</p>
                  </div>
                  <div class="col-sm-2 d-flex justify-content-center align-items-center">
                    <a type="button" class="btn btn-primary" href="PatientScheduleAppt.php?trtmnt=Root+Canal&area=Any&sort=none">Book a Root Canal session now!</a>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6>Orthodontic treatment</h6>
                  </div>
                  <div class="col-sm-7">
                    <p>Straightening/moving teeth to improve the appearance of the teeth.</p>
                  </div>
                  <div class="col-sm-2 d-flex justify-content-center align-items-center">
                    <a type="button" class="btn btn-primary" href="PatientScheduleAppt.php?trtmnt=Orthodontics%28Braces%29&area=Any&sort=none">Book an Orthodontic treatment now!</a>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6>Dental Crowns and Bridges</h6>
                  </div>
                  <div class="col-sm-7">
                    <p>A crown or cap is a dental restoration that covers the exposed surface of a tooth to strengthen it or improve its appearance. A bridge is a dental restoration to replace one or more missing teeth. It includes an artificial tooth or teeth which are fused to crowns on either side to provide support.</p>
                      <ul>
                        <li>Partial/Full dentures.</li>
                        <li>Several visits to dental center.</li>
                      </ul>
                  </div>
                  <div class="col-sm-2 d-flex justify-content-center align-items-center">
                    <a type="button" class="btn btn-primary" href="PatientScheduleAppt.php?trtmnt=Crown+and+Bridges&area=Any&sort=none#">Book a Denture Crown treatment now!</a>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6>Tooth Filling</h6>
                  </div>
                  <div class="col-sm-7">
                    <p>A dental filling is a type of restorative dentistry treatment used to repair minimal tooth fractures, tooth decay or otherwise damaged surfaces of the teeth</p>
                  </div>
                  <div class="col-sm-2 d-flex justify-content-center align-items-center">
                    <a type="button" class="btn btn-primary" href="PatientScheduleAppt.php?trtmnt=Tooth+Filling&area=Any&sort=none">Book a Tooth Filling treatment now!</a>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6>Dental Implants</h6>
                  </div>
                  <div class="col-sm-7">
                    <p>Structure that replaces missing tooth.</p>
                      <ul>
                        <li>Assess overall health to see if suitable for the treatment.</li>
                        <li>3-6 months to heal once it's installed in the bone.</li>
                      </ul>
                  </div>
                  <div class="col-sm-2 d-flex justify-content-center align-items-center">
                    <a type="button" class="btn btn-primary" href="PatientScheduleAppt.php?trtmnt=Tooth+Implant&area=Any&sort=none">Book a Dental Implant Consultation session now!</a>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6>Tooth Whitening</h6>
                  </div>
                  <div class="col-sm-7">
                    <p>Teeth whitening procedures can remove stains or tooth discolourations.</p>
                  </div>
                  <div class="col-sm-2 d-flex justify-content-center align-items-center">
                    <a type="button" class="btn btn-primary" href="PatientScheduleAppt.php?trtmnt=Teeth+Whitening&area=Any&sort=none">Book a Tooth Whitening reatment now!</a>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6>Teeth Cleaning</h6>
                  </div>
                  <div class="col-sm-7">
                    <p>Teeth cleaning is part of oral hygiene and involves the removal of dental plaque from teeth with the intention of preventing cavities, gingivitis, and periodontal disease.</p>
                  </div>
                  <div class="col-sm-2 d-flex justify-content-center align-items-center">
                    <a type="button" class="btn btn-primary" href="PatientScheduleAppt.php?trtmnt=Teeth+Cleaning&area=Any&sort=none">Book a Tooth Cleaning Session now!</a>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6>X-ray</h6>
                  </div>
                  <div class="col-sm-7">
                    <p>Dental X-rays (radiographs) are images of your teeth that your dentist uses to evaluate your oral health.</p>
                  </div>
                  <div class="col-sm-2 d-flex justify-content-center align-items-center">
                    <a type="button" class="btn btn-primary" href="PatientScheduleAppt.php?trtmnt=X-ray&area=Any&sort=none">Book an X-ray Session now!</a>
                  </div>
                </div>               
              </div>
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