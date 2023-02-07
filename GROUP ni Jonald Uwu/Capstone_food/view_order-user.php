<h1 class="page-header text-center" style="color:white;">My Orders</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<?php
			if(isset($_SESSION['message'])){
				?>
				<div class="alert alert-info text-center">
					<?php echo $_SESSION['message']; ?>
				</div>
				<?php
				unset($_SESSION['message']);
			}

			?>
			<style>
				.tble .name,.tble .desc{
				width: 15%;
				}
				table{
					background-color:white;
				}
			</style>
			<form method="POST">
			<table class="table table-bordered tble">
				<thead>
					<th></th>
					<th class="name">Image</th>
					<th>Price</th>
					<th>Quantity</th>
				    <th>Status</th>
					<th>Subtotal</th>
					<th>Mode of Payment</th>
					
				</thead>
				<tbody>
					<?php
						//initialize total
						$total = 0;
						$index = 0;
						$checker=1;
 					
						$sql = "SELECT a.*,b.image_name,b.title,b.price
						FROM checkout as a
						LEFT JOIN tbl_food as b
						ON a.checkout_product_id = b.id
						WHERE a.checkout_user_id = '{$_SESSION['id']}'";

						$query = $con->query($sql);
							while($row = $query->fetch_assoc()){
								?>
								<tr><center>
									<td>
									<?php 
										if($row['checkout_status']==0){
											echo'
											<a href="delete_item.php?united_id='.$row["checkout_united_id"].'&index='.$index.'" class="btn btn-danger btn-sm">
											<span class="glyphicon glyphicon-trash"></span></a>';
										}
									?>
										
										
									</td>
									<td><img style="width: 100%;" src="admin/<?php echo $row['image_name'] ?>"  ></td>
									<td><?php echo number_format($row['price'], 2); ?></td>
									<input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
									<input type="hidden" name="food_id[<?php echo $index?>]" value="<?php echo $row['food_id']?>">
									<input type="hidden" name="id[<?php echo $index?>]" value="<?php echo $row['id']?>">
									<td>
									<?php echo $row['checkout_quantity'] ?>
										<!-- <input type="number" disabled min="1" class="form-control" value="<?php echo $row['checkout_quantity'] ?>" name="qty_<?php echo $index; ?>"> -->
									</td>
									<td>
										<?php 
										if($row['checkout_status']==0){
											echo "Pending";
										}else if($row['checkout_status']==1){
											echo "Preparing";
										}else if ($row['checkout_status']==2){
											echo "To received";
										}else if ($row['checkout_status']==3){
											echo "Delivered";
										}else if ($row['checkout_status']==4){
											echo "Canceled";
										}
										?>
									</td>
									<td>
										<?php echo number_format( $row['price'] *$row['checkout_quantity']); ?>
									</td>
									<td>
										<?php 
										if($row['checkout_mode']=='Gcash'){
											echo "Gcash";
										}else if($row['checkout_mode']=='Pick'){
											echo "Overthe counter/ Pick up";
										}else if ($row['checkout_mode']=='COD'){
											echo "Cash on Delivery";
										}
										?>
									</td>
									<?php $total +=  $row['price'] *$row['checkout_quantity']?>
									
								</center></tr>
								
								<?php
								$index ++;
								$checker++;
							}
						if($checker==1){
							?>
							<tr>
								<td colspan="11" class="text-center">You don't have orders yet</td>
							</tr>
							<?php
						}else{
							echo'<tr>
							<td colspan="7" align="right"><b>Total</b></td>
							<td><b>'.number_format($total, 2).'</b></td>
							</tr>
						';
						}

					?>


				</tbody>
			</table>
			