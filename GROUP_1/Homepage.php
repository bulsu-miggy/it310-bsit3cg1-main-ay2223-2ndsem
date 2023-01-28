<?php
include "connection.php";
session_start();


if(isset($_SESSION['User'])){?>
    <script type="text/JavaScript">
        window.onload = function() {
        document.getElementById("Lbutton").style.display = "none";
        document.getElementById("welcome").style.display = "inline";
        document.getElementById("edtcontent").style.display = "inline";
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

<?php  
if(isset($_POST["submit"])){
    //IMPORTANT ANNOUNCEMENT
    $announcement = $_POST["announcement"];
    //IMPORTANT ANNOUNCEMENT
    if($announcement != ""){
        $sqldel = "DELETE FROM tb_announcement";
        mysqli_query($conn, $sqldel);
    
        $sql = "INSERT INTO tb_announcement VALUES('', '$announcement')";
        mysqli_query($conn, $sql);
        echo "
    <script>
        alert('Successfully Added');
        document.location.href = 'Homepage.php';
    </script>
    ";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="font.css">
    <title>Home</title>

    
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
                    <li><a href="#">HOME</a></li>
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

    <section class="main" id="main">
        <div class="grid-holder">
            <div class="image-holder">
                <div class="long-image grid-pan-2"><img class="longimg" src="Images/Long Image 1.jpg" alt="Display Pic"></div>
                <div class="short-image">
                    <img src="Images/Book.png" alt="">
                    <p>Bulacan State University exists to produce highly competent, ethical and service-oriented professionals that 
                        contribute to the sustainable socio-economic growth and development of the nation</p>
                </div>
                <div class="short-image">
                    <img src="Images/Camera.png" alt="">
                    <p>Bulacan State University is a progressive knowledge-generating institution globally recognized for excellent instruction, 
                        pioneering research, and responsive community engagements</p>
                </div>
                <div class="long-image grid-pan-2"><img class="longimg" src="Images/Long Image 2.jpg" alt="Display Pic"></div>
            </div>
        </div>
        <div class="Announcement">
            <div class="announcement-content">
                <button class="edit" id="edtcontent" name="edtcontent" onclick="editfunc()" value="Edit">Edit</button>
                <script>
                    function editfunc(){
                        var  trigger = document.getElementById("edtcontent").value;
                        if(trigger == "Edit"){
                            document.getElementById("announcement").style.display = "inline";
                            document.getElementById("AdminForm").style.display = "inline";
                            document.getElementById("announce").style.display = "none";
                            document.getElementById("submitbutton").style.display = "inline";
                            document.getElementById("edtcontent").textContent = "Close";
                            document.getElementById("edtcontent").value = "Close";
                        }else if(trigger == "Close"){
                            document.getElementById("announcement").style.display = "none";
                            document.getElementById("AdminForm").style.display = "none";
                            document.getElementById("announce").style.display = "inline";
                            document.getElementById("submitbutton").style.display = "none";
                            document.getElementById("edtcontent").textContent = "Edit";
                            document.getElementById("edtcontent").value = "Edit";
                        }
                        
                    }
                </script>
                <?php
                    $announcement ="SELECT announce FROM tb_announcement";
                    $announce = mysqli_query($conn, $announcement);
                    $finalannounce = mysqli_fetch_assoc($announce);
                ?>
                <h1>Important Announcement!</h1>
                <form class="textfield" action="" id="AdminForm" name="AdminForm" method="POST" autocomplete="off" enctype="multipart/form-data">
                    <textarea  class="textfield" name="announcement" id="announcement" cols="30" rows="10"><?php echo implode($finalannounce) ?></textarea><br>
                    <input class="submit" id="submitbutton" form="AdminForm" type="submit" name="submit">
                </form>
                
                <p id="announce"><?php echo implode($finalannounce) ?></p>
            </div>
        </div>
    </section>

    <section class="main2">
        <div class="LatestNews">
        <?php
                $latest = mysqli_query($conn, "SELECT tb_citnews.*, tb_citevents.*, tb_cictnews.*, tb_cictevents.*, tb_stugov.* FROM tb_citnews, tb_citevents,  tb_cictnews, tb_cictevents, tb_stugov "); 
                $lates1 = mysqli_fetch_assoc($latest)?>
            <div class="latest">
                <h1>FEATURED <span>NEWS</span></h1>
                <a href=""><img src="ColNewsImages/<?php echo $lates1["image"] ?>" alt=""></a>
                <h2><?php echo $lates1["title"] ?></h2>
                <p><?php echo $lates1["content"] ?></p>
            </div>
        </div>
        <div class="ButtonGroup">
            <div class="NavButton"><a href="StudentGov.php"><button>Student Government</button></a></div>
            <div class="NavButton"><a href="Organizations.php"><button>Organizations</button></a></div>
            <div class="NavButton"><a href="Faculty.php"><button>Faculty</button></a></div>
            <div class="NavButton"><a href="Gallery.php"><button>Gallery</button></a></div>
            <div class="NavButton"><a href="Weather.php"><button>Weather Advisory</button></a></div>
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