<!DOCTYPE html>
<html>
<body>
<form method="POST" action="index.php">

<input type="text"  placeholder="Search here..." name="keyword" required="required" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/>
<span class="input-group-btn">
<button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span></button>
</span>

</form>

<?php include 'search.php'?>
</body>