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

 <?php

if(isset($_POST["submit"])){
    $form = ["AdminForm"];
    if(empty($form)){
        echo"<script> alert('Form is Empty') </script>"; 
    }
    //IMPORTANT ANNOUNCEMENT
    $announcement = $_POST["announcement"];

    //COLLEGE NEWS
    $coltitle = $_POST["coltitle"];
    $coldate = $_POST["coldate"];
    $colcontent = $_POST["colcontent"];
    $colnews = $_POST["edtcollege"];

    $colimg = $_FILES["colimage"];
    $colimgName = $_FILES["colimage"]['name'];
    $colimgSize = $_FILES["colimage"]['size'];
    $colimgTmp = $_FILES["colimage"]['tmp_name'];
    $colimgType = $_FILES["colimage"]['type'];
    $colimgError = $_FILES["colimage"]['error'];
    $colimgExt = explode('.', $colimgName);
    $colimgActualExt = strtolower(end($colimgExt));
    $allowed = array('jpg', 'jpeg', 'png');
        if(in_array($colimgActualExt, $allowed)){
            if($colimgError === 0){
                if($colimgSize < 1000000000000){
                    $colimgNew = uniqid('', true).".".$colimgActualExt;
                    $fileDestination = 'ColNewsImages/'.$colimgNew;
                    move_uploaded_file($colimgTmp, $fileDestination);
                }   else{
                    echo"<script> alert('File is too big!') </script>";
                }
            } else{
                echo"<script> alert('There was an error while uploading your image.') </script>";
            }
        } 
    

    //EVENTS
    $eventtitle = $_POST["eventtitle"];
    $eventcontent = $_POST["eventcontent"];
    $eventnews = $_POST["evntcollege"];

    $eventimg = $_FILES["eventimage"];
    $eventimgName = $_FILES["eventimage"]['name'];
    $eventimgSize = $_FILES["eventimage"]['size'];
    $eventimgTmp = $_FILES["eventimage"]['tmp_name'];
    $eventimgType = $_FILES["eventimage"]['type'];
    $eventimgError = $_FILES["eventimage"]['error'];
    $eventimgExt = explode('.', $eventimgName);
    $eventimgActualExt = strtolower(end($eventimgExt));
        if(in_array($eventimgActualExt, $allowed)){
            if($eventimgError === 0){
                if($eventimgSize < 1000000000000){
                    $eventimgNew = uniqid('', true).".".$eventimgActualExt;
                    $fileDestination = 'ColNewsImages/'.$eventimgNew;
                    move_uploaded_file($eventimgTmp, $fileDestination);
                }   else{
                    echo"<script> alert('File is too big!') </script>";
                }
            } else{
                echo"<script> alert('There was an error while uploading your image.') </script>";
            }
        }  
    

    //STUDENT GOVERNMENT
    $stutitle = $_POST["stutitle"];
    $stucontent = $_POST["stucontent"];
    $studate = $_POST["studate"];

    $stuimg = $_FILES["stuimage"];
    $stuimgName = $_FILES["stuimage"]['name'];
    $stuimgSize = $_FILES["stuimage"]['size'];
    $stuimgTmp = $_FILES["stuimage"]['tmp_name'];
    $stuimgType = $_FILES["stuimage"]['type'];
    $stuimgError = $_FILES["stuimage"]['error'];
    $stuimgExt = explode('.', $stuimgName);
    $stuimgActualExt = strtolower(end($stuimgExt));
    if(in_array($stuimgActualExt, $allowed)){
        if($stuimgError === 0){
            if($stuimgSize < 1000000000000){
                $stuimgNew = uniqid('', true).".".$stuimgActualExt;
                $fileDestination = 'ColNewsImages/'.$stuimgNew;
                move_uploaded_file($stuimgTmp, $fileDestination);
            }   else{
                echo"<script> alert('File is too big!') </script>";
            }
        } else{
            echo"<script> alert('There was an error while uploading your image.') </script>";
        }
    }

    //GALLERY
     $gallerytitle = $_POST["gallerytitle"];
     $gallerydate = $_POST["gallerydate"];
     include  "MultipleImage.php";

    //ORGANIZATIONS
    $orgtitle = $_POST["orgtitle"];
    $orgdate = $_POST["orgdate"];
    $orgcontent = $_POST["orgcontent"];
    $orgnews = $_POST["edtorg"];

    $orgimg = $_FILES["orgimage"];
    $orgimgName = $_FILES["orgimage"]['name'];
    $orgimgSize = $_FILES["orgimage"]['size'];
    $orgimgTmp = $_FILES["orgimage"]['tmp_name'];
    $orgimgType = $_FILES["orgimage"]['type'];
    $orgimgError = $_FILES["orgimage"]['error'];
    $orgimgExt = explode('.', $orgimgName);
    $orgimgActualExt = strtolower(end($orgimgExt));
        if(in_array($orgimgActualExt, $allowed)){
            if($orgimgError === 0){
                if($orgimgSize < 1000000000000){
                    $orgimgNew = uniqid('', true).".".$orgimgActualExt;
                    $fileDestination = 'ColNewsImages/'.$orgimgNew;
                    move_uploaded_file($orgimgTmp, $fileDestination);
                }   else{
                    echo"<script> alert('File is too big!') </script>";
                }
            } else{
                echo"<script> alert('There was an error while uploading your image.') </script>";
            }
        } 

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
    

    //COLLEGE NEWS
    if($colnews == "CICT"){
        if($coldate != "" && $colcontent != "" && $coltitle != ""){
        $colsql = "INSERT INTO tb_cictnews VALUES('', '$coltitle', '$coldate', '$colimgNew', '$colcontent')";
        mysqli_query($conn, $colsql);
        echo "
    <script>
        alert('Successfully Added');
        document.location.href = 'Homepage.php';
    </script>
    ";
        }
    }else if($colnews == "BLISS"){
        if($coldate != "" && $colcontent != ""){
        $colsql = "INSERT INTO tb_citnews VALUES('', '$coltitle', '$coldate', '$colimgNew', '$colcontent')";
        mysqli_query($conn, $colsql);  
        echo "
    <script>
        alert('Successfully Added');
        document.location.href = 'Homepage.php';
    </script>
    ";
        }
    }

    //EVENTS
    if($eventnews == "CICT"){
        if($eventcontent != "" && $eventtitle != ""){
        $eventsql = "INSERT INTO tb_cictevents VALUES('', '$eventtitle','$eventimgNew', '$eventcontent')";
        mysqli_query($conn, $eventsql);
        echo "
    <script>
        alert('Successfully Added');
        document.location.href = 'Homepage.php';
    </script>
    ";
        }
    }else if($eventnews == "BLISS"){
        if($eventcontent != "" && $eventtitle != "" ){
        $eventsql = "INSERT INTO tb_citevents VALUES('', '$eventtitle','$eventimgNew', '$eventcontent')";
        mysqli_query($conn, $eventsql);  
        echo "
    <script>
        alert('Successfully Added');
        document.location.href = 'Homepage.php';
    </script>
    ";
        }
    }

    //STUDENT GOVERNMENT
    if($studate != "" && $stucontent != "" && $stutitle != ""){
        $stusql = "INSERT INTO tb_stugov VALUES('', '$stutitle', '$studate', '$stuimgNew', '$stucontent')";
        mysqli_query($conn, $stusql);
        echo "
    <script>
        alert('Successfully Added');
        document.location.href = 'Homepage.php';
    </script>
    ";
    }

    //GALLERY
    if($gallerydate != ""&& $gallerytitle != ""){
        $gallerysql = "INSERT INTO tb_gallery VALUES('', '$gallerytitle', '$gallerydate', '$gallery1imgNew', '$gallery2imgNew', '$gallery3imgNew', '$gallery4imgNew', '$gallery5imgNew', '$gallery6imgNew')";
        mysqli_query($conn, $gallerysql);
        echo "
    <script>
        alert('Successfully Added');
        document.location.href = 'Homepage.php';
    </script>
    ";
    }

    //ORGANIZATIONS
    if($orgnews == "CICT"){
        if($orgdate != "" && $orgcontent != "" && $orgtitle != ""){
        $orgsql = "INSERT INTO tb_swits VALUES('', '$orgtitle', '$orgdate', '$orgimgNew', '$orgcontent')";
        mysqli_query($conn, $orgsql);
        echo "
    <script>
        alert('Successfully Added');
        document.location.href = 'Homepage.php';
    </script>
    ";
        }
    }else if($orgnews == "BLISS"){
        if($orgdate != "" && $orgcontent != ""){
        $orgsql = "INSERT INTO tb_act VALUES('', '$orgtitle', '$orgdate', '$orgimgNew', '$orgcontent')";
        mysqli_query($conn, $orgsql);  
        echo "
    <script>
        alert('Successfully Added');
        document.location.href = 'Homepage.php';
    </script>
    ";
        }
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
    <title>Admin Page</title>
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
    <form action="" class="" id="AdminForm" name="AdminForm" method="POST" autocomplete="off" enctype="multipart/form-data">
    <section class="edtsect">
        <!--ANNOUNCEMENT-->
        <div class="edtholder">
            <h1>Important Announcement</h1>
                <label for="announcement">Announcement: </label><br>
                <textarea  class="textfield" name="announcement" id="announcement" cols="30" rows="10"></textarea><br>
        </div>
        <!--COLLEGE NEWS-->
        <div class="edtholder">
                <h1>College News</h1>
                    <select class="select" name="edtcollege" id="edtcollege">
                        <option value="CICT">CICT</option>
                        <option value="BLISS">CIT</option>
                    </select><br>
                    <label for="coltitle">Title: </label><br>
                    <input class="field" type="text" name="coltitle" id="coltitle"  value=""><br>
                    <label for="coldate">Date: </label><br>
                    <input class="field" type="text" name="coldate" id="coldate"  value=""><br>
                    <label for="colcontent">Content: </label><br>
                    <textarea class="textfieldmini" name="colcontent" id="colcontent" cols="30" rows="10"></textarea><br>
                    <label for="colimage">Image: </label><br>
                    <input class="field" type="file" name="colimage" id="colimage" accept=".jpg, .jpeg, .png" value=""><br>
        </div>

        <!--EVENTS-->
        <div class="edtholder">
            <h1>Events</h1>
                <select class="select" name="evntcollege" id="evntcollege">
                    <option value="CICT">CICT</option>
                    <option value="BLISS">CIT</option>
                </select><br>
                <label for="eventtitle">Title: </label><br>
                <input class="field" type="text" name="eventtitle" id="eventtitle"  value=""><br>
                <label for="eventcontent">Content: </label><br>
                <textarea class="textfieldmini2" name="eventcontent" id="eventcontent" cols="30" rows="10"></textarea><br>
                <label for="eventimage">Image: </label><br>
                <input class="field" type="file" name="eventimage" id="eventimage" accept=".jpg, .jpeg, .png" value=""><br>
        </div>
    </section>
    <!--STUDENT-->
    <section class="edtsect">
        <div class="edtholder">
            <h1>Student Government</h1>
            <label for="stutitle">Title: </label><br>
                <input class="field" type="text" name="stutitle" id="stutitle"  value=""><br>
                <label for="studate">Date: </label><br>
                <input class="field" type="text" name="studate" id="studate"  value=""><br>
                <label for="stucontent">Content: </label><br>
                <textarea class="textfieldmini" name="stucontent" id="stucontent" cols="30" rows="10"></textarea><br>
                <label for="stuimage">Image: </label><br>
                <input class="field" type="file" name="stuimage" id="stuimage" accept=".jpg, .jpeg, .png" value=""><br>
        </div>
    <!--GALLERY-->
        <div class="edtholder">
            <h1>Gallery</h1>
            <label for="gallerytitle">Title: </label><br>
                <input class="field" type="text" name="gallerytitle" id="gallerytitle"  value=""><br>
                <label for="gallerydate">Date: </label><br>
                <input class="field" type="text" name="gallerydate" id="gallerydate"  value=""><br>
                <label for="galleryimage">1st Image: </label><br>
                <input class="field" type="file" name="gallery1image" id="gallery1image" accept=".jpg, .jpeg, .png" value=""><br>
                <label for="galleryimage">2nd Image: </label><br>
                <input class="field" type="file" name="gallery2image" id="gallery2image" accept=".jpg, .jpeg, .png" value=""><br>
                <label for="galleryimage">3rd Image: </label><br>
                <input class="field" type="file" name="gallery3image" id="gallery3image" accept=".jpg, .jpeg, .png" value=""><br>
                <label for="galleryimage">4th Image: </label><br>
                <input class="field" type="file" name="gallery4image" id="gallery4image" accept=".jpg, .jpeg, .png" value=""><br>
                <label for="galleryimage">5th Image: </label><br>
                <input class="field" type="file" name="gallery5image" id="gallery5image" accept=".jpg, .jpeg, .png" value=""><br>
                <label for="galleryimage">6th Image: </label><br>
                <input class="field" type="file" name="gallery6image" id="gallery6image" accept=".jpg, .jpeg, .png" value=""><br>

        </div>
        <div class="edtholder">
            <h1>Organizations</h1>
                <select class="select" name="edtorg" id="edtorg">
                    <option value="CICT">SWITS</option>
                    <option value="BLISS">ASAPHIL</option>
                </select><br>
                <label for="orgtitle">Title: </label><br>
                <input class="field" type="text" name="orgtitle" id="orgtitle"  value=""><br>
                <label for="orgdate">Date: </label><br>
                <input class="field" type="text" name="orgdate" id="orgdate"  value=""><br>
                <label for="orgcontent">Content: </label><br>
                <textarea class="textfieldmini" name="orgcontent" id="orgcontent" cols="30" rows="10"></textarea><br>
                <label for="orgimage">Image: </label><br>
                <input class="field" type="file" name="orgimage" id="orgimage" accept=".jpg, .jpeg, .png" value=""><br>
        </div>
    </section>
    </form>
    <div class="submitholder">
    <input class="submit" form="AdminForm" type="submit" name="submit">
    </div>
    <footer>
        <div class="footer">
            <span>© 2017 Bulacan State University</span>
            <span>Maintained by System Analysis Development Group 1</span>
        </div>
    </footer>
 </body>
 </html>