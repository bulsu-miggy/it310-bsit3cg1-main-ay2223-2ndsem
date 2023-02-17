<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>JGP's Pancitan</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
	.add input,.add select{
		margin-bottom: 1%;
		
	}
	.tble .name,.tble .desc{
		width: 15%;
	}
	table{
		background-color:white;
		
	}
 *{
margin:0;
padding:0;
 }
 body{
	 
	 width:100%;
	 background-image:linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)),url(../images/pancit.jpg);
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
</style>
</head>
<body>
<section class="header">
<nav>
<a href=""><img src="../images/jgplogo.png"></a>
<div class="nav-links" id="navLinks">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="../logout.php">Logout</a></li>';

</ul>
</div>
</nav>
