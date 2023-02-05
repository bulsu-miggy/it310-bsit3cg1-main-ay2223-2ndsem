<?php 
include('db_connect.php');
	$rid = '';

$calc_days = abs(strtotime($_GET['out']) - strtotime($_GET['in'])) ; 
 $calc_days =floor($calc_days / (60*60*24)  );
?>
<div class="container-fluid">
	
	<form action="" id="manage-check">
		<input type="hidden" name="cid" value="<?php echo isset($_GET['cid']) ? $_GET['cid']: '' ?>">
		<input type="hidden" name="rid" value="<?php echo isset($_GET['rid']) ? $_GET['rid']: '' ?>">

		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" Email="Email" id="Email" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control" value="<?php echo isset($meta['name']) ? $meta['name']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="contact">Contact #</label>
			<input type="text" name="contact" id="contact" class="form-control" value="<?php echo isset($meta['contact_no']) ? $meta['contact_no']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="date_in">Check-in Date</label>
			<input type="date" name="date_in" id="date_in" class="form-control" value="<?php echo isset($_GET['in']) ? date("Y-m-d",strtotime($_GET['in'])): date("Y-m-d") ?>" required readonly>
		</div>
		<div class="form-group">
			<label for="date_in_time">Check-in time</label>
			<input type="time" name="date_in_time" id="date_in_time" class="form-control" value="<?php echo isset($_GET['date_in']) ? date("H:i",strtotime($_GET['date_in'])): date("H:i") ?>" required>
		</div>
		<div class="form-group">
			<label for="days">Days of Stay</label>
			<input type="number" min ="1" name="days" id="days" class="form-control" value="<?php echo isset($_GET['in']) ? $calc_days: 1 ?>" required readonly>
		</div>
		<label for="Payment">Choose your preferred payment method:</label>
               <div> <select name="Payment" id="Payment" style="width: 100%;height: 50px;text-align: center; background: #f1b303;">
                    <option value="Payment Method">Select Payment Method</option>
                    <option value="Payment Center/ E-Wallet">Payment Center/ E-Wallet</option>
                    <option value="Debit Card">Debit Card</option>
                    <option value="Instapay">InstaPay</option>
                    <option value="Sameday">Same Day as Check In</option>
                </select></div>
                <br><br>
	</form>
</div>
<script>
	$('#manage-check').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'admin/ajax.php?action=save_book',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp >0){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
					end_load()
					$('.modal').modal('hide')
					},1500)
				}
			}
		})
	})
</script>