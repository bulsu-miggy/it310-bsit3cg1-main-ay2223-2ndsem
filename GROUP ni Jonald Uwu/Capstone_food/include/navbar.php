
<?php
      session_start();

    function Products()
    {

    ?>
        <!DOCTYPE html>
<html>
<head>
<title>JGP's Pancitan</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
<style>
*{
margin:0;
padding:0;
 }
 body{
	 
	 width:100%;
	 background-image:linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)),url(images/pancit.jpg);
	 background-position:center;
	 background-size:cover;
	 position:relative; 
 }
 .header{
	min-height:60vh;
	width:100%;
	position:relative; 
 }
 nav{
	 display:flex;
	 padding:2% 6%;
	 justify-content:space-between;
	 align-items:center;
 }
 nav img{
	 width:100px;
	 border:1px solid white;
	 border-radius:50%;
 }
 .nav-links{
	 flex:1;
	 text-align:right;
 }
 .nav-links ul li{
	  list-style:none;
	  display:inline-block;
	  padding:8px 12px;
	  position: relative;
 }
  .nav-links ul li a{
	  color:#fff;
	  text-decoration:none;
	  font-size:30px;
  }
   .nav-links ul li::after{
	   content:'';
	   width:0%;
	   height:2px;
	   background:#fff;
	   display:block;
	   margin:auto;
	   transition:0.5s;
   }
	.nav-links ul li:hover::after{
		width:100%;
	}
.text-box{
	width:90%;
	color:#fff;
	top:50%;
	left:50%;
transform: translate:(-50%,-50%);
   text-align:center;
}
.text-box h1{
	font-size:62px;
}
.text-box p{
	margin: 10px 0 40px;
	font-size:20px;
	color:#fff;
}
.picture{
	margin:50px;
  margin-top: 75px;
	float:left;
	width:405px;
  justify-content: center;
}
.picture img{
	width:90%;
	height:100;
	border-radius:15px;
  border-color: aquamarine;
  padding:15px;
}
.picture:hover{
	background:#f2f2f2;
	border-radius:15px;
  text-transform: uppercase;
}
.picture a{
	color:white;
	font-size:25px;
}
.picture a:hover{
	color:#0e4f53;
}
.desc{
	padding:15px;
	text-align:center;
	font-family:Arial;
	color:black;
}

</style>
</head>
<body>
<section class="header">
<nav>
<a href=""><img src="images/jgplogo.png"></a>
<div class="nav-links" id="navLinks">
<ul>
<li><a href="homepage.php">Home</a></li>
<li><a href="index.php">Product</a></li>
<li><a href="about.php">About</a></li>
  <?php if(isset($_SESSION['user']))
              {
                echo '<li><a href="view-orders.php">Orders</a></li>';
                echo '<li><a href="logout.php">Logout</a></li>';
              }else{
                echo'<li><a href="login.php">Login</a></li>';
              }
            ?>
</ul>
</div>
</nav>
<div class="text-box">
<h1>JGP's Online Ordering System</h1>
<p>Online Ordering System is for the convenience of the online audiences.<br/>  Customers are able to avail products through online method of purchase and payment.<br/> The online JGP's pancitan may continue serving its loyal customers from all over places even in distance with just few clicks.
</p>
</div>
</section>

    <?php 
    }
    ?>
    <?php 
    function homepage(){
        ?>
        <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>JGP's Pancitan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <style>
  *{
margin:0;
padding:0;
 }
 body{
	 
	 width:100%;
	 background-image:linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)),url(images/pancit.jpg);
	 background-position:center;
	 background-size:cover;
	 position:relative; 
 }
 .header{
	min-height:50vh;
	width:100%;
	position:relative; 
 }
 nav{
	 display:flex;
	 padding:2% 6%;
	 justify-content:space-between;
	 align-items:center;
 }
 nav img{
	 width:100px;
	 border:1px solid white;
	 border-radius:50%;
 }
 .nav-links{
	 flex:1;
	 text-align:right;
 }
 .nav-links ul li{
	  list-style:none;
	  display:inline-block;
	  padding:8px 12px;
	  position: relative;
	  
 }
  .nav-links ul li a{
	  color:#fff;
	  text-decoration:none;
	  font-size:30px;
  }
   .nav-links ul li::after{
	   content:'';
	   width:0%;
	   height:2px;
	   background:#fff;
	   display:block;
	   margin:auto;
	   transition:0.5s;
   }
	.nav-links ul li:hover::after{
		width:100%;
	}
