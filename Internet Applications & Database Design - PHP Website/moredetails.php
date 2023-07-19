<!-- a HTML part -->
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
                        echo "<li><a  class='button' href='profile.php?alpha=$id'>Profile</a></li>";
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

    <br />


    <?php
    //if the form has been submitted
    if (isset($_POST['submitted'])) {
        if (!isset($_POST['username'], $_POST['password'])) {
            // Could not get the data that should have been sent.
            exit('Please fill both the username and password fields!');
        }
        // connect DB
        require_once("connectdb.php");
        try {
            //Query DB to find the matching username/password
            //using prepare/bindparameter to prevent SQL injection.
            $stat = $db->prepare('SELECT password FROM cvs WHERE name = ?');
            $stat->execute(array($_POST['username']));

            // fetch the result row and check 
            if ($stat->rowCount() > 0) {  // matching username
                $row = $stat->fetch();

                if (password_verify($_POST['password'], $row['password'])) { //matching password

                    //??recording the user session variable and go to loggedin page?? 
                    session_start();
                    $_SESSION["username"] = $_POST['username'];
                    header("Location:course.php");
                    exit();
                } else {
                    echo "<p style='color:red'>Error logging in, password does not match </p>";
                }
            } else {
                //else display an error

                echo "<div id='contact-me'><p style='color:red; font-size: 20px;'>Error logging in, Username not found </p></div>";
            }
        } catch (PDOException $ex) {
            echo ("Failed to connect to the database.<br>");
            echo ($ex->getMessage());
            exit;
        }
    }
    ?>


    <div style="padding: 30px; font-family: 'Montserrat'">



        <h2 style="color:white;">Profile</h2>

        <br>

        <?php
        require_once('connectdb.php');
        try {
            $pepelaugh = $_GET['cvID'];
            $query = "SELECT  * FROM  cvs WHERE id = $pepelaugh";
            //run  the query
            $rows =  $db->query($query);

            //step 3: display the course list in a table 	
            if ($rows && $rows->rowCount() > 0) {

        ?>
                <table cellspacing="0" cellpadding="5" id="myTable">
                    <tr>

                        <th align='left' style='padding-right: 30px '><b style="color: rgb(102, 139, 170)">Name</b></th>
                        <th align='left' style='padding-right: 20px'><b style="color: rgb(102, 139, 170)">Email</b></th>
                        <th align='left' style='padding-right: 40px'><b style="color: rgb(102, 139, 170)">Key Programming Language</b>
                        <th align='left' style='padding-right: 40px'><b style="color: rgb(102, 139, 170)">Profile</b></th>
                        <th align='left' style='padding-right: 40px'><b style="color: rgb(102, 139, 170)">Education</b></th>
                        <th align='left' style='padding-right: 40px'><b style="color: rgb(102, 139, 170)">URL Links</b></th>
                    </tr>
            <?php
                // Fetch and  print all  the records.
                while ($row =  $rows->fetch()) {
                    $currentID = $row['id'];


                    echo  "<td align='left' style='padding-right: 30px'>" . $row['name'] . "</td>";
                    echo  "<td align='left' style='padding-right: 20px'>" . $row['email'] . "</td>";
                    echo "<td align='left' style='padding-right: 40px'>" . $row['keyprogramming'] . "</td>";
                    echo "<td align='left' style='padding-right: 20px'>" . $row['profile'] . "</td>";
                    echo "<td align='left' style='padding-right: 20px'>" . $row['education'] . "</td>";
                    echo "<td align='left' style='padding-right: 20px'>" . $row['URLlinks'] . "</td>";
                }
                echo  '</table>';
            } else {
                echo  "<p>No  course in the list.</p>\n"; //no match found
            }
        } catch (PDOexception $ex) {
            echo "Sorry, a database error occurred! <br>";
            echo "Error details: <em>" . $ex->getMessage() . "</em>";
        }

            ?>


    </div>




    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


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

</body>

</html>