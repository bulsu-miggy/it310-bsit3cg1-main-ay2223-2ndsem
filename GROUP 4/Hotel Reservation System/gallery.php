<?php 
session_start();

	include("connection.php");
	include("function.php");
    

	$user_data = check_login($con);

?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CA_Gecel Alcazar
</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/owl.carousel.min.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/magnific-popup.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/font-awesome.min.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/themify-icons.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/nice-select.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/flaticon.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/gijgo.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/animate.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/slicknav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
      <link rel="stylesheet" href="css/responsive.css">
<style>
.filterDiv {
  float: left;
  color: #ffffff;
  width: 250px;
  line-height: 200px;
  text-align: center;
  margin: 5px;
  display: none;
  background-size: cover;
}
.show {
  display: block;
}

.container {
    margin-top: 50px;
  overflow: hidden;
  width: 100%;
}
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: #0f91e7;
  cursor: pointer;
  border-radius: 1px;
  color: aliceblue;
  transition: .5s;
}

.btn:hover, button:hover {
  background-color: rgb(219, 131, 131);
}

.btn.active {
  background-color: #666;
  color: white;
}
button {
    background-color: #0d9eff;
    border: 0;
    margin-left: 10px;
}
.social{
    padding:1px;
}
.nav-item:hover{
  text-decoration: underline;
}
.linebutton{

}
a{
  color: #ffffff;
}
ul,li{
list-style-type:none;
}
</style>

<body id="page-top" style="background-image: url(images/background.jfif); background-size: cover;">
  <header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid p-0">
                <div class="row align-items-center no-gutters">
                    <div class="col-xl-5 col-lg-6">
                        <div class="main-menu  d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="index.php">home</a></li>
                                    <li><a href="rooms.php">rooms</a></li>
                                    <li><a href="gallery.php">gallery</a></li>
                                    <li><a href="about.php">About</a></li>
                                </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2">
                        
                        <div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-4 d-none d-lg-block">
                        <div class="book_room">
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-facebook-square"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="book_btn d-none d-lg-block">
                                <a href="rooms.php?page=list">Book Now!</a>
                                <a href="logout.php">log out</a>
                                </div>
                </div>
</header>

    <!-- gallery -->

    <div >
    <div style="width: 100;"><br><br><br><br><br><br></div>

<div id="myBtnContainer">
</div>
  <button class="btn active" onclick="filterSelection('all')"> Show all</button>
  <button class="btn" onclick="filterSelection('rooms')"> Rooms</button>
  <button class="btn" onclick="filterSelection('amenities')"> Amenities/Events</button>
  <button class="btn" onclick="filterSelection('bathroom')"> Bathrooms</button>
  <button class="btn" onclick="filterSelection('food')"> Food</button>
  <button class="btn" onclick="filterSelection('parkinglot')"> Parking lot</button>

</div>
<div class="container"> 
<div class="filterDiv bathroom" style="background-image: url(gallery/bath/bath1.jpeg)"><br></div>
<div class="filterDiv bathroom" style="background-image: url(gallery/bath/bath2.jpeg)"><br></div>
<div class="filterDiv bathroom" style="background-image: url(gallery/bath/bath3.jpg)"><br></div>
<div class="filterDiv bathroom" style="background-image: url(gallery/bath/bath4.jpg)"><br></div>
<div class="filterDiv bathroom" style="background-image: url(gallery/bath/bath5.jpeg)"><br></div>
<div class="filterDiv bathroom" style="background-image: url(gallery/bath/bath6.jpg)"><br></div>

<div class="filterDiv rooms" style="background-image: url(gallery/rooms/room\ \(1\).jfif)"><br></div>
<div class="filterDiv rooms" style="background-image: url(gallery/rooms/room\ \(1\).jpg)"><br></div>
<div class="filterDiv rooms" style="background-image: url(gallery/rooms/room\ \(2\).jfif)"><br></div>
<div class="filterDiv rooms" style="background-image: url(gallery/rooms/room\ \(2\).jpg)"><br></div>
<div class="filterDiv rooms" style="background-image: url(gallery/rooms/room\ \(3\).jfif)"><br></div>
<div class="filterDiv rooms" style="background-image: url(gallery/rooms/room\ \(3\).jpg)"><br></div>
<div class="filterDiv rooms" style="background-image: url(gallery/rooms/room\ \(4\).jpg)"><br></div>
<div class="filterDiv rooms" style="background-image: url(gallery/rooms/room\ \(5\).jpg)"><br></div>
<div class="filterDiv rooms" style="background-image: url(gallery/rooms/room\ \(6\).jpg)"><br></div>


