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
    <title>Faculty</title>
 </head>
 <body>
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
    <section class="faculty">
        <div class="facultyhead">
            <div class="facultytitle">
                <p>OVERVIEW</p>
            </div>
            <div class="facultydesc">
                <p>The Bulacan State University is committed to the advancement of the knowledge and values common to all educated person. Excellence in instruction, research, extension and student life is encouraged. The University strives to offer learning, experiences and opportunities designed to help students think effectively, develop the capacity to communicate, discriminate among values, and make relevant judgements.

<br><br>By its mission to provide higher professional, technical and special instruction, Bulacan State University has <span>14</span> Colleges, <span>1</span> School as follows:</p>
            </div>
        </div>
        <div class="Collegelist">
            <div class="Colleges">
                <img src="Images/CAFA.png" alt="">
                <div class="course">
                    <a href="CAFA.php"><h1>College of Architecture and Fine Arts (CAFA)</h1></a>
                    <p>Bachelor of Science in Architecture</p>
                    <p>Bachelor of Landscape Architecture</p>
                    <p>Bachelor of Fine Arts Major in Visual Communication</p>
                </div>
            </div>
            <div class="Colleges">
                <img src="Images/CAL.png" alt="">
                <div class="course">
                    <a href=""><h1>College of Arts and Letters (CAL)</h1></a>
                    <p>Bachelor of Arts in Broadcasting</p>
                    <p>Bachelor of Arts in Journalism</p>
                    <p>Bachelor of Performing Arts (Theater Track)</p>
                    <p>Batsilyer ng Sining sa Malikhaing Pagsulat</p>
                </div>
            </div>
            <div class="Colleges">
                <img src="Images/CBA.png" alt="">
                <div class="course">
                    <a href=""><h1>College of Business Administration (CBA)</h1></a>
                    <p>Bachelor of Science in Business Administration Major in Business Economics</p>
                    <p>Bachelor of Science in Business Administration Major in Financial Management</p>
                    <p>Bachelor of Science in Business Administration Major in Marketing Management</p>
                    <p>Bachelor of Science in Entrepreneurship</p>
                    <p>Bachelor of Science in Accountancy</p>
                </div>
            </div>
            <div class="Colleges">
                <img src="Images/CCJE.png" alt="">
                <div class="course">
                    <a href=""><h1>College of Criminal Justice Education (CCJE)</h1></a>
                    <p>Bachelor of Arts in Legal Management</p>
                    <p>Bachelor of Science in Criminology</p>
                </div>
            </div><div class="Colleges">
                <img src="Images/CHTM.png" alt="">
                <div class="course">
                    <a href=""><h1>College of Hospitality and Tourism Management (CHTM)</h1></a>
                    <p>Bachelor of Science in Hospitality Management</p>
                    <p>Bachelor of Science in Tourism Management</p>
                </div>
            </div><div class="Colleges">
                <img src="Images/CICT.png" alt="">
                <div class="course">
                    <a href=""><h1>College of Information and Communications Technology (CICT)</h1></a>
                    <p>Bachelor of Science in Information Technology</p>
                    <p>Bachelor of Library and Information Science</p>
                    <p>Bachelor of Science in Information System</p>
                </div>
            </div><div class="Colleges">
                <img src="Images/CIT.png" alt="">
                <div class="course">
                    <a href=""><h1>College of Industrial Technology (CIT)</h1></a>
                    <p>Bachelor of Industrial Technology with specialization in Automotive</p>
                    <p>Bachelor of Industrial Technology with specialization in Computer</p>
                    <p>Bachelor of Industrial Technology with specialization in Drafting</p>
                    <p>Bachelor of Industrial Technology with specialization in Electrical</p>
                    <p>Bachelor of Industrial Technology with specialization in Electronics & Communication Technology</p>
                    <p>Bachelor of Industrial Technology with specialization in Electronics Technology</p>
                    <p>Bachelor of Industrial Technology with specialization in Food Processing Technology</p>
                    <p>Bachelor of Industrial Technology with specialization in Mechanical</p>
                    <p>Bachelor of Industrial Technology with specialization in Heating, Ventilation, Air Conditioning and Refrigeration Technology (HVACR)</p>
                    <p>Bachelor of Industrial Technology with specialization in Mechatronics Technology</p>
                    <p>Bachelor of Industrial Technology with specialization in Welding Technology</p>
                </div>
            </div><div class="Colleges">
                <img src="Images/CLaw.png" alt="">
                <div class="course">
                    <a href=""><h1>College of Law (CLaw)</h1></a>
                    <p>Bachelor of Laws</p>
                    <p>Juris Doctor</p>
                </div>
            </div><div class="Colleges">
                <img src="Images/CN.png" alt="">
                <div class="course">
                    <a href=""><h1>College of Nursing (CN)</h1></a>
                    <p>Bachelor of Science in Nursing</p>
                </div>
            </div><div class="Colleges">
                <img src="Images/COE.png" alt="">
                <div class="course">
                    <a href=""><h1>College of Engineering (COE)</h1></a>
                    <p>Bachelor of Science in Civil Engineering</p>
                    <p>Bachelor of Science in Computer Engineering</p>
                    <p>Bachelor of Science in Electrical Engineering</p>
                    <p>Bachelor of Science in Electronics Engineering</p>
                    <p>Bachelor of Science in Industrial Engineering</p>
                    <p>Bachelor of Science in Manufacturing Engineering</p>
                    <p>Bachelor of Science in Mechanical Engineering</p>
                    <p>Bachelor of Science in Mechatronics Engineering</p>
                </div>
            </div><div class="Colleges">
                <img src="Images/COED.png" alt="">
                <div class="course">
                    <a href=""><h1>College of Education (COED)</h1></a>
                    <p>Bachelor of Elementary Education</p>
                    <p>Bachelor of Early Childhood Education</p>
                    <p>Bachelor of Secondary Education Major in English minor in Mandarin</p>
                    <p>Bachelor of Secondary Education Major in Filipino</p>
                    <p>Bachelor of Secondary Education Major in Sciences</p>
                    <p>Bachelor of Secondary Education Major in Mathematics</p>
                    <p>Bachelor of Secondary Education Major in Social Studies</p>
                    <p>Bachelor of Secondary Education Major in Values Education</p>
                    <p>Bachelor of Physical Education</p>
                    <p>Bachelor of Technology and Livelihood Education Major in Industrial Arts</p>
                    <p>Bachelor of Technology and Livelihood Education Major in Information and Communication Technology</p>
                    <p>Bachelor of Technology and Livelihood Education Major in Home Economics</p>
                </div>
            </div><div class="Colleges">
                <img src="Images/CS.png" alt="">
                <div class="course">
                    <a href=""><h1>College of Science (CS)</h1></a>
                    <p>Bachelor of Science in Biology</p>
                    <p>Bachelor of Science in Environmental Science</p>
                    <p>Bachelor of Science in Food Technology</p>
                    <p>Bachelor of Science in Math with Specialization in Computer Science</p>
                    <p>Bachelor of Science in Math with Specialization in Applied Statistics</p>
                    <p>Bachelor of Science in Math with Specialization in Business Applications</p>
                </div>
            </div><div class="Colleges">
                <img src="Images/CSER.png" alt="">
                <div class="course">
                    <a href=""><h1>College of Sports, Exercise and Recreation (CSER)</h1></a>
                    <p>Bachelor of Science in Exercise and Sports Sciences with specialization in Fitness and Sports Coaching</p>
                    <p>Bachelor of Science in Exercise and Sports Sciences with specialization in Fitness and Sports Management</p>
                    <p>Certificate of Physical Education</p>
                </div>
            </div><div class="Colleges">
                <img src="Images/CSSP.png" alt="">
                <div class="course">
                    <a href=""><h1>College of Social Sciences and Philosophy (CSSP)</h1></a>
                    <p>Bachelor of Public Administration</p>
                    <p>Bachelor of Science in Social Work</p>
                    <p>Bachelor of Science in Psychology</p>
                </div>
            </div><div class="Colleges">
                <img src="Images/GS.png" alt="">
                <div class="course">
                    <a href=""><h1>Graduate School (GS)</h1></a>
                    <p>Doctor of Education</p>
                    <p>Doctor of Philosophy</p>
                    <p>Doctor of Public Administration</p>
                    <p>Master in Physical Education</p>
                    <p>Master in Business Administration</p>
                    <p>Master in Public Administration</p>
                    <p>Master of Arts in Education</p>
                    <p>Master of Engineering Program</p>
                    <p>Master of Industrial Technology Management</p>
                    <p>Master of Science in Civil Engineering</p>
                    <p>Master of Science in Computer Engineering</p>
                    <p>Master of Science in Electronics and Communications Engineering</p>
                    <p>Master of Information Technology</p>
                    <p>Master of Manufacturing Engineering</p>
                </div>
            </div>
            
        </div>

    </section>


    <div class="footer">
            <span>© 2017 Bulacan State University</span>
            <span>Maintained by System Analysis Development Group 1</span>
        </div>
 </body>
 </html>