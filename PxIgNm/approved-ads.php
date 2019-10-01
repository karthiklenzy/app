<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

$getallapprovedads_array = array('approvedstatus' => "1");
$getallapprovedads_query = $db->query("SELECT product_id, product_name, published_user_id, product_approved_on, cms_user_id, product_featured FROM tbl_product WHERE product_status = :approvedstatus ORDER BY product_id DESC", $getallapprovedads_array);

$include_file = BACKEND_DOC_ROOT.'pages/approved_ads_page.php';
include_once BACKEND_DOC_ROOT.'template.php';
?>