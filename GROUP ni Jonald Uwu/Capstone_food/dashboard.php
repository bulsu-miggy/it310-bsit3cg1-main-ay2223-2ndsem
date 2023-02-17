<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
user();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
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
.form {
    margin: 175px auto;
    width: 400px;
    padding: 30px 25px;
    background:#fff;
    border-radius: 5px;
}
</style>
<body>
    <div class="form">
        <center> <?php echo "<h1>Welcome,</h2><h1 style='color:#0e4f53;font-size:50px;'>".$_SESSION['username']."</h1>"; ?>
       <p style="font-size:25px;"><a href="view_cart.php">Continue</a></p></center>
    </div>
</body>
</html>