<div class="filterDiv amenities" style="background-image: url(gallery/amenities/amenities\ \(10\).jpg)"><br></div>
<div class="filterDiv amenities" style="background-image: url(gallery/amenities/amenities\ \(9\).jpg)"><br></div>
<div class="filterDiv amenities" style="background-image: url(gallery/amenities/amenities\ \(8\).jpg)"><br></div>
<div class="filterDiv amenities" style="background-image: url(gallery/amenities/amenities\ \(7\).jpg)"><br></div>
<div class="filterDiv amenities" style="background-image: url(gallery/amenities/amenities\ \(6\).jpg)"><br></div>
<div class="filterDiv amenities" style="background-image: url(gallery/amenities/amenities\ \(5\).jpg)"><br></div>
<div class="filterDiv amenities" style="background-image: url(gallery/amenities/amenities\ \(4\).jpg)"><br></div>
<div class="filterDiv amenities" style="background-image: url(gallery/amenities/amenities\ \(3\).jpg)"><br></div>
<div class="filterDiv amenities" style="background-image: url(gallery/amenities/amenities\ \(2\).jpg)"><br></div>
<div class="filterDiv amenities" style="background-image: url(gallery/amenities/amenities\ \(1\).jpg)"><br></div>
<div class="filterDiv amenities" style="background-image: url(gallery/amenities/amenities\ \(11\).jpg)"><br></div>
<div class="filterDiv amenities" style="background-image: url(gallery/amenities/amenities\ \(12\).jpg)"><br></div>
<div class="filterDiv amenities" style="background-image: url(gallery/amenities/amenities\ \(13\).jpg)"><br></div>
<div class="filterDiv amenities" style="background-image: url(gallery/amenities/amenities\ \(14\).jpg)"><br></div>
<div class="filterDiv amenities" style="background-image: url(gallery/amenities/amenities\ \(15\).jpg)"><br></div>
<div class="filterDiv amenities" style="background-image: url(gallery/amenities/amenities\ \(16\).jpg)"><br></div>

<div class="filterDiv food" style="background-image: url(gallery/food/food\ \(1\).jpg)"><br></div>
<div class="filterDiv food" style="background-image: url(gallery/food/food\ \(2\).jpg)"><br></div>
<div class="filterDiv food" style="background-image: url(gallery/food/food\ \(3\).jpg)"><br></div>
<div class="filterDiv food" style="background-image: url(gallery/food/food\ \(7\).jpg)"><br></div>
<div class="filterDiv food" style="background-image: url(gallery/food/food\ \(8\).jpg)"><br></div>
<div class="filterDiv food" style="background-image: url(gallery/food/food\ \(9\).jpg)"><br></div>
<div class="filterDiv food" style="background-image: url(gallery/food/food\ \(10\).jpg)"><br></div>
<div class="filterDiv food" style="background-image: url(gallery/food/food\ \(11\).jpg)"><br></div>

<div class="filterDiv parkinglot" style="background-image: url(gallery/parking/1.jpg)"><br></div>
<div class="filterDiv parkinglot" style="background-image: url(gallery/parking/2.jfif)"><br></div>
</div>
</div>
<!-- gallery -->
   
  <!-- footer -->
  <footer class="footer" >
    <div class="footer_top"style="background: black; padding: 20px;">
        <div class="container">
            <div class="row"style="color: white;">
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Address
                        </h3>
                        <p class="footer_text" >  356KY. Queens Road, <br>Manila, Philippines</p>
                        <a href="https://www.google.com/maps/search/PH/@12.2622764,119.5764813,6z" target="_blank" class="line-button">Get Direction</a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                                Reservation
                        </h3>
                        <p class="footer_text" >+6395858691237 <br>
                            +063-5565-1253 <br>
                            genl.igry.ga@gmail.com</p>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-2">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                                Navigation
                        </h3>
                        <ul>
                            <li><a href="index2.php">home</a></li>
                            <li><a href="rooms.php">rooms</a></li>
                            <li><a href="gallery.php">gallery</a></li>
                            <li><a href="about.php">About</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                           Gallery
                        </h3>
                       <a href="gallery.php"> <img src="gallery/amenities/amenities (10).jpg" style="border-radius: 20px; width: 300px; margin-bottom: 20px;"></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- footer_end -->
<!-- JS here -->
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="js/vendor/jquery-1.12.4.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/ajax-form.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/scrollIt.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/nice-select.min.js"></script>
<script src="js/jquery.slicknav.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/gijgo.min.js"></script>

<!--contact js-->
<script src="js/contact.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>

<script src="js/main.js"></script>
<script>
  $('#datepicker').datepicker({
      iconsLibrary: 'fontawesome',
      icons: {
       rightIcon: '<span class="fa fa-caret-down"></span>'
   }
  });
  $('#datepicker2').datepicker({
      iconsLibrary: 'fontawesome',
      icons: {
       rightIcon: '<span class="fa fa-caret-down"></span>'
   }

  });
</script>


</body>

</html>
<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";


    
  });
}
</script>

</body>
</html>
