<?php
include "connection.php";
session_start();


if(isset($_SESSION['User'])){?>
    <script type="text/JavaScript">
        window.onload = function() {
        document.getElementById("Lbutton").style.display = "none";
        document.getElementById("welcome").style.display = "inline";
        document.getElementById("Lgbutton").style.margin = "0px 10px 0px -130px";
        }

        function logout(){
            var choice = confirm("Do you really want to logout?");
            if(choice == true){
                window.location = "logout.php"
            } else {
                event.preventDefault();
            }
        }
    </script>
<?php } else{?>
    <script type="text/JavaScript">
        window.onload = function() {
        document.getElementById("Lgbutton").style.display = "none";
        }
    </script>
 <?php } 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="font.css">
    <title>Contacts</title>
</head>
<body>
        <!-- START OF HEADER -->
    <div class="filler">
    <div class="topnav">
        <ul class="topnav-links">
            <li><a href="StudentGov.php">STUDENT GOVERNMENT</a></li>
            <li><a href="Organizations.php">ORGANIZATIONS</a></li>
            <li><a href="Faculty.php">FACULTY</a></li>
            <li><a href="Gallery.php">GALLERY</a></li>
            <li><a href="Weather.php">WEATHER ADVISORY</a></li>
        </ul>
    </div>
    </div>
    <div class="header">
        <div class="header-content">
            <div class="page-logo">
                <a href="Homepage.php"><img src="Images/Bulsulogo.png" alt="Logo"></a>
                <h3 class="autofit pull-left" style="margin-top: 10px !important;">
                    <span>ISO 9001:2015 CERTIFIED</span>
                    <a class="Logo-name" href="Homepage.php">
                        B<small>ULACAN</small>
                        S<small>TATE</small>
                        U<small>NIVERSITY</small>
                    </a>
                </h3>
            </div>
        </div>   
    </div>
    <div class="header-bottom">
        <div class="nav-bar">
                <ul class="Nav-Links">
                    <li><a href="Homepage.php">HOME</a></li>
                    <li><a href="Newspaper.php">NEWS PAPER</a></li>
                    <li><a href="CollegeNews.php">COLLEGE NEWS</a></li>
                    <li><a href="Events.php">EVENTS</a></li>
                    <li><a href="Contacts.php">CONTACTS</a></li>
                    <li><a href="Admin.php" class="Admin" id="edit">EDIT</a></li>
                </ul>
            </div>
            <div class="login-btn" id="welcomehold">
                <p class="Welcome" id="welcome">Welcome, Admin <?php echo $_SESSION['User'] ?></p>
                <a href="Login.php"><button id="Lbutton">Admin Login</button></a>
                <a href="logout.php"><button class="login-button" id="Lgbutton" onclick="logout()">Logout</button></a>
            </div>
            </div>
    <!-- END OF HEADER -->
    <!--CONTENT-->
    <section class="contactus">
        <div class="contacts">
            <div class="contactstitle">
                <img src="Images/Envelope.png" alt="">
                <h1><span>Contact</span>  Us</h1>
            </div>
            <div class="contactscontent">
                <img src="Images/Location.png" alt="">
                <p>Guinhawa, City of Malolos, Bulacan</p>
            </div>
            <div class="contactscontent">
                <img src="Images/Call.png" alt="">
                <p> 919-7800</p>
            </div>
            <div class="contactscontent">
                <img src="Images/email.png" alt="">
                <p>officeofthepresident@bulsu.edu.ph</p>
            </div>
        </div>
        <div class="contacts-side">
            <img src="Images/Bulsulogo.png" alt="">
            <div class="contactsoverlay">
            <h1>About BulSU</h1>
            <h2>BULACAN STATE UNIVERSITY (BulSU) is the premiere state-operated institution of higher learning in the Cenral Luzon region. It originated as a secondary school run by the Americans in 1904, and has now progressed into one of the biggest educational institutions in Region III. BulSU was converted from a college into a University in 1993 by virtue of Republic Act 7665. Since then, BulSU has grown by leaps and bounds, in terms of program offerings, faculty qualification, and student enrolment. It is the vision of the University to be a knowledge-generating institution globally recognized for excellent instruction, pioneering research, and responsive community engagement. The University has also maintained the existence of four external campuses within the province namely Meneses Campus, Hagonoy Campus, Sarmiento Campus, and Bustos Campus
The University has been consistently producing highly professional, ethical, and service-oriented individuals who perform well in board examinations with impressive results consistently exceeding the National Passing Rate and become potent driving force in the industries in the region and beyond. BulSU has recently received its ISO 9001:2015 Certification, passed the Level II Institutional Accreditation while 50 academic programs of the different Colleges are already accredited by the Accrediting Agency of Chartered Colleges and Universities (AACCUP), Inc. This was made possible through the persistent hardwork and resolute service of its 1,138 faculty members and 476 non-teaching personnel who relentlessly cater and furnish the needs of our 35,958 students.</h2>
            </div>
        </div>
    </section>


    <footer>
        <div class="footer">
            <span>© 2017 Bulacan State University</span>
            <span>Maintained by System Analysis Development Group 1</span>
        </div>
    </footer>
</body>
</html>