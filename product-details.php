<?php
include 'top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'includes/auth_user.php';

$verify_count = 0;
$catagory_list = $db->query("SELECT category_name FROM tbl_category");

$verify_array = array('user_id' => $_SESSION['vendesiya_user_id'], 'status' => "2");
$verify_data = $db->query("SELECT product_id, product_name, product_main_img, product_initial_price, product_url FROM tbl_product WHERE published_user_id = :user_id AND product_status != :status LIMIT 6", $verify_array);

	if (!$verify_data) {
		$verify_count++;
	}
	if (isset($_GET['prourl'])) {
		$product_url = $_GET['prourl'];
		$selected_product_array = array('product_url' => $product_url);
		$selected_product_sql = $db->query("SELECT product_name, product_description, product_initial_price, product_main_img, product_images FROM tbl_product WHERE product_url = :product_url", $selected_product_array);

	}
	if (isset($_GET['product_id'])) {
		$product_id = $_GET['product_id'];
		$spec_array = array('pro_id' => $product_id);
		$spec_data = $db->query("SELECT tbl_spec_type.spec_type_name, tbl_additional_product_details.spec_value FROM tbl_spec_type INNER JOIN tbl_additional_product_details WHERE tbl_spec_type.spec_type_id = tbl_additional_product_details.spec_type_id AND tbl_additional_product_details.product_id = :pro_id", $spec_array);
	}
	// Review Query
	$product_id = $_GET['product_id'];
	$review_array = array('pro_id' => $product_id, 'status' => "1");
	$review_query = $db->query("SELECT * FROM tbl_product_review WHERE review_product_id = :pro_id AND review_status = :status ORDER BY review_id DESC LIMIT 10", $review_array);		

$include_file = 'pages/product_details_page.php';
include 'template.php';
?>