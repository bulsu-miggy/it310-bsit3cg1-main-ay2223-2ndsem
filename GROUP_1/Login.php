<?php

ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
include "connection.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
    $uname = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM login WHERE User='".$uname."' AND Pass='".$password."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if($row['User']=="$uname" && $row['Pass']=="$password"){
        session_start();
        $_SESSION['User'] = $uname;?>
        <script type="text/javascript">
            function login(){
                document.getElementById("Lbutton").innerText = "none";
                document.getElementById("welcomehold").style.display = "none";
            }
        </script>
        <?php header("location:Homepage.php");?>
        
    <?php } else if($row['User'] == Null){ 
        ?>
        <script type="text/javascript">
            alert("Wrong Username/Password");

        </script>
    <?php } ?>
    <?php } ?>
    


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="font.css">
    <title>Login</title>
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
                <a href="Login.php"><button id="Lbutton">Admin Login</button></a>       
            </div>
            </div>
    <!-- END OF HEADER -->
    <div class="page">
        <div class="pre-content"></div>
        <div class="page-content">
            <main class="main-content">
                <section class="sign">
                    <header class="login-header">
                        <h1 class="login-title">Sign In</h1>
                    </header>
                    <div class="login-content">
                        <form action="#" method="POST">
                            <div class="form-row">
                                <input type="Text" class="input" name="username" placeholder="Enter your username" maxlength="15" required data-msg-required="Username is required">
                            </div>
                            <div class="form-row">
                                <input type="password" class="input" name="password" maxlength="50" placeholder="Enter your Password" required>
                            </div>
                            <div class="form-row">
                                <button class="login-button" onclick="login()">Log in</button>
                            </div>
                        </form>
                    </div>
                </section>
            </main>
        </div>
        <div class="post-content"></div>
    </div>
    <footer>
        <div class="footer">
            <span>© 2017 Bulacan State University</span>
            <span>Maintained by System Analysis Development Group 1</span>
        </div>
    </footer>
</body>
</html>