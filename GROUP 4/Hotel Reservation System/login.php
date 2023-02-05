<?php 

session_start();

	include("connection.php");
	include("function.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_email = $_POST['user_email'];
		$password = $_POST['password'];

		if(!empty($user_email) && !empty($password) && !is_numeric($user_email))
		{

			//read from database
			$query = "select * from guest where user_email = '$user_email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index2.php");
						die;
					}
				}
			}
			
			echo "wrong Email or password!";
		}else
		{
			echo "wrong Email or password!";
		}
	}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Login
        </title>
    </head>
    <link rel="stylesheet" href="css/CSS.css">
  
    <body style="font-family: sans-serif;color: #2b2b30;background-image:url(images/login-signup.jpeg);">

        <div style="color: aliceblue; text-align: end;">
        </div>
        <div style="width:100%"><br><br><br><br></div>
        <form method="post">
            <div style="background-color: #c59805; padding-top:1px;"><h1 style="text-align: center; padding-bottom:15px;">Log In</h1></div>
            <div class="container">
                <label for="Email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="user_email" required>
            
                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
                    
                <button type="submit">Login</button>
                <label>
                  <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
                <div style="text-align: right"><a href=signup.php style= "color: blue">Register here!</a></div>
              </div>
              </div>    
        </form> 

        <!--footer-->
        <div style="width:100%"><br><br><br><br></div>
        </div>
        <div style="color: aliceblue; text-align: center;">
        <div class="footer_navigation"> <a href="index.php">Home</a></div>
        <div class="footer_navigation"> <a href="roomsvisitors.html">Rooms </a></div>
        <div class="footer_navigation"> <a href="galleryvisitors.html">Gallery </a></div> 
        <div class="footer_navigation"> <a href="aboutvisitors.html">About Us </a></div> 
    </body>
</html>