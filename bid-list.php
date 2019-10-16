<?php
include 'top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'includes/auth_user.php';
include_once DOC_ROOT.'functions.php';

	$bid_count = 0;
	$bid_array = array('user_id' => $_SESSION['vendesiya_user_id']);
	$bid_data = $db->query("SELECT tbl_product.* FROM tbl_product INNER JOIN tbl_bid WHERE tbl_product.product_id = tbl_bid.product_id AND tbl_bid.bid_user_id = :user_id", $bid_array);

	$verify_data = $db->query("SELECT product_id, product_url, product_name, product_main_img, product_initial_price FROM tbl_product WHERE published_user_id = :user_id ORDER BY product_id DESC", $bid_array);

	if (!$verify_data) {
		$bid_count++;
	}
	
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
	if (isset($bid_data)) {
		$product_count = $db->query("SELECT product_id FROM tbl_bid WHERE bid_user_id = :user_id GROUP BY product_id", $bid_array);
		//echo '<pre>';var_dump($product_count);exit();
	}


		$total_product = count($product_count);
		$total_pages = $total_product / $num_rec_per_page;
		$total_pages = ceil($total_pages); //convert to highest full number
		$max_value_of_product = "";
		
		if ($bid_data) {

			$cat_product_sql = $db->query("SELECT tbl_product.*, tbl_bid.*, MAX(tbl_bid.bid_amount) FROM tbl_product INNER JOIN tbl_bid WHERE tbl_product.product_id = tbl_bid.product_id AND tbl_bid.bid_user_id = :user_id GROUP BY tbl_bid.product_id ORDER BY tbl_bid.product_id DESC limit $limit_from, $num_rec_per_page", $bid_array);
/* echo '<pre>'; var_dump($cat_product_sql); exit(); */
		}
	// Remove from bid
	// if (isset($_GET['deleteid'])) {
	// 	$delete_id = filter_var($_GET['deleteid']);
	// 	$user_id = $_SESSION['vendesiya_user_id'];
	// 	$delete_array = array('delete_id' => $delete_id, 'user_id' => $user_id);
	// 	$delete_sql = $db->query("DELETE FROM tbl_wish_list WHERE product_id = :delete_id AND user_id = :user_id", $delete_array);

	// 	if ($delete_sql) {
	// 		header("Location:".HTTP_PATH."bid-list");
	// 	}
		
	// }

$include_file = 'pages/bid-list-page.php';
include 'template.php';
?>