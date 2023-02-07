<?php 
	include_once("include/navbar.php");
	cart();
	// check();
	include_once("db.php");

			if(isset($_SESSION['message'])){
				?>
				<div class="alert alert-info text-center">
					<?php echo $_SESSION['message']; ?>
				</div>
				<?php
				unset($_SESSION['message']);
			}

		
	if(isset($_SESSION['user'])&&$_SESSION['user']==1){
		header("Location:logout.php");
	}
	// echo $_SESSION['username'];
?>
<?php
		if(isset($_POST['login'])&& isset($_POST['user'])&& isset($_POST['pass'])){
		
		$username = stripslashes($_REQUEST['user']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['pass']);
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
			// sss

			foreach($_POST['indexes'] as $key){
				$sql="INSERT INTO `tbl_cart` (`id`, `food_id`, `food_quantity`, `user_id`,checker) VALUES 
				(NULL, '{$_SESSION["cart"][$key]}', '{$_POST["qty_".$key]}', '{$_SESSION["id"]}','{$_SESSION["id"]}{$_SESSION["cart"][$key]}')";
				if(mysqli_query($con,$sql)){
					// success("corr");
				}else{
					// error("mali");
				}
			}
			// ss
			unset($_SESSION['cart']);
			unset($_SESSION['qty_array']);
			unset($_SESSION['qty']);
			header("Refresh:0");
        } else {
            error('incorrect password');
        }
		}
		// if(isset($_POST['checkout']))
		// {
		// 	// print_r($arr);
		// 	// echo'<>';
		// 	// print_r($_POST);
		// 	// echo'</	pre>';
			

			// for($i=0; $i<sizeof($_POST['check_addons']); $i++)
			// {
			// 	// echo $_POST['id'][$i]." ";
			// 	// echo $_POST['qty_'.$i]." ";
			// 	// echo $_POST['food_id'][$i]."";
			// 	echo $_POST['check_addons'][$i]
			// 	."<br>";
			// }
			
		// }
	?>
	
	
