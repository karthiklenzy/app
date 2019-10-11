<?php
include 'top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'includes/auth_user.php';
include_once DOC_ROOT.'functions.php';

	$verify_count = 0;
	$wish_array = array('user_id' => $_SESSION['vendesiya_user_id'], 'product_status' => 1);
	$wish_data = $db->query("SELECT tbl_product.* FROM tbl_product INNER JOIN tbl_wish_list WHERE tbl_product.product_id = tbl_wish_list.product_id AND tbl_wish_list.user_id = :user_id AND tbl_product.product_status = :product_status", $wish_array);

	$verify_data = $db->query("SELECT product_id, product_url, product_name, product_main_img, product_initial_price FROM tbl_product WHERE published_user_id = :user_id AND product_status = :product_status ORDER BY product_id DESC", $wish_array);

	if (!$verify_data) {
		$verify_count++;
	}
	
	/*  Pagination Settings  */
	$num_rec_per_page = 8;
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
	if (isset($wish_data)) {
		$wish_array_count = array('user_id' => $_SESSION['vendesiya_user_id']);
		$product_count = $db->query("SELECT count(wish_list_id) FROM tbl_wish_list WHERE user_id = :user_id", $wish_array_count);
	}


		$total_product = $product_count[0]['count(wish_list_id)'];
		$total_pages = $total_product / $num_rec_per_page;
		$total_pages = ceil($total_pages); //convert to highest full number
		

		if ($wish_data) {
			$current_date_time = date('Y-m-d h:i:s');
			$wish_list_array = array('user_id' => $_SESSION['vendesiya_user_id'], 'cur_date_time' => $current_date_time);
			$cat_product_sql = $db->query("SELECT tbl_product.* FROM tbl_product INNER JOIN tbl_wish_list WHERE tbl_product.product_id = tbl_wish_list.product_id AND tbl_wish_list.user_id = :user_id AND tbl_product.product_bid_ends_on >= :cur_date_time limit $limit_from, $num_rec_per_page", $wish_list_array);
		}
	// Remove from favourite
	if (isset($_GET['deleteid'])) {
		$delete_id = filter_var($_GET['deleteid']);
		$user_id = $_SESSION['vendesiya_user_id'];
		$delete_array = array('delete_id' => $delete_id, 'user_id' => $user_id);
		$delete_sql = $db->query("DELETE FROM tbl_wish_list WHERE product_id = :delete_id AND user_id = :user_id", $delete_array);

		if ($delete_sql) {
			$success_message = "Successfully Removed.!";
			setcookie("SuccessMessage", $success_message, time() + (5 * 1), "/");
			header("Location:".HTTP_PATH."wish-list");
		}
		
	}

$include_file = 'pages/wish-list-page.php';
include 'template.php';
?>