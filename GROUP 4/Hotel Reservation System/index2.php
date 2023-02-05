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
    <title>CA_Gecel Alcazar</title>
    

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
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>
    <style>
        .slider_bg_1 {
    background-image: url(homepage/img/banner/about_banner.png);
}
.slider_bg_2 {
    background-image: url(homepage/img/banner/banner2.png);
}
button {
    background-color: #1b92fe;
    border: 0;
    margin-left: 10px;
}
.social{
    padding:10px;
}

    </style>
<body id="page-top">
   <!-- Navigation-->
   <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-white">
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav" style=" background:black;);
">
        <div class="container"style=" margin-top: 0;">
            <a class="navbar-brand js-scroll-trigger" href="images/about/"></a>
            <div class="collapse navbar-collapse" id="navbarResponsive"style="font-family: 'Raleway', sans-serif;">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index2.php"style="color: white;">Home</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="rooms.php"style="color: white;">Rooms</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="Gallery.php"style="color: white;">Gallery</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="about.php"style="color: white;">About</a></li>
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <button><li class="nav-item1"><a class="nav-link js-scroll-trigger" href="rooms.php?page=list"style="color: white;">Book Now!</a></li></button>
                    <button><li class="nav-item1"><a class="nav-link js-scroll-trigger" href="logout.php"style="color: white;">Log out</a></li></button>
                </ul>
            </div>
        </div>
    </nav>
<!-- Content -->

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text text-center">
                                <h3>CA Gecel Alcazar</h3>
                                <p>Unlock to enjoy the view </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center justify-content-center slider_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text text-center">
                                <h3>Livin at your own FINEST</h3>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text text-center">
                                <h3>CA Gecel Alcazar</h3>
                                <p>Unlock to enjoy the view </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider  d-flex align-items-center justify-content-center slider_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text text-center">
                                <h3>Livin at your own FINEST</h3>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="about_info">
                        <div class="section_title mb-20px">
                            <span>About Us</span>
                            <h3>Welcome to Gecel Alcazar <br>
                                with Nature</h3>
                        </div>
                        <p>The hotel has the finest accommodations in Philippines,
			as well as an exciting new culinary and social scene and
			the city's largest and most comprehensive meeting and 
				event facilities</p>
                        <a href="about.php" class="line-button">Learn More</a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="about_thumb d-flex">
                        <div class="img_1">
                            <img src="images/about/about_1.png" alt="">
                        </div>
                        <div class="img_2">
                            <img src="images/about/about_2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end -->

    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/main.js"></script>




</body>

</html>