<?php
include "connection.php";
session_start();


if(isset($_SESSION['User'])){?>
    <script type="text/JavaScript">
        window.onload = function() {
            document.getElementById("Lbutton").style.display = "none";
        document.getElementById("welcome").style.display = "inline";
        document.getElementById("edtcontent").style.display = "inline";
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

 <?php
if(isset($_POST["submit"])){
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
    $allowed = array('jpg', 'jpeg', 'png');
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

    //EVENTS
    if($eventnews == "CICT"){
        if($eventcontent != "" && $eventtitle != ""){
        $eventsql = "INSERT INTO tb_cictevents VALUES('', '$eventtitle','$eventimgNew', '$eventcontent')";
        mysqli_query($conn, $eventsql);
        echo "
    <script>
        alert('Successfully Added');
        document.location.href = 'Events.php';
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
        document.location.href = 'Events.php';
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
    <title>Events</title>

    <script>
        function collegechange(){
            var choice = document.getElementById("college").value;
            if (choice == 1){
                document.getElementById("ettitle").textContent = "CICT EVENT";
                document.getElementById("sec1").style.display = "block";
                document.getElementById("sec2").style.display = "none";
                
            } else if (choice == 2){
                document.getElementById("ettitle").textContent = "CIT EVENT";
                document.getElementById("sec1").style.display = "none";
                document.getElementById("sec2").style.display = "block";
            }
        }
    </script>
    <script>
        function validate(form){
            if(!valid){   
                event.preventDefault();
                } else{
                alert("Record deleted.")
                <?php
                $buttonid1 = $_POST['delete1'];
                $buttonid2 = $_POST['delete2'];
                $sqldel1 = "DELETE FROM tb_cictevents WHERE id = $buttonid1";
                mysqli_query($conn, $sqldel1);
                $sqldel2 = "DELETE FROM tb_citevents WHERE id = $buttonid2";
                mysqli_query($conn, $sqldel2);
                ?>
                
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

    
    <section class="main3">
    <form action="" id="deleteform" method="POST" onsubmit="return confirm('Do you want to delete this record?')"></form>
        <div class="Event">
                    <div class="edittop2">
                    <!--COLLEGE NEWS-->
                    <button class="edit" id="edtcontent" name="edtcontent" onclick="editfunc()" value="Edit">Add Event</button>
                                    <script>
                                        function editfunc(){
                                            var  trigger = document.getElementById("edtcontent").value;
                                            if(trigger == "Edit"){
                                                document.getElementById("edtholder").style.display = "inline-block";
                                                document.getElementById("AdminForm").style.display = "inline";
                                                document.getElementById("submitbutton").style.display = "inline";
                                                document.getElementById("edtcontent").textContent = "Close";
                                                document.getElementById("edtcontent").value = "Close";
                                            }else if(trigger == "Close"){
                                                document.getElementById("edtholder").style.display = "none";
                                                document.getElementById("AdminForm").style.display = "none";
                                                document.getElementById("submitbutton").style.display = "none";
                                                document.getElementById("edtcontent").textContent = "Add Event";
                                                document.getElementById("edtcontent").value = "Edit";
                                            }
                                            
                                        }
                                    </script>
                        <div class="editable2">
                            <form action="" class="" id="AdminForm" name="AdminForm" method="POST" autocomplete="off" enctype="multipart/form-data">
                                <div class="edtholder2" id="edtholder">
                                                <h1>College Events</h1>
                                                <div class="edtholdercont">
                                                    <div class="merge">
                                                    <select class="select" name="evntcollege" id="evntcollege">
                                                        <option value="CICT">CICT</option>
                                                        <option value="BLISS">CIT</option>
                                                    </select><br>
                                                    <label for="eventtitle">Title: </label><br>
                                                    <input class="field" type="text" name="eventtitle" id="eventtitle"  value=""><br>
                                                    <label for="eventcontent">Content: </label><br>
                                                    <textarea class="textfieldmini2" name="eventcontent" id="eventcontent" cols="30" rows="10"></textarea><br>
                                                    
                                                    </div>
                                                    <div class="merge">
                                                    <label for="eventimage">Image: </label><br>
                                                    <input class="field" type="file" name="eventimage" id="eventimage" accept=".jpg, .jpeg, .png" value=""><br>
                                                    <input class="submit" id="submitbutton" form="AdminForm" type="submit" name="submit">
                                                    </div>  
                                                </div>
                                        </div>
                            </form>
                        </div> 
                </div>
            <div class="eventtitle">
                <h1 id="ettitle">CICT EVENT</h1>
                <select class="colselect" name="college" id="college" onchange="collegechange()">
                    <option value="1">CICT</option>
                    <option value="2">CIT</option>
                </select> 
            </div>
            <!--CICT-->
            <section class="sec1" id="sec1">
                <?php
                $latest = mysqli_query($conn, "SELECT * FROM tb_cictevents ORDER BY id DESC"); 
                $lates1 = mysqli_fetch_assoc($latest)?>
                <div class="mainevent">
                    <a href=""><img src="ColNewsImages/<?php echo $lates1["image"] ?>" alt=""></a>
                    <h2><?php echo $lates1["title"] ?></h2>
                    <p><?php echo $lates1["content"] ?></p>
                </div>
                <div class="newstabletitle2">
                    <h1 class="EventTableTitle"><span>All</span> Events</h1>
                </div>
                    <div class="tableholder">
                    <div class="newstable">
                        <?php
                        $rows = mysqli_query($conn, "SELECT * FROM tb_cictevents ORDER BY id DESC "); ?>
                        <?php foreach($rows as $row) : ?>
                        <div class="tablenews">
                            <img src="ColNewsImages/<?php echo $row["image"] ?>" alt="Collge News Image">
                            <div class="colnewscontent" style="width: 100%;">
                            <div class="toppart">
                            <p class="colnewstitle"><?php echo $row["title"] ?></p>
                            <button type="submit" class="delete1" form="deleteform" id="delete" name="delete1" value="<?php echo $row["id"] ?>">Delete</button>  
                            </div>
                                <p class="colnewscontent2"><?php echo $row["content"] ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <!--CIT-->
            <section class="sec2" id="sec2">
                <?php
                $latest = mysqli_query($conn, "SELECT * FROM tb_citevents ORDER BY id DESC"); 
                $lates1 = mysqli_fetch_assoc($latest)?>
                <div class="mainevent">
                    <a href=""><img src="ColNewsImages/<?php echo $lates1["image"] ?>" alt=""></a>
                    <h2><?php echo $lates1["title"] ?></h2>
                    <p><?php echo $lates1["content"] ?></p>
                </div>
                <div class="newstabletitle2">
                    <h1 class="EventTableTitle"><span>All</span> Events</h1>
                </div>
                    <div class="tableholder">
                    <div class="newstable">
                        <?php
                        $rows = mysqli_query($conn, "SELECT * FROM tb_citevents ORDER BY id DESC "); ?>
                        <?php foreach($rows as $row) : ?>
                        <div class="tablenews">
                            <img src="ColNewsImages/<?php echo $row["image"] ?>" alt="Collge News Image">
                            <div class="colnewscontent" style="width: 100%;">
                                <div class="toppart">
                                <p class="colnewstitle"><?php echo $row["title"] ?></p>
                                <button type="submit" class="delete2" form="deleteform" id="delete" name="delete2" value="<?php echo $row["id"] ?>">Delete</button>
                                </div>
                                
                                <p class="colnewscontent"><?php echo $row["content"] ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            </div>
            <div class="buttonsection">
            <div class="ButtonGroup2">
                <div class="NavButton"><a href="StudentGov.php"><button>Student Government</button></a></div>
                <div class="NavButton"><a href="Organizations.php"><button>Organizations</button></a></div>
                <div class="NavButton"><a href="Faculty.php"><button>Faculty</button></a></div>
                <div class="NavButton"><a href="Gallery.php"><button>Gallery</button></a></div>
                <div class="NavButton"><a href="Weather.php"><button>Weather Advisory</button></a></div>
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