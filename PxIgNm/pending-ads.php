<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

$getallpendingads_array = array('approvedstatus' => "0");
$getallpendingads_query = $db->query("SELECT product_id, product_name, published_user_id, category_id, sub_category_id FROM tbl_product WHERE product_status = :approvedstatus ORDER BY product_id DESC", $getallpendingads_array);

$include_file = BACKEND_DOC_ROOT.'pages/pending_ads_page.php';
include_once BACKEND_DOC_ROOT.'template.php';
?>