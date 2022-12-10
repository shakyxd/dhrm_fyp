<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>User Account Details</title>
    <!-- 
       Wireframe Details?
    -->
    <style>
        <?php include "CSSFile.css" ?>

        input, textarea, select, option{
            border-radius: 5px;
            border: 1px solid black;
            font-size: 12pt;
        }
    </style>
</head>
<body class="form">
    <!-- Update/Edit User Account Details -->
    <center>
        <header class="header">
            <h1>
                <!-- Logo -->
                <img class="LogoTopLeft" src="Logo.png" width="60px" height="60px">
            </h1>
            <h2 id="main">
                <!-- Company Name -->
                <?php echo "<a href='#' target='_self' class='main' onclick=window.location.href='HomePageUI.php?edit=$_SESSION[username]'>DHRM</a>"; ?> <!-- DHRM is name of project-->
            </h2>
            <h3>
                <!-- User's Navigation Dropdown Box -->
                <div class="dropdown">
                    <button class="dropbtn"><?php  echo $_SESSION['username'];?></button>
                    <div class="dropdown-content">
                    <?php echo "<a href='#' onclick=window.location.href='SearchAccountNav.php?edit=$_SESSION[username]'>Manage Account</a>"; ?>
                    <a href="#" onclick="window.location.href='logoutController.php'"><img class="logout" src="Logout.png" width="25" height="25" align="center">Logout</a>
                    <!-- THE '#' IS FOR THE LINKS/HYPERLINKS, REPLACE THE URL ON THE HASH AND CHANGE THE LINK 'NUMBER' WHEN DONE-->
                    </div>
                  </div>
            </h3>
        </header>
        <div class="userAccountDetails">
            <form method="post" name="userAccountDetailsPage" class="userAccountDetailsPage">
                <h2>User Account Details</h2>
                <hr></hr> <!-- Divider -->
                <table>
                    <?php include('SearchAccountNav.php');?>
                    <tr>
                        <td>
                        </td>
                        <td style="float: right;">
                            <!--Save Changes Button-->
                            <input type="submit" value="Save Changes" name="userSaveChangesButton" class="userSaveChangesButton"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </center>
</body>
</html>