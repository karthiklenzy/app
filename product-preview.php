<?php
include 'top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'classes/mailing.class.php';
include_once DOC_ROOT.'functions.php';

// $current_time = time("H:i:s");
$catagory_list = $db->query("SELECT category_name FROM tbl_category");
$reson_data = $db->query("SELECT * FROM tbl_report_ad_reason");
$verify_count = 0;

	// related products bottom of preview
	if (isset($_GET['product-url'])) {
		$product_url = filter_var($_GET['product-url']);
		$product_catagory_array = array('product_url' => $product_url);
		$product_catagory_sql = $db->query("SELECT product_id, product_main_img, product_name, product_bid_ends_on, product_views, category_id, product_count FROM tbl_product WHERE product_url = :product_url", $product_catagory_array);
		$product_get_id = getproductcodeusingurl($product_url);
		$product_published_user_id = getpublishuserid($product_get_id);
		$product_name = $product_catagory_sql[0]['product_name'];
		$product_bidend_mail = $product_catagory_sql[0]['product_bid_ends_on'];
		$product_view_mail = $product_catagory_sql[0]['product_views'];
		$product_img_link = $product_catagory_sql[0]['product_main_img'];
		$product_url_path = HTTP_PATH.'product-preview?product-url='.$product_url;
		$product_count = $product_catagory_sql[0]['product_count'];
		// Review Query
		$review_array = array('pro_id' => $product_get_id, 'status' => "1");
		$review_query = $db->query("SELECT * FROM tbl_product_review WHERE review_product_id = :pro_id AND review_status = :status ORDER BY review_id DESC LIMIT 10", $review_array);

		if ($product_catagory_sql) {
			$cat_id = $product_catagory_sql[0]['category_id'];
// 			$current_date_and_time = date("Y-m-d h:i:s");
			$related_products_array = array('productactivestatus' => "1", 'cat_id' => $cat_id, 'currentdateandtime' => $current_date_time);
			$related_products_sql = $db->query("SELECT * FROM tbl_product WHERE category_id = :cat_id AND product_status = :productactivestatus AND product_bid_ends_on >= :currentdateandtime LIMIT 3", $related_products_array);	
		}
		
	}
