<?php
include 'top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'includes/auth_user.php';
include_once DOC_ROOT.'functions.php';

$verify_count = 0;
$verify_array = array('user_id' => $_SESSION['vendesiya_user_id']);
$verify_data = $db->query("SELECT product_id, product_url, product_name, product_main_img, product_initial_price FROM tbl_product WHERE published_user_id = :user_id ORDER BY product_id DESC", $verify_array);

	if (!$verify_data) {
				$verify_count++;
	}
	if (isset($_GET['deleteid'])) {
		$delete_id = $_GET['deleteid'];
		$dir = DOC_ROOT."uploads/products/product_".$delete_id;
		$delete_array = array('delete_id' => $delete_id);
		$delete_sql = $db->query("DELETE FROM tbl_product WHERE product_id = :delete_id", $delete_array);

		if ($delete_sql) {
			rmrf($dir);
			$success_message = "Successfully Deleted.!";
			setcookie("SuccessMessage", $success_message, time() + (5 * 1), "/");
			header("Location:".HTTP_PATH."user-profile");
		}
		else {
			$error_message = "Error in delete.!";
			setcookie("SuccessMessage", $error_message, time() + (5 * 1), "/");
			header("Location:".HTTP_PATH."user-profile-none");
		}

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
	if (isset($verify_data)) {
		$product_count = $db->query("SELECT count(product_id) FROM tbl_product WHERE published_user_id = :user_id ORDER BY product_id DESC", $verify_array);
	}


		$total_product = $product_count[0]['count(product_id)'];
		$total_pages = $total_product / $num_rec_per_page;
		$total_pages = ceil($total_pages); //convert to highest full number

		if ($verify_data) {
			$cat_product_sql = $db->query("SELECT * FROM tbl_product WHERE published_user_id = :user_id ORDER BY product_id DESC limit $limit_from, $num_rec_per_page", $verify_array);
		}
	// Bid items
		$bid_array = array('user_id' => $_SESSION['vendesiya_user_id']);
		$cat_bid_product_sql = $db->query("SELECT tbl_product.*, tbl_bid.*, MAX(tbl_bid.bid_amount) FROM tbl_product INNER JOIN tbl_bid WHERE tbl_product.product_id = tbl_bid.product_id AND tbl_bid.bid_user_id = :user_id GROUP BY tbl_bid.product_id ORDER BY tbl_bid.product_id DESC limit 4", $bid_array);

$include_file = 'pages/user_profile_page.php';
include 'template.php';
?>