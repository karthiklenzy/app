<?php
include_once ('../top.php');
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

if (isset($_GET['q'])) {
	$area_id = $_GET['q'];

	$getsubarea_array = array('cat_id' => $area_id);
	$getsubarea_query = $db->query("SELECT * FROM tbl_district_sub_area_new WHERE district_id = :cat_id", $getsubarea_array);
}
?>
<span><label>City</label></span>

<td>
	<select class="form-control" name="selectsubarea" required="required">
		<option value="" disabled="disabled" selected="selected">-- Select --</option>
		<?php for ($e=0; $e < count($getsubarea_query); $e++) { ?>
			<option name="district_sub_area" value="<?php echo $getsubarea_query[$e]['area_id']; ?>"><?php echo $getsubarea_query[$e]['area_name']; ?></option>
		<?php } ?>
	</select>
</td>
<td>&nbsp;</td>