.text-box{
	width:90%;
	color:#fff;
	top:50%;
	left:50%;
transform: translate:(-50%,-50%);
   text-align:center;
}
.text-box h1{
	font-size:62px;
}
.text-box p{
	margin: 10px 0 40px;
	font-size:20px;
	color:#fff;
}
.hero-btn{
	display:inline-block;
	text-decoration:none;
	color:#fff;
	border:1px solid #fff;
	padding: 12px 34px;
	font-size:13px;
	background:transparent;
	position:relative;
	cursor:pointer;
}
.hero-btn:hover{
	border:1px solid #fff;
	background:#0e4f53;
	transition:1s;
	color:#fff;
}
nav .fa{
	display:none;
}
h1{
	font-size:36px;
	font-weight:600;
}
p{
	color:#777;
	font-size:14px;
	font-weight:300;
	line-height:22px;
	padding;10px;
}
.row{
	margin-top:10%;
	display:flex;
	justify-content:space-between;
}
.footer{
	width:100%;
	text-align:center;
	padding:30px 0;
	background-color:#fff;
}
.footer h4{
	
	margin-bottom:25px;
	margin-top:20px;
	font-size: 25px;
	font-weight:600;
}
.cta{
	margin:100px auto;
	width:80%;
	background-image:linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)),url(images/pancit.jpg);
	background-position:center;
	background-size:cover;
	border-radius:10px;
	text-align:center;
	padding: 100px 0;
	border:3px solid #fff;
}
.cta h1{
	color:#fff;
	margin-bottom:40px;
	padding:0;
}
  </style>
  <body>
        <section class="header">
<nav>
<a href=""><img src="images/jgplogo.png"></a>
<div class="nav-links" id="navLinks">
<ul>
<li><a href="homepage.php">Home</a></li>
<li><a href="index.php">Product</a></li>
<li><a href="about.php">About</a></li>
  <?php if(isset($_SESSION['user']))
              {
                echo '<li><a href="view-orders.php">Orders</a></li>';
                echo '<li><a href="logout.php">Logout</a></li>';
              }else{
                echo'<li><a href="login.php">Login</a></li>';
              }
            ?>
</ul>
</div>
</nav>
<div class="text-box">
<h1>JGP's Online Ordering System</h1>
<p>Online Ordering System is for the convenience of the online audiences.<br/>  Customers are able to avail products through online method of purchase and payment.<br/> The online JGP's pancitan may continue serving its loyal customers from all over places even in distance with just few clicks.
</p>

</div>
</section>
        <?php
    }
   function about(){
      ?>
      <!DOCTYPE>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JGP's Pancitan</title>
    <link rel="stylesheet" href="bootstrap/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <style>
   *{
margin:0;
padding:0;
 }
 body{
	 
	 width:100%;
	 background-image:linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)),url(images/pancit.jpg);
	 background-position:center;
	 background-size:cover;
	 position:relative; 
 }
 .header{
	min-height:50vh;
	width:100%;
	position:relative; 
 }
 nav{
	 display:flex;
	 padding:2% 6%;
	 justify-content:space-between;
	 align-items:center;
 }
 nav img{
	 width:100px;
	 border:1px solid white;
	 border-radius:50%;
 }
 .nav-links{
	 flex:1;
	 text-align:right;
 }
 .nav-links ul li{
	  list-style:none;
	  display:inline-block;
	  padding:8px 12px;
	  position: relative;
 }
  .nav-links ul li a{
	  color:#fff;
	  text-decoration:none;
	  font-size:30px;
  }
   .nav-links ul li::after{
	   content:'';
	   width:0%;
	   height:2px;
	   background:#fff;
	   display:block;
	   margin:auto;
	   transition:0.5s;
   }
	.nav-links ul li:hover::after{
		width:100%;
	}
