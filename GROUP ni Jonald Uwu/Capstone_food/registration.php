<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
<title>JGP's Pancitan</title>
    <link rel="stylesheet" href="style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
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
  .form {
      margin: 10px auto;
      width: 300px;
      padding: 30px 25px;
      background-color: #ffffff;
	  border: none;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1), 0 8px 16px rgba(0, 0, 0, 0.1);

  }
  h1.login-title {
      color: black;
      margin: 0px auto 25px;
      font-size: 30px;
      font-weight: 600;
      text-align: center;
  }
  .login-input {
      width: 100%;
    margin: 5px 0;
    height: 45px;
    vertical-align: middle;
    font-size: 16px;
	border-color: #dddfe2;
  }
  .login-input:focus {
      border-color: #1877f2;
    box-shadow: 0 0 0 2px #e7f3ff;
  }
  .login-button {
      color: #fff;
      background:#0e4f53;
      border: 0;
      outline: 0;
      width: 100%;
      height: 50px;
      font-size: 16px;
      text-align: center;
      cursor: pointer;
      border-radius: 5px;
  }
  .link {
      color: black;
      font-size: 15px;
      text-align: center;
      margin-bottom: 0px;
  }
  .link a {
      color: black;
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
                echo '<a class="navbar-brand" style="color: white;" href="logout.php">Logout</a></li>';
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
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
		 $contact_num    = stripslashes($_REQUEST['contact_num']);
        $contact_num    = mysqli_real_escape_string($con, $contact_num);
		$address    = stripslashes($_REQUEST['address']);
        $address        = mysqli_real_escape_string($con, $address);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email,contact_num,address, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email','$contact_num','$address', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='view_cart.php'>continue</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
		<input type="text" class="login-input" name="contact_num" placeholder="Mobile Number">
		<input type="text" class="login-input" name="address" placeholder="Address">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link">Already have an account? <a href="login.php">Login here</a></p>
    </form>
<?php
    }
?>
<section class="footer">
<h4>&copy2022-2023 JGP's</h4>
</div>
</section>
</body>
</html>