<?php
if(isset($_SESSION['user'])&&$_SESSION['user']=='0'&& !isset($_POST['checkout'])&& !isset($_POST['confirmed']))
{
	include_once("view_cart-user.php");	
	if($checker==1)
	{
		echo'<a href="index.php" class="btn btn-primary" style="margin-right:2%;"><span class="glyphicon glyphicon-arrow-left"></span>Back</a>';
	}else{
		echo'<a href="index.php" class="btn btn-primary" style="margin-right:2%;"><span class="glyphicon glyphicon-arrow-left"></span>Back</a>';
		echo'<button type="submit" name="checkout" class="btn btn-success"><span class="glyphicon glyphicon-check"></span>Checkout</button> </form>' ;
		// echo'<input type="submit" name="checkout"></form>';	
	}
}else if(isset($_POST['checkout'])|| isset($_POST['confirmed']))
{
	if(isset($_POST['checkout']))
		{
		
			echo'<form method="POST" enctype="multipart/form-data">';
			for($i=0; $i<sizeof($_POST['id']); $i++)
			{
				// echo $_POST['id'][$i]." ";
				// echo $_POST['qty_'.$i]." ";
				// echo $_POST['food_id'][$i]
				// ."<br>";
				?>
				<input type="hidden" name="check_id[]" value="<?php echo $_POST['id'][$i]?>">
				<input type="hidden" name="check_quantity[]" value="<?php echo $_POST['qty_'.$i]?>">
				<input type="hidden" name="check_food_id[]" value="<?php echo $_POST['food_id'][$i]?>">
		
		
		<?php	} ?>
	<h1 style="color:white;text-align:center;margin-right:40%;margin-left:25%; margin-bottom:1%;">Checkout Form</h1>
	<h3 style="width: 40%; margin-right:25%;margin-left:25%;color:white; margin-bottom:1%;" >Kindly send to this if Payment Mode is Gcash:0917-1328-136 </h3>
	<input type="text" class="form-control" placeholder="Input Contact name" style="width: 40%; margin-right:25%;margin-left:25%; margin-bottom:1%;" name="check_name" >
	<input type="text" class="form-control" placeholder="Input Contact address" style="width: 40%; margin-left:25%; margin-bottom:1%;" name="check_address" >
	<input type="text" class="form-control" placeholder="Input Contact number" style="width: 40%; margin-left:25%; margin-bottom:1%;" name="check_contact" >
	<select class="form-control" style="width: 40%; margin-left:25%; margin-bottom:1%;" name="check_sel" id="select">
		<option selected value="">Mode of Payment</option>
		<option value="Gcash">Gcash</option>
		<option value="COD">Cash on Delivery</option>
	</select>
	<input type="file" id="sel_file" class="form-control" style="width: 40%; margin-left:25%; margin-bottom:1%;" name="check_img">
	<input type="submit" name="confirmed" class="btn btn-success" style="width: 40%; margin-left:25%; margin-bottom:1%;">
	</form>
			
	<?php	}
	?>
	
	<?php
	if(isset($_POST['confirmed']) && isset($_POST['check_name']) && isset($_POST['check_address']) && isset($_POST['check_contact']) && isset($_POST['check_sel']) && isset($_FILES['check_img']))
	{ //gcash payment
		$var1 = rand(1111,9999);  
		$var2 = rand(1111,9999); 
		$var3 = $var1.$var2; 
		$var3 = md5($var3);   
		$fnm = $_FILES["check_img"]["name"]; 
		$dst = "admin/all_images/".$var3.$fnm; 
		$dst_db = "all_images/".$var3.$fnm; 
		move_uploaded_file($_FILES["check_img"]["tmp_name"],$dst);
		$check_name = mysqli_real_escape_string($con, $_POST['check_name']);
		$check_address = mysqli_real_escape_string($con, $_POST['check_address']);
		$check_contact = mysqli_real_escape_string($con, $_POST['check_contact']);
		$check_sel = mysqli_real_escape_string($con, $_POST['check_sel']);
		$unique= md5(rand());
		$checker=0;
		$size=sizeof($_POST['check_food_id']);
		for($i=0; $i<$size; $i++)
			{
				$delete="DELETE FROM tbl_cart where id ='{$_POST['check_id'][$i]}'";
				$sql="INSERT INTO `checkout` (`checkout_id`, `checkout_name`, `checkout_address`,`check_contact`, `checkout_product_id`, `checkout_quantity`, `checkout_img`, `checkout_united_id`, `checkout_date`, `checkout_status`, `checkout_mode`, `checkout_user_id`) 
				VALUES 
				(NULL, '$check_name', '$check_address','$check_contact', '{$_POST['check_food_id'][$i]}', '{$_POST['check_quantity'][$i]}', '$dst_db', '$unique', current_timestamp(), '', '$check_sel','{$_SESSION['id']}')";
				if(mysqli_query($con,$sql)&&mysqli_query($con,$delete)){
					$checker++;
				}else{
					echo mysqli_error($con);
				}
			}
			if($checker==$size)
			{
				
				header("Location:view-orders.php");
			}else{
				
				// $_SESSION['message']="Erroror in checking out";
				// header("refresh:0");
			}
	}
	else if(isset($_POST['confirmed']) && !empty($_POST['check_name']) && !empty($_POST['check_address']) && !empty($_POST['check_contact']) && !empty($_POST['check_sel'])&&$_POST['check_sel']!='Gcash' && !isset($_POST['check_img']))
	{ //not gcash
		$check_name = mysqli_real_escape_string($con, $_POST['check_name']);
		$check_address = mysqli_real_escape_string($con, $_POST['check_address']);
		$check_contact = mysqli_real_escape_string($con, $_POST['check_contact']);
		$check_sel = mysqli_real_escape_string($con, $_POST['check_sel']);
		$unique= md5(rand());
		$checker=0;
		$size=sizeof($_POST['check_food_id']);
		for($i=0; $i<$size; $i++)
			{
				$delete="DELETE FROM tbl_cart where id ='{$_POST['check_id'][$i]}'";
				$sql="INSERT INTO `checkout` (`checkout_id`, `checkout_name`, `checkout_address`,`check_contact`, `checkout_product_id`, `checkout_quantity`, `checkout_img`, `checkout_united_id`, `checkout_date`, `checkout_status`, `checkout_mode`, `checkout_user_id`) 
				VALUES 
				(NULL, '$check_name', '$check_address','$check_contact', '{$_POST['check_food_id'][$i]}', '{$_POST['check_quantity'][$i]}', '$dst_db', '$unique', current_timestamp(), '', '$check_sel','{$_SESSION['id']}')";
				if(mysqli_query($con,$sql)&&mysqli_query($con,$delete)){
					$checker++;
				}else{
					echo mysqli_error($con);
				}
			}
			if($checker==$size)
			{

				header("Location:view-orders.php");
			}else{
				
				// $_SESSION['message']="Erroror in checking out";
				// header("refresh:0");
			}
		// print_r($_POST);

	}else if(isset($_POST['confirmed'])) {
		$_SESSION['message']="Error in Checkout";
		header("refresh:0");
	}
	?>
	<!-- for selecting payment mode -->
	<script>
		$('#sel_file').hide();
		$("#select").change(function(){
		if($(this).val()==="Gcash")
		{
			$('#sel_file').show();
		}else{
			$('#sel_file').hide();
		}
		});
	</script>

<?php 
}

else{
	include_once("view_cart-non-user.php");	
	echo'<a href="index.php" class="btn btn-primary" style="margin-right:2%;"><span class="glyphicon glyphicon-arrow-left"></span>Back</a>';
	echo'<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-check"></span>Checkout</button>
	';
}
?>
		</div>
	</div>
</div>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Login</h4>
      </div>
      <div class="modal-body">
        <input type="text" name="user" class="form-control" placeholder="Input Username" style="margin-bottom: 2%;" required>
		<input type="password" name="pass" class="form-control" placeholder="Input Password" required>
      </div>
      <div class="modal-footer">
		<button type="submit" name="login" class="btn btn-success">Login</button>
			
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
      </div>
	  </form>
    </div>
	
  </div>
</div>
</body>
</html>