.text-box{
	width:90%;
	color:#fff;
	top:50%;
	left:50%;
transform: translate:(-50%,-50%);
   text-align:center;
}
.text-box h1{
	font-size:62px;
}
.text-box p{
	margin: 10px 0 40px;
	font-size:20px;
	color:#fff;
}
.about-1{
        margin: 30px;
        padding: 5px;
    }
    .about-1 h1{
        text-align: center;
        color: black;
        font-weight: bold;
    }
    .about-1 p{
        text-align: center;
        padding: 3px;
        color: #fff;
    }
    .about-item{
        margin-bottom: 20px;
        margin-top: 20px;
        background-color:#0e4f53;
        padding: 80px 30px;
        box-shadow: 0 0 9px rgba(0,0,0.6);
    }
    .about-item i{
        font-size: 43px;
        margin: 0;
		color:white;
    }
    .about-item h3{
        font-size: 25px;
        margin-bottom: 10px;
		color:white;
    }
	.about-item p{
		color:white;
	}
    .about-item hr{
        width: 46px;
        height: 3px;
        background-color: #5fbff9;
        margin: 0 auto;
        border: none;
        text-align: center;
    }
    .about-item:hover{
        background-color:#fff;
    }
    .about-item:hover i,
    .about-item:hover h3,
    .about-item:hover p{
        color: #000000;
    }
    .about-item:hover hr{
        background-color: #fff;
    }
    .about-item:hover i{
        transform: translateY(-20px);
    }
    .about-item:hover i,
    .about-item:hover h3,
    .about-item:hover hr{
        transition: all 400ms ease-in-out;
    }

   .footer{
	width:100%;
	text-align:center;
	padding:30px 0;
	background-color:#fff;
}

.course{
	width:100%;
	margin:auto;
	text-align:center;
	padding-top:10px;
	background-color:#0e4f5370;
}
.course-col{
	flex-basis:25%;
	border-radius;10px;
	margin-bottom:10%;
		padding-top:20px;
		padding-bottom:15px;
	box-sizing; border-box;
	color:white;
}

h1{
	font-size:50px;
	font-weight:600;
	color:white;
}
li{
	list-style:none;
}
p{
	color:white;
	font-size:14px;
	font-weight:300;
	line-height:22px;
	padding;10px;
}
.row{
	margin-top:5%;
	display:flex;
	justify-content:space-between;
}
.footer h4{
	
	margin-bottom:25px;
	margin-top:20px;
	font-size: 25px;
	font-weight:600;
}
.cta{
	margin:100px auto;
	width:80%;
	background-image:linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)),url(assets/img/acostabanner.jpg);
	background-position:center;
	background-size:cover;
	border-radius:10px;
	text-align:center;
	padding: 100px 0;
}
.cta h1{
	color:#fff;
	margin-bottom:40px;
	padding:0;
}
  </style>
  <body>
        <section class="header">
<nav>
<a href=""><img src="images/jgplogo.png"></a>
<div class="nav-links" id="navLinks">
<ul>
<li><a href="homepage.php">Home</a></li>
<li><a href="index.php">Product</a></li>
<li><a href="about.php">About</a></li>
  <?php if(isset($_SESSION['user']))
              {
                echo '<li><a href="view-orders.php">Orders</a></li>';
                echo '<li><a href="logout.php">Logout</a></li>';
              }else{
                echo'<li><a href="login.php">Login</a></li>';
              }
            ?>
</ul>
</div>
</nav>
<div class="text-box">
<h1>JGP's Online Ordering System</h1>
<p>Online Ordering System is for the convenience of the online audiences.<br/>  Customers are able to avail products through online method of purchase and payment.<br/> The online JGP's pancitan may continue serving its loyal customers from all over places even in distance with just few clicks.
</p>

</div>
</section>
   <?php }
   function cart(){ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<title>JGP's Pancitan</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
 *{
margin:0;
padding:0;
 }
 body{
	 
	 width:100%;
	 background-image:linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)),url(images/pancit.jpg);
	 background-position:center;
	 background-size:cover;
	 position:relative; 
 }
 .header{
	min-height:50vh;
	width:100%;
	position:relative; 
 }
 nav{
	 display:flex;
	 padding:2% 6%;
	 justify-content:space-between;
	 align-items:center;
 }
 nav img{
	 width:100px;
	 border:1px solid white;
	 border-radius:50%;
 }
 .nav-links{
	 flex:1;
	 text-align:right;
 }
 .nav-links ul li{
	  list-style:none;
	  display:inline-block;
	  padding:8px 12px;
	  position: relative;
 }
  .nav-links ul li a{
	  color:#fff;
	  text-decoration:none;
	  font-size:30px;
  }
   .nav-links ul li::after{
	   content:'';
	   width:0%;
	   height:2px;
	   background:#fff;
	   display:block;
	   margin:auto;
	   transition:0.5s;
   }
	.nav-links ul li:hover::after{
		width:100%;
	}