// $verify_array = array('user_id' => $_SESSION['vendesiya_user_id']);
// $verify_data = $db->query("SELECT product_id, product_name, product_main_img, product_initial_price FROM tbl_product WHERE published_user_id = :user_id", $verify_array);

	// if (!$verify_data) {
	// 	$verify_count++;
	// }

	if (isset($_GET['product-url'])) {
	  $product_url = filter_var($_GET['product-url']);
// 	  $current_date_and_time = date('Y-m-d H:i:s');

	  $getproductdetails_array = array('producturl' => $product_url, 'productactivestatus' => "1", 'currentdateandtime' => $current_date_time);
	  $selected_product_sql = $db->query("SELECT * FROM tbl_product WHERE product_url = :producturl AND product_status = :productactivestatus AND product_bid_ends_on >= :currentdateandtime", $getproductdetails_array);
	  $product_id = $selected_product_sql[0]['product_id'];
	  $product_img_link = $selected_product_sql[0]['product_main_img'];
	  $product_catagory_id = $selected_product_sql[0]['category_id'];
	  $catagory_name = getcategoryname($product_catagory_id);
	  $product_sub_catagory_id = $selected_product_sql[0]['sub_category_id'];
	  $sub_catagory_name = getsubcategoryname($product_sub_catagory_id);
	  $product_count_number = $selected_product_sql[0]['product_count'];

	  if ($selected_product_sql) {
	  	// Adding wish list heart
	  	if (isset($_GET['favitem'])) {
	  	  $favoritestatus = filter_var($_GET['favitem']);
	  	  if ($favoritestatus == 1) {
	  	  	$addfavourite_array = array('producturl' => $product_url, 'product_id' => $product_id, 'userid' => $_SESSION['vendesiya_user_id']);
	  	  	$addfavourite = $db->query("INSERT INTO tbl_wish_list (user_id, product_url, product_id) VALUES (:userid, :producturl, :product_id)", $addfavourite_array);

	  	  	if ($addfavourite) {
	  	  	  header("Location:".HTTP_PATH."product-preview?product-url=".$product_url);
	  	  	}
	  	  }
	  	}
	  	// Remove fav Heart 
	  	if (isset($_GET['favitemremove'])) {
	  		$remove_fav_product_id = filter_var($_GET['favitemremove']);
	  		$user_id = $_SESSION['vendesiya_user_id'];
	  		$delete_fav_product_array = array('remove_fav_product_id' => $remove_fav_product_id, 'user_id' => $user_id);
	  		$delete_fav_product_sql = $db->query("DELETE FROM tbl_wish_list WHERE product_id = :remove_fav_product_id AND user_id =:user_id", $delete_fav_product_array);
	  		if ($delete_fav_product_sql) {
	  	  	  header("Location:".HTTP_PATH."product-preview?product-url=".$product_url);
	  	  	}
	  	}
	  	// End wish list heart
	  	$spec_array = array('productid' => $selected_product_sql[0]['product_id']);
		$spec_data = $db->query("SELECT tbl_spec_type.spec_type_name, tbl_additional_product_details.spec_value FROM tbl_spec_type INNER JOIN tbl_additional_product_details WHERE tbl_spec_type.spec_type_id = tbl_additional_product_details.spec_type_id AND tbl_additional_product_details.product_id = :productid", $spec_array);

		$productid = $selected_product_sql[0]['product_id'];
		$productname = $selected_product_sql[0]['product_name'];

			if (isset($_SESSION['vendesiya_user_id'])) {
			  $getwishlisteditems_array = array('userid' => $_SESSION['vendesiya_user_id'], 'produrl' => $product_url);
			  $getwishlisteditems_query = $db->query("SELECT product_url FROM tbl_wish_list WHERE user_id = :userid AND product_url =:produrl ", $getwishlisteditems_array);
			}

			/* Updating number of views */
			$updateviews_array = array('producturl' => $product_url);
			$updateviews_query = $db->query("UPDATE tbl_product SET product_views = product_views+1 WHERE product_url = :producturl", $updateviews_array);

			$getadditionaldetails_array = array('productid' => $productid);
			$getadditionaldetails_query = $db->query("SELECT * FROM tbl_additional_product_details WHERE product_id = :productid", $getadditionaldetails_array);

			$bid_margin = getbidmargin($selected_product_sql[0]['sub_category_id']);

			/* Display next bid amount */
			if ($selected_product_sql) {
			  $currentamount = $selected_product_sql[0]['product_current_price'];
			  $reservationprice = $selected_product_sql[0]['product_initial_price'];
				
			  /* current bid 2 is to check every 10 seconds if the bid exceeded */
			  $current_bid_2 = $currentamount; 

				  if ($reservationprice > 25000) {
					$eightypercentreservation = $reservationprice * 0.8;
				  	if ($currentamount >= $eightypercentreservation) {
					  $bid_margin = $bid_margin / 2;
					}
				  }
			  $displaybidamount = ($bid_margin / 100) * $reservationprice + $currentamount;
			  $pricefloor = $displaybidamount; 
			}
	  	}
	  	else {
	  	header("Location:".HTTP_PATH);
	  	}
	}

	if (isset($_POST['btnplaceabid'])) {
		// Check bid expire date
		$biduser = $_SESSION['vendesiya_user_id'];
		$productid = getproductcodeusingurl($product_url);
		$product_max_ex_value = getproductmaxvalue($productid);
		$product_valid_url = filter_var($_GET['product-url']);
		$check_if_bid_exceeded_array = array('productid' => $productid);
		$check_if_bid_exceeded_query = $db->query("SELECT product_bid_ends_on, product_current_price FROM tbl_product WHERE product_id = :productid", $check_if_bid_exceeded_array);
		
		if ($check_if_bid_exceeded_query[0]['product_bid_ends_on'] > $current_date_time) {
			
			$bid_amount = filter_var($_POST['thebid'], FILTER_SANITIZE_STRING);
			$displaybidamount = $bid_amount;
			$confirm_bid = "show";
		}
		else {
			
			$error_message = "This product bidding time is over.!";
			setcookie("ErrorMessage", $error_message, time() + (5 * 1), "/");
			header("Location:".HTTP_PATH);
		}
		// End Check bid expire date
	}
	else {
		// include_once DOC_ROOT.'includes/confirmbid.php';

	}
	// Submitting placeoreder
	if (isset($_POST['btnplaceorder'])) {
	    
		$biduser = $_SESSION['vendesiya_user_id'];
		$bidamount = filter_var($_POST['hiddenbidamount'], FILTER_SANITIZE_STRING);
		$productid = getproductcodeusingurl($product_url);
// 		$bid_date_and_time = date('Y-m-d H:i:s');
		$product_max_ex_value = getproductmaxvalue($productid);
		
		$check_if_bid_exceeded_array = array('productid' => $productid);
		$check_if_bid_exceeded_query = $db->query("SELECT product_current_price FROM tbl_product WHERE product_id = :productid", $check_if_bid_exceeded_array);

		if($check_if_bid_exceeded_query[0]['product_current_price'] < $bidamount){
			$confirmbid_array = array('productid' => $productid, 'bidamount' => $bidamount, 'biduser' => $biduser, 'bid_date_and_time' => $current_date_time);
			$confirmbid_query = $db->query("INSERT INTO tbl_bid (product_id, bid_amount, bid_user_id, bid_date_and_time) VALUES (:productid, :bidamount, :biduser, :bid_date_and_time)", $confirmbid_array);

			if ($check_if_bid_exceeded_query[0]['product_current_price'] == "-1") {
				$freebid_price_array = array('productid' => $productid, 'bidamount' => $bidamount);
				$freebid_price_query = $db->query("UPDATE tbl_product SET  product_initial_price = :bidamount WHERE product_id = :productid", $freebid_price_array);
			}
			
			$update_product_current_bid_array = array('productid' => $productid, 'bidamount' => $bidamount);
			$update_product_current_bid_query = $db->query("UPDATE tbl_product SET product_current_price = :bidamount WHERE product_id = :productid", $update_product_current_bid_array);


			if ($update_product_current_bid_query) {
			    //$to = "karthiklenzy@gmail.com";
					$email = "online@vendesiya.lk";
				 	$email_admin = "karthiklenzy@gmail.com";
					$subject = "Bid submission | ".SITE_NAME;
					$the_heading = $subject;
					
				// if current product already bidded
				if ($product_max_ex_value != "") {
					$product_max_value_ex_user_id = getproductmaxvalueuserid($product_max_ex_value);
					$product_max_value_ex_user_mail = getuseremail($product_max_value_ex_user_id);
                    $to = $product_max_value_ex_user_mail;
                    $current_email = $_SESSION['vendesiya_useremail'];
                    
					// Mail to ex bidder
	      			if ($to != $current_email) {
	      				
                    	$the_message_to_be_sent .= '<img src="';
                    	$the_message_to_be_sent .= HTTP_PATH;
                    	$the_message_to_be_sent .= $product_img_link;
                    	$the_message_to_be_sent .='"><br>';
                    	$the_message_to_be_sent .= 'Your bid amount to this <a href="'.$product_url_path.'">product</a> '.$productid.' was exeed by another bidder';
                    	$the_message_to_be_sent .= '<br><br><b>Name :</b> '.$product_name.'<br><b>Total views :</b> '.$product_view_mail.'<br><b>Bid end on :</b> '.$product_bidend_mail;
                    	include DOC_ROOT.'includes/email_template.php';
				 	    $sent =mailing::html_mail($to,$subject,$admin_template,$email);
				 	     $the_message_to_be_sent = ""; 
                    }
                    else {
                    	$the_message_to_be_sent .= '<img src="';
                    	$the_message_to_be_sent .= HTTP_PATH;
                    	$the_message_to_be_sent .= $product_img_link;
                    	$the_message_to_be_sent .='" width="150"><br>';
                    	$the_message_to_be_sent .= 'Your bid amount to this <a href="'.$product_url_path.'">product</a> '.$productid.' was exeed by you';
                    	$the_message_to_be_sent .= '<br><br><b>Name :</b> '.$product_name.'<br><b>Total views :</b> '.$product_view_mail.'<br><b>Bid end on :</b> '.$product_bidend_mail;
                    	include DOC_ROOT.'includes/email_template.php';
                    	
				 	    $sent =mailing::html_mail($to,$subject,$admin_template,$email);
				 	    $the_message_to_be_sent = ""; 
                    }
				}

				$to = $_SESSION['user_email'];
				$the_message_to_be_sent .= '<img src="';
				$the_message_to_be_sent .= HTTP_PATH;
                $the_message_to_be_sent .= $product_img_link;
                $the_message_to_be_sent .='" width="150"><br>';
				$the_message_to_be_sent .= 'Your bid amount to this <a href="'.$product_url_path.'">product</a> '.$productid.' is set for current product price bid amount '.$bidamount;
				$the_message_to_be_sent .= '<br><br><b>Name :</b> '.$product_name.'<br><b>Total views :</b> '.$product_view_mail.'<br><b>Bid end on :</b> '.$product_bidend_mail;
	      			// Mail to new bidder		
					include DOC_ROOT.'includes/email_template.php';
					$sent =mailing::html_mail($to,$subject,$admin_template,$email);

				$successMessage = "Bid placed successfully.!";
				setcookie("SuccessMessage", $successMessage, time() + (5 * 1), "/"); // 1 minute
				header("Location:".HTTP_PATH."user-profile");
			}
			else {
				$errorMessage = "Error in Bidding.!";
				setcookie("ErrorMessage", $errorMessage, time() + (5 * 1), "/"); // 1 minute
				header("Location:".HTTP_PATH."user-profile");
			}
		}
		else {
			$errorMessage = "bid amount exceeded.!";
			setcookie("ErrorMessage", $errorMessage, time() + (5 * 1), "/"); // 1 minute
			header("Location:".HTTP_PATH."user-profile");
		}
	}

	// Report Ad
	if (isset($_POST['btnreport'])) {
		$product_url = filter_var($_GET['product-url']);
		$report_reason = filter_var($_POST['reson']);
		$reporter_mail = filter_var($_POST['mail']);
		$reporter_message = filter_var($_POST['message']);
		$reported_product_id = $product_get_id;

		$reported_array = array('report_reason' => $report_reason, 'reporter_mail' => $reporter_mail, 'reporter_message' => $reporter_message, 'reported_product_id' => $reported_product_id, 'report_date' => $current_date_time);
		$reported_query = $db->query("INSERT INTO tbl_report_ad (report_ad_reson, report_ad_mail, report_ad_message, report_product_id, report_date) VALUES(:report_reason, :reporter_mail, :reporter_message, :reported_product_id, :report_date)", $reported_array);

		if ($reported_query) {
			$successMessage = "Reported successfully.!";
			setcookie("SuccessMessage", $successMessage, time() + (5 * 1), "/");
			header("Location:".HTTP_PATH."product-preview?product-url=".$product_url);
		}
		else {
			$errorMessage = "Error in reporting.!";
			setcookie("ErrorMessage", $errorMessage, time() + (5 * 1), "/");
			header("Location:".HTTP_PATH."product-preview?product-url=".$product_url);
		}
	}
	// Product review coments 
	if (isset($_POST['btn-review'])) {
		$review_message = $_POST['review'];
// 		$current_date = date("Y/m/d");
// 		$current_time = date("H:i:s");
		$current_product_id = $product_get_id;
		$current_user_id = $_SESSION['vendesiya_user_id'];
		$current_user_name = $_SESSION['vendesiya_user_name'];
		$product_review_url = filter_var($_GET['product-url']);

		$array_review = array('username' => $current_user_name, 'review_message' => $review_message, 'current_product_id' => $current_product_id, 'review_status' => "0", 'current_review_date' => $current_date, 'current_review_time' => $current_time);
		$array_sql = $db->query("INSERT INTO tbl_product_review (review_added_user_name, review_message, review_product_id, review_status, review_date, review_time) VALUES (:username, :review_message, :current_product_id, :review_status, :current_review_date, :current_review_time)", $array_review);
		
		if ($array_sql) {
			$successMessage = "Review added successfully.! visible after aproved";
			setcookie("SuccessMessage", $successMessage, time() + (5 * 1), "/");
			header("Location:".HTTP_PATH."product-preview?product-url=".$product_review_url);
		}
		else {
			$errorMessage = "Error adding review.!";
			setcookie("ErrorMessage", $errorMessage, time() + (5 * 1), "/");
			header("Location:".HTTP_PATH."product-preview?product-url=".$product_review_url);
		}

	}

$include_file = 'pages/product_preview_page.php';
include 'template.php';
include_once DOC_ROOT.'includes/confirmbid.php';

if (isset($confirm_bid)) {
	if ($confirm_bid == "show") {
		echo "<script> $('#myModal').modal({ show: true });</script>";
	}
}
?>