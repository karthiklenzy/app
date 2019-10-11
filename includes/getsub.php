<?php
include_once ('../top.php');
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

if (isset($_GET['q'])) {
	$category_id = $_GET['q'];

	$getsubcategory_array = array('cat_id' => $category_id);
	$getsubcategory_query = $db->query("SELECT * FROM tbl_sub_category WHERE category_id = :cat_id", $getsubcategory_array);
}
?>
<td>Sub category :</td>

<td>
	<select class="form-control" name="selectproductsubcategory" required="required">
		<option value="" disabled="disabled" selected="selected">-- Select --</option>
		<?php for ($e=0; $e < count($getsubcategory_query); $e++) { ?>
			<option value="<?php echo $getsubcategory_query[$e]['sub_category_id']; ?>"><?php echo $getsubcategory_query[$e]['sub_category_name']; ?></option>
		<?php } ?>
	</select>
</td>
<td>&nbsp;</td>