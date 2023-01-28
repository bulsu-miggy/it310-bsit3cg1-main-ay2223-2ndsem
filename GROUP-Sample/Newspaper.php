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
    <title>NewsPaper</title>

    <script>
        function newspaper(){
            var choice = document.getElementById("years").value;
            if (choice == 1){
                document.getElementById("sec1").style.display = "block";
                document.getElementById("sec2").style.display = "none";
                document.getElementById("sec3").style.display = "none";
            } else if (choice == 2){
                document.getElementById("sec2").style.display = "block";
                document.getElementById("sec1").style.display = "none";
                document.getElementById("sec3").style.display = "none";
            } else if (choice == 3){
                document.getElementById("sec3").style.display = "block";
                document.getElementById("sec1").style.display = "none";
                document.getElementById("sec2").style.display = "none";
            }
        }
    </script>
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
    <!-- START OF CONTENT -->  
    <select class="yearselect" name="years" id="years" onchange="newspaper()">
                    <option value="1">2022-2021</option>
                    <option value="2">2020-2019</option>
                    <option value="3">2018-2017</option>
                </select> 
    <section class="Newspapersec" id="sec1">
        <div class="Newspaper">
            <div class="newsheader">
                <h1 class="NewspaperYear" id="NewspaperYear">2022</h1>
                <h1 class="Newspapertitle">Bulacan State University 2022 Newspaper</h1>
            </div>
            
            <div class="Newspaperinner">
                <div class="Newspapercontent">
                    <div class="NewspaperImage">
                        <a href=""><img src="Images/Long Image 1.jpg" alt=""></a>
                        <div class="newsoverlay">
                            <h1>Newspaper</h1>
                            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                 ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h2>
                        </div>
                    </div>
                    <div class="NewspaperImage">
                        <a href=""><img src="Images/Newspaper2.png" alt=""></a>
                        <div class="newsoverlay">
                            <h1>Newspaper</h1>
                            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                 ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h2>
                        </div>
                    </div>
                    <div class="NewspaperImage">
                        <a href=""><img src="Images/Newspaper3.png" alt=""></a>
                        <div class="newsoverlay">
                            <h1>Newspaper</h1>
                            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                 ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="Newspaper">
            <div class="newsheader">
                <h1 class="NewspaperYear" id="NewspaperYear">2021</h1>
                <h1 class="Newspapertitle">Bulacan State University 2021 Newspaper</h1>
            </div>
            
            <div class="Newspaperinner">
                <div class="Newspapercontent">
                    <div class="NewspaperImage">
                        <a href=""><img src="Images/Long Image 1.jpg" alt=""></a>
                        <div class="newsoverlay">
                            <h1>Newspaper</h1>
                            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                 ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h2>
                        </div>
                    </div>
                    <div class="NewspaperImage">
                        <a href=""><img src="Images/Newspaper2.png" alt=""></a>
                        <div class="newsoverlay">
                            <h1>Newspaper</h1>
                            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                 ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h2>
                        </div>
                    </div>
                    <div class="NewspaperImage">
                        <a href=""><img src="Images/Newspaper3.png" alt=""></a>
                        <div class="newsoverlay">
                            <h1>Newspaper</h1>
                            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                 ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="Newspapersec2" id="sec2">
        <div class="Newspaper">
            <div class="newsheader">
                <h1 class="NewspaperYear" id="NewspaperYear">2020</h1>
                <h1 class="Newspapertitle">Bulacan State University 2020 Newspaper</h1>
            </div>
            
            <div class="Newspaperinner">
                <div class="Newspapercontent">
                    <div class="NewspaperImage">
                        <a href=""><img src="Images/Long Image 1.jpg" alt=""></a>
                        <div class="newsoverlay">
                            <h1>Newspaper</h1>
                            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                 ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h2>
                        </div>
                    </div>
                    <div class="NewspaperImage">
                        <a href=""><img src="Images/Newspaper2.png" alt=""></a>
                        <div class="newsoverlay">
                            <h1>Newspaper</h1>
                            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                 ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h2>
                        </div>
                    </div>
                    <div class="NewspaperImage">
                        <a href=""><img src="Images/Newspaper3.png" alt=""></a>
                        <div class="newsoverlay">
                            <h1>Newspaper</h1>
                            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                 ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="Newspaper">
            <div class="newsheader">
                <h1 class="NewspaperYear" id="NewspaperYear">2019</h1>
                <h1 class="Newspapertitle">Bulacan State University 2019 Newspaper</h1>
            </div>
            
            <div class="Newspaperinner">
                <div class="Newspapercontent">
                    <div class="NewspaperImage">
                        <a href=""><img src="Images/Long Image 1.jpg" alt=""></a>
                        <div class="newsoverlay">
                            <h1>Newspaper</h1>
                            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                 ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h2>
                        </div>
                    </div>
                    <div class="NewspaperImage">
                        <a href=""><img src="Images/Newspaper2.png" alt=""></a>
                        <div class="newsoverlay">
                            <h1>Newspaper</h1>
                            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                 ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h2>
                        </div>
                    </div>
                    <div class="NewspaperImage">
                        <a href=""><img src="Images/Newspaper3.png" alt=""></a>
                        <div class="newsoverlay">
                            <h1>Newspaper</h1>
                            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                 ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="Newspapersec3" id="sec3">
        <div class="Newspaper">
            <div class="newsheader">
                <h1 class="NewspaperYear" id="NewspaperYear">2018</h1>
                <h1 class="Newspapertitle">Bulacan State University 2018 Newspaper</h1>
            </div>
            
            <div class="Newspaperinner">
                <div class="Newspapercontent">
                    <div class="NewspaperImage">
                        <a href=""><img src="Images/Long Image 1.jpg" alt=""></a>
                        <div class="newsoverlay">
                            <h1>Newspaper</h1>
                            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                 ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h2>
                        </div>
                    </div>
                    <div class="NewspaperImage">
                        <a href=""><img src="Images/Newspaper2.png" alt=""></a>
                        <div class="newsoverlay">
                            <h1>Newspaper</h1>
                            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                 ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h2>
                        </div>
                    </div>
                    <div class="NewspaperImage">
                        <a href=""><img src="Images/Newspaper3.png" alt=""></a>
                        <div class="newsoverlay">
                            <h1>Newspaper</h1>
                            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                 ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="Newspaper">
            <div class="newsheader">
                <h1 class="NewspaperYear" id="NewspaperYear">2017</h1>
                <h1 class="Newspapertitle">Bulacan State University 2017 Newspaper</h1>
            </div>
            
            <div class="Newspaperinner">
                <div class="Newspapercontent">
                    <div class="NewspaperImage">
                        <a href=""><img src="Images/Long Image 1.jpg" alt=""></a>
                        <div class="newsoverlay">
                            <h1>Newspaper</h1>
                            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                 ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h2>
                        </div>
                    </div>
                    <div class="NewspaperImage">
                        <a href=""><img src="Images/Newspaper2.png" alt=""></a>
                        <div class="newsoverlay">
                            <h1>Newspaper</h1>
                            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                 ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h2>
                        </div>
                    </div>
                    <div class="NewspaperImage">
                        <a href=""><img src="Images/Newspaper3.png" alt=""></a>
                        <div class="newsoverlay">
                            <h1>Newspaper</h1>
                            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                 ut labore et dolore magna aliqua. Ut enim ad minim veniam,</h2>
                        </div>
                    </div>
                </div>
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