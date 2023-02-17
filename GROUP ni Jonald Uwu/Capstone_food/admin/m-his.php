<?php
	session_start();
?>
<?php include_once("include/navbar.php")?>
<?php include_once("../db.php");

?>

	<h1 class="page-header text-center"  style="color:white;">Order History</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
		
	      </ul>
			<table class="table table-bordered text-center tble">
				<thead>
					<th>Customer Name</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Payment</th>
					<th>Date</th>
					<th>Status</th>
				</thead>
				<tbody>
					
				<?php
					$select="SELECT a.*,SUM((b.price*a.checkout_quantity)) as total_price
					,SUM(a.checkout_quantity) as total_qty
					,b.price as prodprice,c.id as customer_id
					FROM `checkout` as a
					LEFT JOIN tbl_food as b
					ON a.checkout_product_id = b.id
					LEFT JOIN users as c
					ON a.checkout_user_id = c.id
					WHERE a.checkout_status='3' or a.checkout_status='4'
					GROUP BY checkout_united_id";

					$result = $con->query($select);

					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) { ?> 
					
				<tr>
					<td><?php echo $row["checkout_name"]; ?></td>
					<td><?php echo $row["total_qty"]; ?></td>
					<td><?php echo $row["total_price"]; ?>.00</td>
					<td><?php echo $row["checkout_mode"]; ?></td>
					<td><?php echo $row["checkout_date"]; ?></td>
					<td class="text-primary"><?php 
					if($row["checkout_status"]==3){
						echo"Delivered";
					} else if($row["checkout_status"]==4){
						echo "Canceled";
					}
					?></td>
					
					
				</tr>			
				<?php	
					}
					} else {
					echo "<tr><td colspan='10'>0 results</td></tr>";
					}
				?>
				
				</tbody>
			</table>
		</div>
	</div>

		<br><br>
	</body>
</html>
