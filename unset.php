<?php

    session_start();
    setcookie(session_name(), '', 100);
    session_unset();
    session_destroy();
    $_SESSION = array();
    header("location:http://localhost/dhrm_fyp/homepage.php");
?>