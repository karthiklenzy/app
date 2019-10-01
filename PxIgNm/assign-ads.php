<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

if ((isset($_GET['selectassigneduser'])) && (isset($_GET['txtproductid']))) {
	$assigned_to = filter_var($_GET['selectassigneduser']);
	$product_id = filter_var($_GET['txtproductid']);
	$assigned_by = $_SESSION['cms_user_id'];

	if ((is_numeric($assigned_to)) && (is_numeric($product_id))) {
		$current_date_and_time = date("Y-m-d h:i:s");
		$assign_to_array = array('productid' => $product_id, 'assignedto' => $assigned_to, 'assignedby' => $assigned_by, 'assignedon' => $current_date_and_time);
		$assign_to_query = $db->query("INSERT INTO tbl_assign_product (product_id, assigned_to_cms_user_id, assigned_on, assigned_by_cms_user_id) VALUES (:productid, :assignedto, :assignedon, :assignedby)", $assign_to_array);

		if ($assign_to_query) {
			$successMessage = "Product assigned successfully..!";
			setcookie("cookieSuccessProductResponse", $successMessage, time() + (20 * 1), "/"); // 1 minute
			header("Location:".BACKEND_PATH."unassigned-ads");
		}
	}
	else{
		header("Location:".BACKEND_PATH."pending-ads");
	}
}
else{
	header("Location:".BACKEND_PATH."pending-ads");
}

?>