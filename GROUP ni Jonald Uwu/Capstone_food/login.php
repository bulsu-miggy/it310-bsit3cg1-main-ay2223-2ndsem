<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
login();
// print_r($_SESSION['qty']);
?>
<!DOCTYPE html>
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
      font-weight: 300;
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
      background: #0e4f53;
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
    
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $query = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $rows = mysqli_num_rows($result);
        $row=$result->fetch_assoc();
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['user']=$row['user'];
            $_SESSION['id']=$row['id'];
            unset($_SESSION['cart']);
			unset($_SESSION['qty_array']);
			unset($_SESSION['qty']);
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>
  </form>
   <section class="footer">
<h4>&copy2022-2023 JGP's</h4>
</div>
</section>
<?php
    }
?>

</body>
</html>
