<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

$getallcategories_query = $db->query("SELECT * FROM tbl_category");
$get_all_sub_categories_query = $db->query("SELECT * FROM tbl_sub_category");

// Catagory delete condition
if (isset($_GET['deletecatid'])) {
	$delete_category_id = filter_var($_GET['deletecatid']);
	$delete_array = array('delete_id' => $delete_category_id);
	$delete_sql = $db->query("DELETE FROM tbl_category WHERE category_id = :delete_id", $delete_array);
	$search_id = $db->query("SELECT category_id FROM tbl_sub_category WHERE category_id = :delete_id", $delete_array);

	if ($delete_sql) {

		if ($search_id) {
		// Deleting sub catagory
		$delete_sub_sql = $db->query("DELETE FROM tbl_sub_category WHERE category_id = :delete_id", $delete_array);
		}

		$successMessage = "Category successfully deleted..!";
		setcookie("cookieSuccessMessageAddCat", $successMessage, time() + (20 * 1), "/");
		header("Location:".BACKEND_PATH."categories");
	}
	else{
		$errorMessage = "Error in deleting catagory..!";
		setcookie("cookieErrorMessageAddCat", $errorMessage, time() + (20 * 1), "/");
		header("Location:".BACKEND_PATH."categories");
		
	}
}
// Sub catagory delete condition
if (isset($_GET['deletesubcatid'])) {
	$delete_sub_cat_id = filter_var($_GET['deletesubcatid']);
	$delete_sub_cat_array = array('delete_id' => $delete_sub_cat_id);
	$delete_sub_cat_sql = $db->query("DELETE FROM tbl_sub_category WHERE sub_category_id = :delete_id", $delete_sub_cat_array);

	if ($delete_sub_cat_sql) {
		$deactive_products = $db->query("UPDATE tbl_product SET product_status = 0 WHERE sub_category_id = :delete_id", $delete_sub_cat_array);
		$successMessage = "Sub category successfully deleted..!";
		setcookie("cookieSuccessMessageAddCat", $successMessage, time() + (20 * 1), "/");
		header("Location:".BACKEND_PATH."categories");
	}
	else {
		$errorMessage = "Error in deleting sub catagory..!";
		setcookie("cookieErrorMessageAddCat", $errorMessage, time() + (20 * 1), "/");
		header("Location:".BACKEND_PATH."categories");
	}
}

$include_file = BACKEND_DOC_ROOT.'pages/categories_page.php';
include_once BACKEND_DOC_ROOT.'template.php';
?>