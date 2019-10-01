<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

if (isset($_GET['product_id'])) {
	$productid = $_GET['product_id'];
	$getapprovedproductdetails_array = array('productid' => $productid, 'productstatus' => "1");
	$getapprovedproductdetails_query = $db->query("SELECT * FROM tbl_product WHERE product_id = :productid AND product_status = :productstatus", $getapprovedproductdetails_array);

	if ($getapprovedproductdetails_query) {
		for ($i=0; $i < count($getapprovedproductdetails_query); $i++) { 
			$product_name = $getapprovedproductdetails_query[$i]['product_name'];
			$product_description = $getapprovedproductdetails_query[$i]['product_description'];
			$product_main_img = $getapprovedproductdetails_query[$i]['product_main_img'];
			$product_images = $getapprovedproductdetails_query[$i]['product_images'];
			$product_initial_price = $getapprovedproductdetails_query[$i]['product_initial_price'];
			$product_current_price = $getapprovedproductdetails_query[$i]['product_current_price'];
			$product_approved_on = $getapprovedproductdetails_query[$i]['product_approved_on'];
			$product_bid_ends_on = $getapprovedproductdetails_query[$i]['product_bid_ends_on'];
			$product_views = $getapprovedproductdetails_query[$i]['product_views'];
			$published_user_id = $getapprovedproductdetails_query[$i]['published_user_id'];
			$cms_user_id = $getapprovedproductdetails_query[$i]['cms_user_id'];
			$category_id = $getapprovedproductdetails_query[$i]['category_id'];
			$sub_category_id = $getapprovedproductdetails_query[$i]['sub_category_id'];
		}

		$getadditionaldetails_array = array('productid' => $productid);
		$getadditionaldetails_query = $db->query("SELECT * FROM tbl_additional_product_details WHERE product_id = :productid", $getadditionaldetails_array);
	}
	else{
		$error_message = "Item not found..! Or not approved..!";
	}
}
else{
	header("Location:".BACKEND_PATH."home");
}

$include_file = BACKEND_DOC_ROOT.'pages/view_approved_ad_page.php';
include_once BACKEND_DOC_ROOT.'template.php';
?>