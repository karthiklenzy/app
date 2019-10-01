<?php
include_once DOC_ROOT.'classes/db_connection.php';

$get_pending_total_array = array('pendingstatus' => "0");
$get_pending_total_query = $db->query("SELECT count(product_id) FROM tbl_product WHERE product_status = :pendingstatus", $get_pending_total_array);
if ($get_pending_total_query) {
	$pendingmessages = $get_pending_total_query[0]['count(product_id)'];
}

include_once BACKEND_DOC_ROOT.'includes/auth.php';
include_once BACKEND_DOC_ROOT.'includes/head.php';
include_once BACKEND_DOC_ROOT.'includes/left_navigation.php';
include_once BACKEND_DOC_ROOT.'includes/notification_menu.php';
require_once($include_file);
include_once BACKEND_DOC_ROOT.'includes/footer.php';
?>
