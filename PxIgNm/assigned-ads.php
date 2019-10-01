<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

if ($_SESSION['cms_user_status'] == 1) {
	$getallpendingads_array = array('approvedstatus' => "0");
	$getallpendingads_query = $db->query("SELECT tbl_product.product_id, tbl_product.product_name, tbl_product.published_user_id, tbl_product.category_id, tbl_product.sub_category_id, tbl_assign_product.assigned_to_cms_user_id, tbl_assign_product.assigned_on FROM tbl_product INNER JOIN tbl_assign_product WHERE tbl_product.product_id = tbl_assign_product.product_id AND tbl_product.product_status = :approvedstatus", $getallpendingads_array);
}
else{
	$getallpendingads_array = array('approvedstatus' => "0", 'currentuserid' => $_SESSION['cms_user_id']);
	$getallpendingads_query = $db->query("SELECT tbl_product.product_id, tbl_product.product_name, tbl_product.published_user_id, tbl_product.category_id, tbl_product.sub_category_id, tbl_assign_product.assigned_to_cms_user_id, tbl_assign_product.assigned_on FROM tbl_product INNER JOIN tbl_assign_product WHERE tbl_product.product_id = tbl_assign_product.product_id AND tbl_product.product_status = :approvedstatus AND tbl_assign_product.assigned_to_cms_user_id = :currentuserid", $getallpendingads_array);
}

$getactiveusers_query = $db->query("SELECT * FROM tbl_cms_users");

$include_file = BACKEND_DOC_ROOT.'pages/assigned_ads_page.php';
include_once BACKEND_DOC_ROOT.'template.php';
?>