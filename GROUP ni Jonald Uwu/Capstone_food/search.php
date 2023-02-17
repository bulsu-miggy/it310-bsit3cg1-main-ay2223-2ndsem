<?php
	if(ISSET($_POST['search'])){
		$keyword = $_POST['keyword'];
		

?>
<div>
	<h2 style="text-align:center;color:white;">Result</h2>
	
	<?php
		require 'db.php';
		$query = mysqli_query($con, "SELECT * FROM `tbl_food` WHERE `title` LIKE '%$keyword%' ORDER BY `title`") or die(mysqli_error());
		while($fetch = mysqli_fetch_array($query)){
	?>
	<div style="word-wrap:break-word;">
		<a href="add_cart.php?id=<?php echo $row['id']; ?>" style="text-align:center;color:white;"><h4 ><?php echo $fetch['title']?>&nbsp;<?php echo $fetch['title']?></h4></a>
	</div>
	<hr style="border-bottom:1px solid #ccc;"/>
	<?php
		}
	?>
</div>
<?php
	}
?>