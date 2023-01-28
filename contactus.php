<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FYP - ToothScanner</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/">
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="a.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  </head>
  <body>
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
    form {    
    text-align: center;
    width: 50%;
    margin: auto;
    }
    h1,h2,div,ul,li,h3,p 
    {
      text-align: center;
    }
    form {
      width: 50%;
      margin: auto;
    }

    p.special-font {
        font-size: 12px;
        }
</style>

<main>
  <h1 class="visually-hidden">About Us</h1>
  <div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <span class="fs-4">ToothScanner</span>
      </a>
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="homepage.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="aboutus.php" class="nav-link active" aria-current="page">About Us</a></li>
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

      
      <h1 class="center">Contact Us</h1>
    <br>
        <p> If you are facing any issues or have any queries, please first take a look at our self-help resources available for you below. 
          <br> For urgent help or if you are flying within 72 hours, please call us at 6942069 or use the form below to get in touch with us.
          <br> For urgent help regarding payment processes, please call our hotline at +65 69832567 or email us at payment@DHRM.com</p>

            <br>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="center">
          <label for="name">Name:</label><br>
          <input type="text" id="name" name="name"><br>
          <label for="email">Email:</label><br>
          <input type="email" id="email" name="email"><br>
          <label for="message">Message:</label><br>
          <textarea id="message" name="message"></textarea><br>
          <input type="submit" value="Send Message">
        </form> 
        <br>

        <h2>Frequently Asked Questions</h2>
        <div id="self-help-section"> 
             <ul>
                <li>
                    <form method="post">
                        <input type="submit" name="question1" value="Why did I not recieve any follow up to my request(s)?">
                    </form>
                  </li>
                  <li>
                    <form method="post">
                        <input type="submit" name="question2" value="I have already paid for a due fee yet was charged again.">
                    </form>
                  </li>
                  <li>
                    <form method="post">
                        <input type="submit" name="question3" value="I was promised a refund but was not given.">
                    </form>
                  </li>
         </ul>
    <!-- IMPORTANT NOTE: IF THE FOLLOWING else if statements do not work, please change them back into list format shown at the bottom -->



<?php
if (isset($_POST['question1'])) {
    echo '<div id="faq1" class="answer">
    <h3>Why did I not recieve any follow up to my request(s)?</h3>
    <p>If you did not reveiev any follow up request within 24 hours, it is possible that your request was dropped due to insufficient information given. Please resubmit a ticket or call our hotline at 6942069.</p>
  </div>';
}
elseif (isset($_POST['question2'])) {
    echo '<div id="faq2" class="answer">
    <h3>I have already paid for a due fee yet was charged again.</h3>
    <p>There are 2 possible outcomes, either the payment was not yet recieved or it was rejected. Please consult your bank to check if the payment went through. If your payment went through and yet there is still a charge, please call or email to our emergency hotline for payment process.</p>
  </div>';
}
elseif (isset($_POST['question3'])) {
    echo '<div id="faq3" class="answer">
    <h3>I was promised a refund but was not given.</h3>
    <p>Please check with your bank to see if there has been any payment refunded to your account. If there are still discrepencies, please call or email to our emergency payemnt hotline for payment process.</p>
  </div>';
}
?>

</div>
<br>
<h2 class="center">Premium Membership Hotline</h2><br>
<p>For your convenience, Premium Members can send a text message<b>*</b> to +65 9184 8888 with “DHRM+ 10-digit premium membership number” to request for a call back from our staff. </p>
  <p id="special-font">  <br><i>*Carrier charges may apply. Mobile number must be the same number registered in your DHRM profile.</i></p>

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
    </style>


<!-- (DELETE THIS IF THE ELSE IF STATEMENT WORKED)
        <h2>Frequently Asked Questions</h2>
        <div id="self-help-section"> 
             <ul>
                <li>
                    <button onclick="toggleAnswer(1)">Why did I not recieve any follow up to my request(s)?</button> 
                  </li>
                  <li>
                    <button onclick="toggleAnswer(2)">I have already paid for a due fee yet was charged again.</button>
                  </li>
                  <li>
                    <button onclick="toggleAnswer(3)">I was promised a refund but was not given.</button>
                  </li>
         </ul>

  <div id="faq1" class="answer" style="display: none;">
    <h3>Why did I not recieve any follow up to my request(s)?</h3>
    <p>If you did not recieve any follow up request within 24 hours, it is possible that your request was dropped due to insufficient information given. Please resubmit a ticket or call our hotline at +65 6942069.</p>
  </div>
  <div id="faq2" class="answer" style="display: none;">
    <h3>I have already paid for a due fee yet was charged again.</h3>
    <p>There are 2 possible outcomes, either the payment was not yet recieved or it was rejected. Please consult your bank to check if the payment went through. 
      If your payment went through and yet there is still a charge, please call or email to our emergency hotline for payment process.</p>
  </div>
  <div id="faq3" class="answer" style="display: none;">
    <h3>I was promised a refund but was not given.</h3>
    <p>Please check with your bank to see if there has been any payment refunded to your account. If there are still discrepencies, please call or email to our emergency payemnt hotline for payment process.</p>
  </div>
</div>

-->