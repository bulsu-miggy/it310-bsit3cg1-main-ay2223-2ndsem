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
    //GALLERY
    $gallerytitle = $_POST["gallerytitle"];
    $gallerydate = $_POST["gallerydate"];
    include  "MultipleImage.php";
    //GALLERY
    if($gallerydate != ""&& $gallerytitle != ""){
        $gallerysql = "INSERT INTO tb_gallery VALUES('', '$gallerytitle', '$gallerydate', '$gallery1imgNew', '$gallery2imgNew', '$gallery3imgNew', '$gallery4imgNew', '$gallery5imgNew', '$gallery6imgNew')";
        mysqli_query($conn, $gallerysql);
        echo "
    <script>
        alert('Successfully Added');
        document.location.href = 'Gallery.php';
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
    <title>Gallery</title>
    
    <script>
        function validate(form){
            if(!valid){   
                event.preventDefault();
                } else{
                alert("Record deleted.")
                <?php
                $buttonid1 = $_POST['delete1'];
                $sqldel1 = "DELETE FROM tb_gallery WHERE id = $buttonid1";
                mysqli_query($conn, $sqldel1);
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
    <section>
    <div class="edittop3">
    <!--COLLEGE NEWS-->
        <button class="edit" id="edtcontent" name="edtcontent" onclick="editfunc()" value="Edit">Add Collection</button>
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
                                    document.getElementById("edtcontent").textContent = "Add Collection";
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
                                        <div class="merge">
                                        <label for="gallerytitle">Title: </label><br>
                                        <input class="field" type="text" name="gallerytitle" id="gallerytitle"  value=""><br>
                                        <label for="gallerydate">Date: </label><br>
                                        <input class="field" type="text" name="gallerydate" id="gallerydate"  value=""><br>
                                        
                                        <input class="submit" id="submitbutton" form="AdminForm" type="submit" name="submit">
                                        </div>  
                                    </div>
                            </div>
                </form>
            </div> 
    </div>
        <div class="galleryheader">
            <h1> <span>BulSU</span>  Gallery</h1>
            <form action="" method="POST">
            <input type="text" name="gallerysearch" placeholder="Search Event..." id="gallerysearch"onfocus="this.value=''">
            </form>
            <?php
	if(ISSET($_POST['gallerysearch'])){
		$keyword = $_POST['gallerysearch'];
        $query = mysqli_query($conn, "SELECT * FROM tb_gallery WHERE `title` LIKE '%$keyword%' ORDER BY `title`") or die();
		while($fetch = mysqli_fetch_array($query)){ ?>
            <script>
                    window.open("#<?php echo $fetch["title"] ?>", "_parent");
            </script>
       <?php }
    }
    ?>
        </div>
    </section>
    <section>
    <form action="" id="deleteform" method="POST" onsubmit="return confirm('Do you want to delete this record?')"></form>
                <?php
                $rows = mysqli_query($conn, "SELECT * FROM tb_gallery ORDER BY id DESC "); ?>
                <?php foreach($rows as $row) : ?>
            <div class="gallerycontenthead" id="<?php echo $row["title"] ?>">
                <h1><?php echo $row["title"] ?></h1>
                <h3><?php echo $row["date"] ?></h3>
                <button type="submit" class="delete1" form="deleteform" id="delete" name="delete1" value="<?php echo $row["id"] ?>">Delete</button>
            </div>
            <div class="galleryimagegrid">
                <div class="gallerygridholder">
                    <div class="gallerygrid">
                        <img src="ColNewsImages/<?php echo $row["image1"] ?>" alt="">
                    </div>
                    <div class="gallerygrid">
                        <img src="ColNewsImages/<?php echo $row["image2"] ?>" alt="">
                    </div>
                    <div class="gallerygrid">
                        <img src="ColNewsImages/<?php echo $row["image3"] ?>" alt="">
                    </div>
                    <div class="gallerygrid">
                        <img src="ColNewsImages/<?php echo $row["image4"] ?>" alt="">
                    </div>
                    <div class="gallerygrid">
                        <img src="ColNewsImages/<?php echo $row["image5"] ?>" alt="">
                    </div>
                    <div class="gallerygrid">
                        <img src="ColNewsImages/<?php echo $row["image6"] ?>" alt="">
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
    </section>

    <footer>
        <div class="footer">
            <span>© 2017 Bulacan State University</span>
            <span>Maintained by System Analysis Development Group 1</span>
        </div>
    </footer>
 </body>
 </html>