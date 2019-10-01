<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

if (isset($_GET['sub_cat_id'])) {
	$sub_cat_id = filter_var($_GET['sub_cat_id']);
	$get_subcat_details_array = array('subcatid' => $sub_cat_id);
	$get_subcat_details_query = $db->query("SELECT * FROM tbl_sub_category WHERE sub_category_id = :subcatid", $get_subcat_details_array);

	$get_additional_specc_query = $db->query("SELECT tbl_spec_type.spec_type_name FROM tbl_spec_type INNER JOIN tbl_spec_value WHERE  tbl_spec_type.spec_type_id = tbl_spec_value.spec_type_id AND tbl_spec_value.sub_category_id = :subcatid", $get_subcat_details_array);

	$get_price_margin_query = $db->query("SELECT price_scheme_amount FROM tbl_price_scheme WHERE sub_category_id = :subcatid", $get_subcat_details_array);
}
else{
	header("Location:".BACKEND_PATH."categories");
}

$include_file = BACKEND_DOC_ROOT.'pages/view_sub_category_page.php';
include_once BACKEND_DOC_ROOT.'template.php';
?>