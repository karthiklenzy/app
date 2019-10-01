<?php
include_once '../../top.php';
if (isset($_GET['q'])) {
	$total_rows = $_GET['q'];
	$max_id = $_GET['maxid'];

	$next_item = $total_rows++;
	$next_item_id = $max_id++;
}
else{
	header("Location:".BACKEND_PATH."home");
}
?>
<input type="hidden" name="hiddentotalitems" value="<?php echo $next_item; ?>">
<div class="form-group">
	<input type="hidden" name="hiddenmenuitemid<?php echo $next_item_id; ?>" value="<?php echo $total_rows; ?>">
	<label for="exampleInputName2">Name : </label>
	<input type="text" name="txtmenuitem<?php echo $next_item; ?>" class="form-control" required>
</div>
<div class="form-group">
	<label for="exampleInputEmail2">URL : <span style="font-size: 14px; color: #9a9a9a;"><?php echo HTTP_PATH; ?></span></label>
	<input type="text" name="txtmenuitemlink<?php echo $next_item; ?>" class="form-control" required>
</div>
<div class="form-group">
	<label for="exampleInputEmail2">Order : </label>
	<input type="text" name="txtmenuitemorder<?php echo $next_item; ?>" class="form-control" required>
</div>