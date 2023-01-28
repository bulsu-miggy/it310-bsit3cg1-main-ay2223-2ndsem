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
    
    //COLLEGE NEWS
    if($colnews == "CICT"){
        if($coldate != "" && $colcontent != "" && $coltitle != ""){
        $colsql = "INSERT INTO tb_cictnews VALUES('', '$coltitle', '$coldate', '$colimgNew', '$colcontent')";
        mysqli_query($conn, $colsql);
        echo "
    <script>
        alert('Successfully Added');
        document.location.href = 'CollegeNews.php';
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
        document.location.href = 'CollegeNews.php';
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
    <title>College News</title>
    
    <script>
        function collegechange(){
            var college = document.getElementById("college").value;
            if (college == "CICT"){
                document.getElementById("ColTitle").textContent = "COLLEGE OF INFORMATION AND COMMUNICATIONS TECHNOLOGY";
                document.getElementById("sec1").style.display = "block";
                document.getElementById("sec2").style.display = "none";
                
            } else if (college == "BLISS"){
                document.getElementById("ColTitle").textContent = "COLLEGE OF INDUSTRIAL TECHNOLOGY";
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
                $sqldel1 = "DELETE FROM tb_cictnews WHERE id = $buttonid1";
                mysqli_query($conn, $sqldel1);
                $sqldel2 = "DELETE FROM tb_citnews WHERE id = $buttonid2";
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

    <div class="edittop">
    <!--COLLEGE NEWS-->
        <button class="edit" id="edtcontent" name="edtcontent" onclick="editfunc()" value="Edit">Add News</button>
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
                                    document.getElementById("edtcontent").textContent = "Add News";
                                    document.getElementById("edtcontent").value = "Edit";
                                }
                                
                            }
                        </script>
            <div class="editable">
                <form action="" class="" id="AdminForm" name="AdminForm" method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="edtholder" id="edtholder">
                                    <h1>College News</h1>
                                    <div class="edtholdercont">
                                        <div class="merge">
                                            <select class="select" name="edtcollege" id="edtcollege">
                                                <option value="CICT">CICT</option>
                                                <option value="BLISS">CIT</option>
                                            </select><br>
                                            <label for="coltitle">Title: </label><br>
                                            <input class="field" type="text" name="coltitle" id="coltitle"  value=""><br>
                                            <label for="coldate">Date: </label><br>
                                            <input class="field" type="text" name="coldate" id="coldate"  value=""><br>
                                            <label for="colimage">Image: </label><br>
                                            <input class="field" type="file" name="colimage" id="colimage" accept=".jpg, .jpeg, .png" value=""><br>
                                        </div>
                                        <div class="merge">
                                        <label for="colcontent">Content: </label><br>
                                        <textarea class="textfieldmini" name="colcontent" id="colcontent" cols="30" rows="10"></textarea><br>
                                        <input class="submit" id="submitbutton" form="AdminForm" type="submit" name="submit">
                                        </div>  
                                    </div>
                            </div>
                </form>
            </div> 
    </div>
    <section class="Title">
        <div class="stubg">
            <div class="Govheader">
                <h1 class="htitle" id="ColTitle">COLLEGE OF INFORMATION AND COMMUNICATIONS TECHNOLOGY</h1>
                <form action="" method="POST">
                <select class="colselect" name="college" id="college" onchange="collegechange()">
                    <option value="CICT">CICT</option>
                    <option value="BLISS">CIT</option>
                </select> 
                </form>
            </div> 
        </div>
    </section>
    
    <section class="Stucontent" id="sec1">
        <div class="Stunews">
            <div class="innerstunews">
                <?php
                $latest = mysqli_query($conn, "SELECT * FROM tb_cictnews ORDER BY id DESC"); 
                $lates1 = mysqli_fetch_assoc($latest)?>
                <h1 class="latestnewstitle"><span >LATEST</span> NEWS</h1>
                <div class="titleimage" >
                    <div class="titledate">
                        <h1><?php echo $lates1["title"] ?></h1>
                        <h3><?php echo $lates1["date"] ?></h3>
                    </div>
                    <a href=""><img src="ColNewsImages/<?php echo $lates1["image"] ?>" alt=""></a>
                </div>
                <p><?php echo $lates1["content"] ?></p>
            </div>
        </div>
        <div class="toplinks">
            <h1><span>Top </span>Links</h1>
            <ul>
                <?php $titlerow = mysqli_query($conn, "SELECT * FROM tb_cictnews ORDER BY id DESC");?>
                <?php  $place = 0; ?>
                <?php foreach($titlerow as $title) : ?>
                    <?php $place++; ?>
                    <?php  if($place <= 4){ ?>
                    <li><span><?php echo $place ?>. </span><a href=""><?php echo $title["title"] ?></a><p><?php echo $title["content"] ?></p></li>
                <?php } endforeach; ?>
            </ul>
        </div>

        <form action="" method="POST" id="deleteform" onsubmit="return confirm('Do you want to delete this record?')"></form>                
        <div class="newstabletitle">
            <h1 class="TableTitle"><span>All</span> News</h1> 
        </div>
        <div class="tableholder">
            <div class="newstable">
                <?php
                $rows = mysqli_query($conn, "SELECT * FROM tb_cictnews ORDER BY id DESC "); ?>
                <?php foreach($rows as $row) : ?>
                <div class="tablenews">
                    <img src="ColNewsImages/<?php echo $row["image"] ?>" alt="Collge News Image">
                    <div class="colnewscontent" style="width: 100%;">
                        <div class="toppart">
                        <p class="colnewsdate"><?php echo $row["date"] ?></p> 
                        <button type="submit" form="deleteform" class="delete1" id="delete" name="delete1" value="<?php echo $row["id"] ?>">Delete</button>
                        </div>
                        <p class="colnewstitle"><?php echo $row["title"] ?></p>
                        <p class="colnewscontent"><?php echo $row["content"] ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="Stucontent2" id="sec2">
        <div class="Stunews">
            <div class="innerstunews">
                <?php
                $latest = mysqli_query($conn, "SELECT * FROM tb_citnews ORDER BY id DESC"); 
                $lates1 = mysqli_fetch_assoc($latest)?>
                <h1 class="latestnewstitle"><span >LATEST</span> NEWS</h1>
                <div class="titleimage">
                    <div class="titledate">
                        <h1><?php echo $lates1["title"] ?></h1>
                        <h3><?php echo $lates1["date"] ?></h3>
                    </div>
                    <a href=""><img src="ColNewsImages/<?php echo $lates1["image"] ?>" alt=""></a>
                </div>
                <p><?php echo $lates1["content"] ?></p>
            </div>
        </div>
        <div class="toplinks">
            <h1><span>Top </span>Links</h1>
            <ul>
            <?php $titlerow = mysqli_query($conn, "SELECT * FROM tb_citnews ORDER BY id DESC");?>
                <?php  $place = 0; ?>
                <?php foreach($titlerow as $title) : ?>
                    <?php $place++; ?>
                    <?php  if($place <= 4){ ?>
                    <li><span><?php echo $place ?>. </span><a href=""><?php echo $title["title"] ?></a><p><?php echo $title["content"] ?></p></li>
                <?php } endforeach; ?>
            </ul>
        </div>
        <div class="newstabletitle">
            <h1 class="TableTitle"><span>All</span> News</h1>
        </div>
        
        <div class="tableholder">
            <div class="newstable">
                <?php
                $rows = mysqli_query($conn, "SELECT * FROM tb_citnews ORDER BY id DESC "); ?>
                <?php foreach($rows as $row) : ?>
                <div class="tablenews">
                    <img src="ColNewsImages/<?php echo $row["image"] ?>" alt="Collge News Image">
                    <div class="colnewscontent" style="width: 100%;">
                        <div class="toppart">
                        <p class="colnewsdate"><?php echo $row["date"] ?></p> 
                        <button type="submit" form="deleteform" class="delete2" id="delete" name="delete2" value="<?php echo $row["id"] ?>">Delete</button>
                        </div>
                        <p class="colnewstitle"><?php echo $row["title"] ?></p>
                        <p class="colnewscontent"><?php echo $row["content"] ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
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