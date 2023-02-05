<?php 
session_start();

	include("connection.php");
	include("function.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_email = $_POST['user_email'];
		$password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $number = $_POST['number'];

		if(!empty($user_email) && !empty($password) && !empty($firstname) && !empty($lastname) && !empty($number) && !is_numeric($user_email))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into guest (user_id, user_email, password, firstname, lastname, gender, number) values ('$user_id','$user_email','$password', '$firstname', '$lastname', '$gender', '$number')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information! ";
		}
	}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>
            REGISTRATION
        </title>
        <link rel="stylesheet" href="css/CSS.css">
    </head>

    <body style="font-family: sans-serif;color: #2b2b30;background-image:url(images/login-signup.jpeg);">

        <div style="color: aliceblue; text-align: end;">
        </div>

        <div style="width:100%"><br><br><br><br></div>

        <form method="post">

            <div style="background-color: #c59805; padding-top:2px;">
            
            <div style="background-color: #c59805; padding-top:1px;"><h1 style="text-align: center; padding-bottom:15px;">Sign Up!</h1></div>

            <div class="container" style= "background-color: white">
           
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter valid Email" name="user_email" id="text" required><br>

                <label for="firstname"><b>First Name</b></label>
                <input type="text" placeholder="Enter First Name" name="firstname" id="firstname" required><br>

                <label for="lastname"><b>Last Name</b></label>
                <input type="text" placeholder="Enter Last Name" name="lastname" id="lastname" required><br>
                
                <label for="number">Contact Number</label>
                <input type="text" placeholder="Enter Contact Number" name="number" id="number" required><br>

                <label for="gender">Gender</label>
                <div>
                <label for="male"></label> <input type="radio" name="gender" value="m" id="male"/> Male </label>  
                <label for="female"></label> <input type="radio" name="gender" value="f" id="female"/> Female </label>   
                <label for="others"></label> <input type="radio" name="gender" value="o" id="others"/> Others </label> 
                </div><br>

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" id="password" required>
                <button type="submit">Register Now</button>
                <a href="login.php" style="color: #0d9eff; text-align: end;"> Log in here! </a>
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



