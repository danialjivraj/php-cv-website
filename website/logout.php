<?php

session_start();
//unset($_SESSION["username"]);
session_destroy();

?>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Home</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="shortcut icon" type="image/x-icon" href="Images/cv.png" />
  <link rel="stylesheet" href="style.css" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="style.css" />
  <script src="https://kit.fontawesome.com/aa1a7f25aa.js" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <div class="main-header">
      <nav>
        <ul class="nav_links">
          <li><a id="name" href="viewcv.php">Home</a></li>
          <?php
          session_start();
          if (isset($_SESSION["username"])) {
            $id = $_SESSION['username'];
            echo "<li><a  class='button' href='profile.php'>Profile</a></li>";
            echo "<li><a  class='button' href='logout.php'>Log Out</a></li>";
          } else {
            echo "<li><a  class='button' href='register.php'>Sign up</a></li>";
            echo "<li><a  class='button' href='index.php'>Log In</a></li>";
          }
          ?>
        </ul>
      </nav>
    </div>
  </header>

  <div style="padding: 30px">
    <h2 style="color: rgb(102, 139, 170)"> Logged out now! </h2> <br>
    <p style="color:white;  font-family: 'Montserrat'; font-size:15px">Would like to log in again? <a href="index.php" id="mailbox-format" style="font-size:16px">Log in</a> </p>
  </div>

  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

  <footer class="otherpages-footer">
    <div class="footer-content">
      <h3>Curriculum Vitae</h3>
      <p>For more information please contact me at any of my social media.</p>

      <div class="icon-background">
        <ul class="socials">
          <li>
            <span title="LinkedIn "><a href="https://uk.linkedin.com/" target="_blank"><i class="fa-brands fa-linkedin-in fa-2x"></i></a></span>
          </li>
          <li>
            <span title="GitHub "><a href="https://github.com/" target="_blank"><i class="fa-brands fa-github fa-2x"></i></a></span>
          </li>
          <li>
            <span title="Twitter "><a href="https://www.twiter.com/ " target="_blank"><i class="fa-brands fa-twitter fa-2x"></i></a></span>
          </li>
        </ul>
      </div>

      <p id="footer-text">
        Copyright &copy;2022 Danial Jivraj. All rights reserved.<br />
        210093030@aston.ac.uk <br />
        <em>Designed by</em> <span id="footer-span">Danial Jivraj</span>
      </p>
    </div>
  </footer>