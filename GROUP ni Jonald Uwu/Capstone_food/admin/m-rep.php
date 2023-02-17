<?php
	session_start();
?>
<?php include_once("include/navbar.php")?>
<?php include_once("../db.php");

?>

	<h1 class="page-header text-center" style="color:white;">Sales Report</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
		<div class="content">
	<div class="container">
		<form method="POST">
		<div class="row">
			<div class="col-sm-3">
				<select name="select" id="" class="form-control  mt-2">
					<option value="">Select Sales</option>
					<option value="day">Sales Per Day</option>
					<option value="month">Sales Per Month</option>
					<option value="year">Sales Per Year</option>
				</select>
			</div>
			<div class="col-sm-2">
				<input type="submit" value="Check" name="Check" class="form-control mt-2">
			</div>
		</div>
		</<div>
			
		</div>
		</form>
	<table class="table bg-light mt-2 text-center">

	      </ul>
			<table class="table table-bordered text-center tble" >
				<thead>
					<th style="text-align:center;">Date</th>
					<!-- <th style="text-align:center;">Quantity</th> -->
					<th style="text-align:center;">Total Sales</th>
				</thead>
				<tbody>
		<?php 
	// include("perMonth.php")
	
	if(!empty($_POST["Check"])) {
	if($_POST['select']=='day') 
	{
		include("perday.php");
	}
	else if($_POST['select']=='month') 
	{
		include("permonth.php");
	}
	else if($_POST['select']=='year') 
	{
		include("peryear.php");
	}
	else {
		include("perday.php");
	}
	
}else {
	include("perday.php");
}?>