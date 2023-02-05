<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include('header.php');
    include('admin/db_connect.php');
    include('function.php');
    include('connection.php');
    
      $user_data = check_login($con);

	$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach ($query as $key => $value) {
		if(!is_numeric($key))
			$_SESSION['setting_'.$key] = $value;
	}
    ?>
      <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <style>
    	header.masthead {
		  background: url(assets/img/<?php echo $_SESSION['setting_cover_img'] ?>);
		  background-repeat: no-repeat;
		  background-size: cover;
		}
    button{
      background-color:#009DFF;
    }
    a{
  color: #ffffff;
}
ul,li{
list-style-type:none;
}
    </style>
    
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
        <?php 
        $page = isset($_GET['page']) ?$_GET['page'] : "home";
        include $page.'.php';
        ?>
       

<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
        <footer class="footer" style="font-family:'Raleway', sans-serif;">
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
                            <li><a href="index2.php">Home</a></li>
                            <li><a href="rooms.php">Rooms</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="gallery.php">Gallery</a></li>
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
        
       <?php include('footer.php') ?>
    </body>

    <?php $conn->close() ?>

</html>
