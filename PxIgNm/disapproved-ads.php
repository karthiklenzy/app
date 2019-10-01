<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

$getalldisapprovedads_array = array('disapprovedstatus' => "2");
$getalldisapprovedads_query = $db->query("SELECT tbl_product.product_id, tbl_product.product_name, tbl_product.published_user_id, tbl_disapprove.cms_user_id, tbl_disapprove.disapprove_reason FROM tbl_product INNER JOIN tbl_disapprove WHERE tbl_product.product_id = tbl_disapprove.product_id AND tbl_product.product_status = :disapprovedstatus ORDER BY tbl_product.product_id DESC", $getalldisapprovedads_array);

$include_file = BACKEND_DOC_ROOT.'pages/disapproved_ads_page.php';
include_once BACKEND_DOC_ROOT.'template.php';
?>