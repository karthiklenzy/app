<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

$review_ads_query = $db->query("SELECT * FROM tbl_product_review ORDER BY review_date DESC");
// delete coments
if (isset($_GET['deleteid'])) {
	$delete_id = filter_var($_GET['deleteid'], FILTER_SANITIZE_STRING);
	$delete_array = array('deleteid' => $delete_id);
	$delete_query = $db->query("DELETE FROM tbl_product_review WHERE review_id = :deleteid", $delete_array);

	if ($delete_query) {
		$successMessage = "Deleted Successfully";
		setcookie("SuccessMessage", $successMessage, time() + (5 * 1), "/");
		header("Location:".BACKEND_PATH."review");
	}
	else {
		$errorMessage = "Error on deleting";
		setcookie("ErrorMessage", $errorMessage, time() + (5 * 1), "/");
		header("Location:".BACKEND_PATH."review");
	}

}
// Status update
if (isset($_GET['reviewid']) && isset($_GET['reviewstatus'])) {
	$review_id = filter_var($_GET['reviewid'], FILTER_SANITIZE_STRING);
	$review_status = filter_var($_GET['reviewstatus'], FILTER_SANITIZE_STRING);
	if ($review_status == 1) {
		$review_update_status = "0";
	}
	else {
		$review_update_status = "1";
	}
	$review_array = array('reviewid' => $review_id, 'reviewstatus' => $review_update_status);
	$review_query = $db->query("UPDATE tbl_product_review SET review_status = :reviewstatus WHERE review_id = :reviewid", $review_array);
	
	if ($review_query) {
		$successMessage = "Update Successfully";
		setcookie("SuccessMessage", $successMessage, time() + (5 * 1), "/");
		header("Location:".BACKEND_PATH."review");
	}
	else {
		$errorMessage = "Error on updating";
		setcookie("ErrorMessage", $errorMessage, time() + (5 * 1), "/");
		header("Location:".BACKEND_PATH."review");
	}

}

$include_file = BACKEND_DOC_ROOT.'pages/review_page.php';
include_once BACKEND_DOC_ROOT.'template.php';
?>