<?php
include 'top.php';
include 'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

$current_date_and_time = date("Y-m-d h:i:s");
$catagory_list = $db->query("SELECT category_name, category_icon FROM tbl_category");
// Menu & Sub Menu list
// if user loged only avoid to show own product
if (isset($_SESSION['vendesiya_user_id'])) {
	if (isset($_GET['category'])) {
		$cat_id = filter_var($_GET['category']);
		$cat_array = array('cat_id' => $cat_id);
		$cat_sql = $db->query("SELECT category_id, category_name, category_icon FROM tbl_category WHERE category_id = :cat_id", $cat_array);
		$sub_cat_sql = $db->query("SELECT sub_category_id, sub_category_name, sub_category_url FROM tbl_sub_category WHERE category_id = :cat_id", $cat_array);
		// Sub ID
		if (isset($_GET['subid'])) {
			$sub_id = filter_var($_GET['subid']);
			$cat_product_array = array('sub_id' => $sub_id, 'published_id' => $_SESSION['vendesiya_user_id'], 'currentdateandtime' => $current_date_and_time);
			$cat_product_sql = $db->query("SELECT product_id, product_url, product_name, product_main_img, product_current_price, published_user_id FROM tbl_product WHERE sub_category_id = :sub_id AND product_status = 1 AND product_bid_ends_on >= :currentdateandtime AND published_user_id != :published_id", $cat_product_array);

		}

		else {
			$cat_id = filter_var($_GET['category']);
			$cat_array = array('cat_id' => $cat_id, 'published_id' => $_SESSION['vendesiya_user_id'], 'currentdateandtime' => $current_date_and_time);
			$cat_product_sql = $db->query("SELECT product_id, product_url, product_name, product_main_img, product_current_price FROM tbl_product WHERE category_id = :cat_id AND product_status = 1 AND product_bid_ends_on >= :currentdateandtime AND published_user_id != :published_id", $cat_array);
				
		}	
	}
}
// show all product
else {
	if (isset($_GET['category'])) {
		$cat_id = filter_var($_GET['category']);
		$cat_array = array('cat_id' => $cat_id);
		$cat_sql = $db->query("SELECT category_id, category_name, category_icon FROM tbl_category WHERE category_id = :cat_id", $cat_array);
		$sub_cat_sql = $db->query("SELECT sub_category_id, sub_category_name, sub_category_url FROM tbl_sub_category WHERE category_id = :cat_id", $cat_array);
		// Sub ID
		if (isset($_GET['subid'])) {
			$sub_id = filter_var($_GET['subid']);
			$cat_product_array = array('sub_id' => $sub_id, 'currentdateandtime' => $current_date_and_time);
			$cat_product_sql = $db->query("SELECT product_id, product_url, product_name, product_main_img, product_current_price FROM tbl_product WHERE sub_category_id = :sub_id AND product_status = 1 AND product_bid_ends_on >= :currentdateandtime", $cat_product_array);

		}

		else {
			$cat_id = filter_var($_GET['category']);
			$cat_array = array('cat_id' => $cat_id, 'currentdateandtime' => $current_date_and_time);
			$cat_product_sql = $db->query("SELECT product_id, product_url, product_name, product_main_img, product_current_price FROM tbl_product WHERE category_id = :cat_id AND product_status = 1 AND product_bid_ends_on >= :currentdateandtime", $cat_array);
				
		}	
	}
}
	
	// End Menu & Sub Menu list

	/*  Pagination Settings  */
	$num_rec_per_page = 12;
	$limit_from = 0;
	$showmaxpagelimit = 5;
	$showminpagelimit = 0;
	$current_page_number = 1;

		if (isset($_GET['currentpage'])) {  
			$current_page_number = $_GET['currentpage'];
			if ($current_page_number != 1) {
				$previous_page = $current_page_number-1;
				$limit_from = $previous_page*$num_rec_per_page;
				$showmaxpagelimit = $current_page_number + 3;
				$showminpagelimit = $current_page_number - 3;
			}
			
		}
	/*  //Pagination Settings  */
	if (isset($_GET['subid'])) {
		$sub_cat_id = filter_var($_GET['subid']);
		$pagination_sub_product_array = array('pag_sub_cat_id' => $sub_cat_id,);
		$product_count = $db->query("SELECT count(product_id) FROM tbl_product WHERE sub_category_id = :pag_sub_cat_id AND product_status = 1", $pagination_sub_product_array);
	}
	else {
		$pag_cat_id = filter_var($_GET['category']);
		$pagination_product_array = array('cat_id' => $pag_cat_id);
		$product_count = $db->query("SELECT count(product_id) FROM tbl_product WHERE category_id = :cat_id AND product_status = 1", $pagination_product_array);
	}
	if (isset($product_count)) {
		$total_sub_catagory_count = getsubcategorycount($cat_id);
		$total_product = $product_count[0]['count(product_id)'];
		$total_pages = $total_product / $num_rec_per_page;
		$total_pages = ceil($total_pages); //convert to highest full number
		
	}
		
		

	if (isset($_GET['subid'])) {
		$sub_id = filter_var($_GET['subid']);
		$pagination_product_array = array('sub_id' => $sub_id, 'currentdateandtime' => $current_date_and_time);
		$cat_product_sql = $db->query("SELECT * FROM tbl_product WHERE sub_category_id = :sub_id AND product_status = 1 AND product_bid_ends_on >= :currentdateandtime limit $limit_from, $num_rec_per_page", $pagination_product_array);
	}
	else {
		$cat_pro_id = filter_var($_GET['category']);
		$pagination_product_cat_array = array('cat_pro_id' => $cat_pro_id, 'currentdateandtime' => $current_date_and_time);
		$cat_product_sql = $db->query("SELECT * FROM tbl_product WHERE category_id = :cat_pro_id AND product_status = 1 AND product_bid_ends_on >= :currentdateandtime limit $limit_from, $num_rec_per_page", $pagination_product_cat_array);
	}

$include_file = 'pages/shop_page.php';
include 'template.php';
?>