<?php
include_once ('../top.php');
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

if (isset($_GET['q'])) {
	$district_id = $_GET['q'];

	$getsubcategory_array = array('dis_id' => $district_id);
	$getsubcategory_query = $db->query("SELECT * FROM tbl_district_sub_area WHERE district_id = :dis_id", $getsubcategory_array);
}
?>
<span><label>City</label></span><span class="star"> *</span>

<td>
	<select class="form-control" name="selectdistrictsub" required="required">
		<option value="" disabled="disabled" selected="selected">-- Select --</option>
		<?php for ($e=0; $e < count($getsubcategory_query); $e++) { ?>
			<option value="<?php echo $getsubcategory_query[$e]['area_id']; ?>"><?php echo $getsubcategory_query[$e]['area_name']; ?></option>
		<?php } ?>
	</select>
</td>
<td>&nbsp;</td>