<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FYP - ToothScanner</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/">
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <link href="../carousel/carousel.rtl.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel-rtl/">

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
</head>
<body>



    <div>
        <h1 class="visually-hidden">About Us</h1>

        <div class="container">
            <div class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">

                    <span class="fs-4">ToothScanner</span>
                </a>

                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="homepage.php" class="nav-link active" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="aboutus.php" class="nav-link">About Us</a></li>
                    <li class="nav-item"><a href="contactus.php" class="nav-link">Contact Us</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Register</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Clinic Register</a></li>
                            <li><a class="dropdown-item" href="#">Patient Register</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link">Login</a></li>
                </ul>
            </div>
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="images/dentist1.jpg" class="d-block w-100" alt="...">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="false" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
                    <div class="container">
                      <div class="carousel-caption text-start">
                        <h1>Finding Affordable Dental Care Plans For All</h1>
                        <p>Click The Button Below To Start Finding The Suitable Plan For You!</p>
                        <p><a class="btn btn-lg btn-primary" href="#searchnow">Find Out More</a></p>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="images/dentist2.jpg" class="d-block w-100" alt="...">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
                    <div class="container">
                      <div class="carousel-caption">
                        <h1>About Us</h1>
                        <p>Proving Affordable Services Since 2020</p>
                        <p><a class="btn btn-lg btn-primary" href="aboutus.php">About Us</a></p>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="images/dentist3.jpg" class="d-block w-100" alt="...">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
                    <div class="container">
                      <div class="carousel-caption text-end">
                        <h1>To Find Out About More Or Want To Partner With Our Service</h1>
                        <p>You Can Contact Us Through The Button Below</p>
                        <p><a class="btn btn-lg btn-primary" href="#">Contact Us</a></p>
                      </div>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>


              <!-- Marketing messaging and featurettes
              ================================================== -->
              <!-- Wrap the rest of the page in another container to center all the content. -->

            <div class="container marketing">

                <!-- Three columns of text below the carousel -->
                <div class="row">
                    <div class="col-lg-4">
                        <img src="images/clinic1.jpg" alt="Avatar" style="width:200px">
                        <h2 class="fw-normal">Clinic A</h2>
                        <p>"After partnering with toothscanner, we have seen an increase in customers visiting our clinic"</p>
                        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <img src="images/clinic2.jpg" alt="Avatar" style="width:173px">
                        <h2 class="fw-normal">Clinic B</h2>
                        <p>"Toothscanner is a handy app for us to make our treatment plans known to the public"</p>
                        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <img src="images/clinic3.jpg" alt="Avatar" style="width:180px">
                        <h2 class="fw-normal">Clinic C</h2>
                        <p>"With toothscanner, patients can now come in to our clinic and start their treatment immediately without having to schedule appointments here"</p>
                        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
                <!-- START THE FEATURETTES -->

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-11" id="searchnow">
                        <h2 class="featurette-heading fw-normal lh-1">Start Finding The Best Plans Across Our Clinics Now!</h2>
                        <p class="lead">Fill Out The Form Below So That We Can Find The Best Price For Your Treatment</p>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect02">Choose a treatment type</label>
                    <select class="form-select" id="inputGroupSelect02">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect03">Filter By/Sort By</label>
                    <select class="form-select" id="inputGroupSelect03">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <select class="form-select" id="inputGroupSelect04">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                    </select>              
                </div>
                <button class="btn btn-outline-secondary" type="button">Search</button>

                <hr class="featurette-divider">

                <!-- /END THE FEATURETTES -->

            </div><!-- /.container -->


              <!-- FOOTER -->
              <footer class="container">
                <p class="float-end"><a href="#">Back to top</a></p>
                <p>&copy; 2020–2022 Toothscanner, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
              </footer>
        </div>
    </div>
</body>
</html>


