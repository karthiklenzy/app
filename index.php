<?php
include 'top.php';

include 'classes/db_connection.php';
date_default_timezone_set('Asia/Colombo');

	if (isset($_SESSION['vendesiya_user_id'])) {
	    $current_date_and_time = date("Y-m-d h:i:s");
		$user_array = array('currentdateandtime' => $current_date_and_time, 'active_user_id' => $_SESSION['vendesiya_user_id']);
		$product_data = $db->query("SELECT product_id, product_url, product_name, product_main_img, product_initial_price, product_current_price, product_bid_ends_on FROM tbl_product WHERE product_status = 1 AND product_bid_ends_on >= :currentdateandtime AND published_user_id != :active_user_id ORDER BY product_id DESC LIMIT 12", $user_array);
		$featured_product_data = $db->query("SELECT product_id, product_url, product_name, product_main_img, product_initial_price, product_current_price, product_bid_ends_on FROM tbl_product WHERE product_featured = 1 AND product_bid_ends_on >= :currentdateandtime AND published_user_id != :active_user_id ORDER BY product_id DESC LIMIT 6", $user_array);
		$new_product_data = $db->query("SELECT product_id, product_url, product_name, product_main_img, product_initial_price, product_current_price, product_bid_ends_on FROM tbl_product WHERE product_status = 1 AND product_bid_ends_on >= :currentdateandtime AND published_user_id != :active_user_id ORDER BY product_id DESC LIMIT 6", $user_array);
	}
	else {
	    $current_date_and_time = date("Y-m-d h:i:s");
		$user_array = array('currentdateandtime' => $current_date_and_time);
		
		$product_data = $db->query("SELECT product_id, product_url, product_name, product_main_img, product_initial_price, product_current_price, product_bid_ends_on FROM tbl_product WHERE product_status = 1 AND product_bid_ends_on >= :currentdateandtime ORDER BY product_id DESC LIMIT 12", $user_array);
		$featured_product_data = $db->query("SELECT product_id, product_url, product_name, product_main_img, product_initial_price, product_current_price, product_bid_ends_on FROM tbl_product WHERE product_featured = 1 AND product_bid_ends_on >= :currentdateandtime ORDER BY product_id DESC LIMIT 6", $user_array);
		$new_product_data = $db->query("SELECT product_id, product_url, product_name, product_main_img, product_initial_price, product_current_price, product_bid_ends_on FROM tbl_product WHERE product_status = 1 AND product_bid_ends_on >= :currentdateandtime ORDER BY product_id DESC LIMIT 6", $user_array);
	}

$include_file = 'pages/index_page.php';
include 'template.php';
?>
