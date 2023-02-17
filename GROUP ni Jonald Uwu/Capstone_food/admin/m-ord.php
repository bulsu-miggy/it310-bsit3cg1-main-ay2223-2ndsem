<?php
	session_start();
?>
<?php include_once("include/navbar.php")?>
<?php include_once("../db.php");
?>
<style>
.sss:active{
	transform: scale(9.5);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}
</style>

	<h1 class="page-header text-center" style="color:white">Manage Orders</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
		
	      </ul>
			<table class="table table-bordered text-center tble">
				<thead>
					<th>Customer</th>
					<th>Product</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Payment</th>
					<th>Receipt Image</th>
					<th>Date</th>
					<th>Status</th>
					<th>Address</th>
					<th>Contact Number</th>
					<th>Action</th>
				</thead>
				<tbody>
					
				<?php
					$select="SELECT a.*,SUM((b.price*a.checkout_quantity)) as checkout_price, b.title as prodname, b.price as prodprice,SUM(a.checkout_quantity) as check_qty			
					FROM `checkout` as a
					LEFT JOIN tbl_food as b
					ON a.checkout_product_id = b.id
					LEFT JOIN users as c
					ON a.checkout_user_id = c.id
					WHERE a.checkout_status!='3' and a.checkout_status!='4'";
					//GROUP BY checkout_united_id";
					$result = $con->query($select);
					$result2 = $con->query($select);
					$cc=$result2->fetch_assoc();
					if ($result->num_rows > 0 && !is_null($cc["checkout_id"])) {
					// output data of each row
					while($row = $result->fetch_assoc()) { ?> 
					
				<tr>
					<td><?php echo $row["checkout_name"]; ?></td>
					<td><?php echo $row["prodname"]; ?></td>
					<td><?php echo $row["check_qty"]; ?></td>
					<td><?php echo $row["checkout_price"]?>.00</td>
					<td><?php echo $row["checkout_mode"]; ?></td>
					<td style="text-align: center;">
					<img class="sss" src="<?php echo $row["checkout_img"]; ?>"  style="width:20%;cursor:zoom-in "></td>

					<td style="width:15%"><?php echo $row["checkout_date"]; ?></td>
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
					<td><?php echo $row["checkout_address"]; ?></td>
					<td><?php echo $row["check_contact"]; ?></td>
					<td>
						<?php
						if($row['checkout_status']==0){
							echo'
							<a href="d-prod.php?delete_check='.$row["checkout_united_id"].'" class="btn btn-danger btn-sm">
							<span class="glyphicon glyphicon-trash"></span>
							</a>';
						}
						?>
						
						<button href="<?php echo $row['checkout_united_id'].'/'.$row['checkout_status']?>" class="btn btn-success zz btn-sm" data-toggle="modal" data-target="#exampleModal">
							<span class="glyphicon glyphicon-pencil"></span>
						</button>
					</td>
					
				</tr>			
				<?php	
					}
					} else {
					echo "<tr><td colspan='10'>0 results</td></tr>";
					}
				?>
				<script>
					$(".zz").click(function(){
					var data = $(this).attr('href');
					$("#update_id").val(data.split("/")[0]);
					$("#update_select").val(data.split("/")[1]);
					// $("select option[value='data.split("/")[1]']").attr("selected","selected");
				});
				</script>
				</tbody>
			</table>
		</div>
	</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form method="POST">
				<input type="hidden" class="form-control" id="update_id" value="" name="upd_united_id">
				<select class="form-control" id="update_select" value="" name="upd_sel" >
						<option value="0">Pending</option>
						<option value="1">Preparing</option>
						<option value="2">On the way</option>
						<option value="3">Delivered</option>
				</select>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="u-ord" class="btn btn-primary">Save changes</button>
			</form>
			<?php
				if(isset($_POST['u-ord'])){
					$sql="UPDATE `checkout` SET `checkout_status` = '{$_POST['upd_sel']}' WHERE `checkout`.`checkout_united_id` = '{$_POST['upd_united_id']}'";
					if(mysqli_query($con,$sql)){
						echo'
						<script>
						window.location.replace("m-ord.php");
						</script>
						';
					}
				}
			?>
      </div>
    </div>
  </div>
</div>

		<br><br>
	</body>
</html>
