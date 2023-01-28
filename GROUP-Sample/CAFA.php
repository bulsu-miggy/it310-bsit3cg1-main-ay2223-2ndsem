<?php
include "connection.php";
session_start();


if(isset($_SESSION['User'])){?>
    <script type="text/JavaScript">
        window.onload = function() {
        document.getElementById("Lbutton").style.display = "none";
        document.getElementById("welcome").style.display = "inline";
        var elms = document.querySelectorAll("[id = 'delete']");
        for(var i = 0; i < elms.length; i++){
            elms[i].style.display = "inline";
        } 
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
    <title>College of Architecture and Fine Arts</title>
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
    <section class="CAFA">
        <div class="CAFAhead">
            <div class="CAFAtitle">
                <p>COLLEGE OF ARCHITECTURE AND FINE ARTS</p>
            </div>
            <div class="CAFAdean">
                <p><img src="Images/CAFA.png" alt=""></p>
                <hr class="CAFAhr">
                <div class="CAFAdeanbottom">
                    <img src="Images/nopic.png" alt="">
                    <h4>Godesil G. Lejarde</h4>
                    <span>Dean, College of Architecture and Fine Arts</span>
                </div>
            </div>
        </div>
        <div class="CAFAfacultyholder">
            <div class="CAFAfacultytitle">
                <span>FACULTY</span>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/Jose.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Ar. Jose Francisco Aniag</h1>
                    <h2>Faculty, Architecture Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/nopic.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Ar. Rosal Luzvincent De Ocampo</h1>
                    <h2>Faculty, Architecture Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/Jose2.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Ar. Jose Marri De Leon</h1>
                    <h2>Faculty, Architecture Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/Macgil.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Ar. Macgil De Leon</h1>
                    <h2>Faculty, Architecture Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/Hershey.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Ar. Hershey Didulo</h1>
                    <h2>Faculty, Architecture Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/Mark.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Ar. Mark Oxley Enriquez</h1>
                    <h2>Faculty, Architecture Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/nopic.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Ar. Ralph Intal</h1>
                    <h2>Faculty, Architecture Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/nopic.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Ar. Dennis Estacio</h1>
                    <h2>Faculty, Architecture Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/Rodolfo.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Ar. Rodolfo Gregorio</h1>
                    <h2>Faculty, Architecture Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/nopic.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Ar. Clarenz Paul Villafuerte</h1>
                    <h2>Faculty, Architecture Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/nopic.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Ar. Laurence Cosay</h1>
                    <h2>Faculty, Architecture Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/Godesil.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Ar. Godesil Lejarde</h1>
                    <h2>Faculty, Architecture Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/Edilberto.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Ar. Edilberto Martinez</h1>
                    <h2>Faculty, Architecture Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/nopic.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Ar. Jay Allan Cruz</h1>
                    <h2>Faculty, Architecture Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/nopic.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Ar. Sharon Perion</h1>
                    <h2>Faculty, Architecture Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/Ivy.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Ar. Ivy Santos</h1>
                    <h2>Faculty, Architecture Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/Owen.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Ar. Owen Tolentino</h1>
                    <h2>Faculty, Architecture Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/nopic.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Engr. Nicolas Viray</h1>
                    <h2>Faculty, Architecture Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/Napoleon.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Mr. Napoleon Banayat</h1>
                    <h2>Faculty, Fine Arts Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/nopic.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Mr. Don Bryan Michael Bunag</h1>
                    <h2>Faculty, Fine Arts Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/nopic.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Ms. Patria Bautista</h1>
                    <h2>Faculty, Fine Arts Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/Lawrence.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Mr. Lawrence Jay Cervantes</h1>
                    <h2>Faculty, Fine Arts Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/nopic.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Mr. Juan Nathaniel Ranola III</h1>
                    <h2>Faculty, Fine Arts Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/nopic.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Ms. Manesa Manansala</h1>
                    <h2>Faculty, Landscape Architecture Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/nopic.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>Mr. Rondell Gascon</h1>
                    <h2>Faculty, Landscape Architecture Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/nopic.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>L. Ar. Holtzjosip Abbu</h1>
                    <h2>Faculty, Landscape Architecture Department</h2>
                </div>
            </div>
            <div class="CAFAfaculty">
                <img src="Images/nopic.png" alt="">
                <div class="CAFAfacultyname">
                    <h1>L. Ar. Ross Pabustan</h1>
                    <h2>Faculty, Landscape Architecture Department</h2>
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