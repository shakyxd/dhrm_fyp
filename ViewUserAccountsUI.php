<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>View User Account</title>
    <!-- 
        Slide 5 of Wireframe Sprint 1
    -->
    <style>
        <?php include "CSSFile.css" ?>

        th, td, input {
            border-radius: 5px;
            border: 1px solid black;
            text-align: center;
            font-size: 12pt;
        }
    </style>
</head>
<body class="form">
    <!-- View User Account -->
    <center>
        <header class="header">
            <h1>
                <!-- Restaurant Logo -->
                <img class="restaurantLogoTopLeft" src="Logo.png" width="60px" height="60px">
            </h1>
            <h2 id="main">
                <!-- Restaurant Name -->
                <?php echo "<a href='HomePageUI.php?edit=$_GET[edit]' target='_self' class='main'>Rocket</a>"; ?>
            </h2>
            <h3>
                <!-- User's Navigation Dropdown Box -->
                <div class="dropdown">
                    <button class="dropbtn"><?php echo $_SESSION['username'];?></button>
                    <div class="dropdown-content">
                    <?php echo "<a href='#' onclick=window.location.href='ManageAccountViaNavBarUI.php?edit=$_GET[edit]'>Manage Account</a>"; ?>
                    <a href="#" onclick="window.location.href='logoutController.php'"><img class="logout" src="Logout.png" width="25" height="25" align="center">Logout</a>
                    <!-- THE '#' IS FOR THE LINKS/HYPERLINKS, REPLACE THE URL ON THE HASH AND CHANGE THE LINK 'NUMBER' WHEN DONE-->
                    </div>
                  </div>
            </h3>
        </header>
        <form method="post" name="viewAccount" class="viewAccount">
            <h2>View Account</h2>
            <hr></hr> <!-- Divider -->
            <div>
                <!-- Search Icon -->
                <img class="searchIcon" src="Search.png" alt="Search">
                <!-- Search Username Textbox -->
                <input class="inputSearch" id="inputbox" type="text" name="valueToSearch" placeholder="Search by Username"><br><br>
                <!-- Refresh List Button -->
                <input id="but" type="submit" name="search" value="Refresh List">
            </div>
            <!-- List of Account Table -->
            <h4>List Of Accounts</h4>
            <table class="tableViewAcc">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Functions</th>
                </tr>
                <?php include('ViewAccountController.php');?>
            </table>
        </form>
    </center>
</body>
</html>