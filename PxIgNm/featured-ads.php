<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

$getallfeaturedads_array = array('approvedstatus' => "1", 'featuredstatus' => "1");
$getallfeaturedads_query = $db->query("SELECT product_id, product_name, published_user_id, product_approved_on, cms_user_id FROM tbl_product WHERE 	product_status = :approvedstatus AND product_featured = :featuredstatus ORDER BY product_id DESC", $getallfeaturedads_array);

$include_file = BACKEND_DOC_ROOT.'pages/featured_ads_page.php';
include_once BACKEND_DOC_ROOT.'template.php';
?>