<?php
	session_start();
?>
<?php include_once("include/navbar.php")?>
<?php include_once("../db.php"); ?>
<link rel="stylesheet" href="css/admin.css">
	<h1 class="page-header text-center" style="color:#fff;">Admin Dashboard</h1>
	<div class="container">
		<div class="row card-con" style="color:#fff;">
			<div class="col-md-4">
			<a href="m-prod.php">	
			<div class="card" style="background-color:white;border:3px solid #0e4f53;">
					<p style="color:#0e4f53;font-size:25px;">Manage Products</p>
				</div>
			</a>
			</div>
			<div class="col-md-4">
		<a href="m-ord.php">
			<div class="card" style="background-color:white;border:3px solid #0e4f53;">
			<p style="color:#0e4f53;font-size:25px;">Manage Order</p>
				</div>
			</a>
			</div>
			<div class="col-md-4">
		<a href="m-user.php">
			<div class="card" style="background-color:white;border:3px solid #0e4f53;">
			<p style="color:#0e4f53;font-size:25px;">Manage Users</p>
				</div>
			</a>
			</div>
		</div>
		<div class="row card-con">
			<div class="col-md-4">
			<a href="m-adm.php">
			<div class="card" style="background-color:white;border:3px solid #0e4f53;">
				<p style="color:#0e4f53;font-size:25px;">Manage Admin</p>
				</div>
			</a>
			</div>
			<div class="col-md-4">
			<a href="m-rep.php">
			<div class="card" style="background-color:white;border:3px solid #0e4f53;">
				<p style="color:#0e4f53;font-size:25px;">Sales Report</p>
				</div>
			</a>
			</div>
			<div class="col-md-4">
			<a href="m-his.php">
				<div class="card" style="background-color:white;border:3px solid #0e4f53;">
					<p style="color:#0e4f53;font-size:25px;">Order History</p>
					</div>
				</div>
			</a>
		</div>

	</div>
</body>
</html>