.text-box{
	width:90%;
	color:#fff;
	top:50%;
	left:50%;
transform: translate:(-50%,-50%);
   text-align:center;
}
.text-box h1{
	font-size:62px;
}
.text-box p{
	margin: 10px 0 40px;
	font-size:20px;
	color:#fff;
}
  .footer{
	width:100%;
	text-align:center;
	padding:30px 0;
	background-color:#fff;
}
.footer h4{
	
	margin-bottom:25px;
	margin-top:20px;
	font-size: 25px;
	font-weight:600;
}
</style>
<body>
<div>
<section class="header">
<nav>
<a href=""><img src="images/jgplogo.png"></a>
<div class="nav-links" id="navLinks">
<ul>
<li><a href="homepage.php">Home</a></li>
<li><a href="index.php">Product</a></li>
<li><a href="about.php">About</a></li>
  <?php if(isset($_SESSION['user']))
              {
                echo '<li><a href="view-orders.php">Orders</a>';
                echo '<li><a href="logout.php">Logout</a>';
              }else{
                echo'<li><a href="login.php">Login</a>';
              }
              ?>
</ul>
</div>
</nav>
<div class="text-box">
<h1>JGP's Online Ordering System</h1>
<p>Online Ordering System is for the convenience of the online audiences.<br/>  Customers are able to avail products through online method of purchase and payment.<br/> The online JGP's pancitan may continue serving its loyal customers from all over places even in distance with just few clicks.
</p>

</div>
</section>

<?php   }
function check(){
  echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';
}
function prod_list(){?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>JGP's Pancitan</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<style>
	*{
margin:0;
padding:0;
 }
 body{
	 
	 width:100%;
	 background-image:linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)),url(images/pancit.jpg);
	 background-position:center;
	 background-size:cover;
	 position:relative; 
 }
 .header{
	min-height:50vh;
	width:100%;
	position:relative; 
 }
 nav{
	 display:flex;
	 padding:2% 6%;
	 justify-content:space-between;
	 align-items:center;
 }
 nav img{
	 width:100px;
	 border:1px solid white;
	 border-radius:50%;
 }
 .nav-links{
	 flex:1;
	 text-align:right;
 }
 .nav-links ul li{
	  list-style:none;
	  display:inline-block;
	  padding:8px 12px;
	  position: relative;
 }
  .nav-links ul li a{
	  color:#fff;
	  text-decoration:none;
	  font-size:30px;
  }
   .nav-links ul li::after{
	   content:'';
	   width:0%;
	   height:2px;
	   background:#fff;
	   display:block;
	   margin:auto;
	   transition:0.5s;
   }
	.nav-links ul li:hover::after{
		width:100%;
	}
.text-box{
	width:90%;
	color:#fff;
	top:50%;
	left:50%;
transform: translate:(-50%,-50%);
   text-align:center;
}
.text-box h1{
	font-size:62px;
}
.text-box p{
	margin: 10px 0 40px;
	font-size:20px;
	color:#fff;
}
		.product_image{
			height:320px;
		}
		.product_name{
			height:80px;
			padding-left:20px;
			padding-right:20px;
		}
		.product_footer{
			padding-left:50px;
			padding-right:50px;
		}
		footer{
	background: black;
	padding: 20px;
}
footer p{
	color: #fff;
}
	</style>
</head>
<body>
<section class="header">
<nav>
<a href=""><img src="images/jgplogo.png"></a>
<div class="nav-links" id="navLinks">
<ul>
<li><a href="homepage.php">Home</a></li>
<li><a href="index.php">Product</a></li>
<li><a href="about.php">About</a></li>
  <?php if(isset($_SESSION['user']))
              {
                echo '<li><a href="view-orders.php">Orders</a>';
                echo '<li><a href="logout.php">Logout</a>';
              }else{
                echo'<li><a href="login.php">Login</a>';
              }
              ?>
</ul>
</div>
</nav>
<div class="text-box">
<h1>JGP's Online Ordering System</h1>
<p>Online Ordering System is for the convenience of the online audiences.<br/>  Customers are able to avail products through online method of purchase and payment.<br/> The online JGP's pancitan may continue serving its loyal customers from all over places even in distance with just few clicks.
</p>

</div>
</section>
<?php }
    ?>