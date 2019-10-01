	<?php
    include 'config/config.php';
	include_once DOC_ROOT.'classes/db_connection.php';
	include_once DOC_ROOT.'classes/mailing.class.php';
	include_once DOC_ROOT.'functions.php';


	// $current_date_time
	$select_array = array('status' => "1", 'current_date_time' => $current_date_time);
	$select_product_expire_date = $db->query("SELECT product_name, product_bid_ends_on, product_id, product_status FROM tbl_product WHERE product_status = :status AND product_bid_ends_on < :current_date_time", $select_array);

		if ($select_product_expire_date) {
			for ($x=0; $x < count($select_product_expire_date); $x++) {
				$product_name = $select_product_expire_date[$x]['product_name'];
				$bid_end_date_time = $select_product_expire_date[$x]['product_bid_ends_on'];
				$product_id = $select_product_expire_date[$x]['product_id'];

				$checking_bid_table_array = array('product_id' => $product_id);
				$checking_bid_table_sql = $db->query("SELECT product_id FROM tbl_bid WHERE product_id = :product_id", $checking_bid_table_array);

				if ($checking_bid_table_sql) {
					
					$expired_product_owner_id = getpublishuserid($product_id);

					$expired_product_owner_mail = getuseremail($expired_product_owner_id);

					$expired_product_max_value = getproductmaxvalue($product_id);

					$expired_product_max_value_user_id = getproductmaxvalueuserid($expired_product_max_value);

					$expired_product_max_value_user_mail = getuseremail($expired_product_max_value_user_id);

				// Check expired table to already email sent or not
					$expired_product_array = array('productid' => $product_id);
					$select_expired_product = $db->query("SELECT product_id FROM tbl_expired_product WHERE product_id = :productid", $expired_product_array);

					if (!$select_expired_product) {
						$insert_expired_product_array = array('product_id' => $product_id, 'product_name' => $product_name, 'owner_mail' => $expired_product_owner_mail, 'max_bidder_mail' => $expired_product_max_value_user_mail, 'status' => "1", 'sent_date_time' => $current_date_time);
						$insert_expired_product_sql = $db->query("INSERT INTO tbl_expired_product (product_id, expired_product_name, expired_product_owner_mail, expired_product_max_bidder_mail, expired_product_mail_sent_status, expired_product_mail_sent_date) VALUES (:product_id, :product_name, :owner_mail, :max_bidder_mail, :status, :sent_date_time)", $insert_expired_product_array);

						if ($insert_expired_product_sql) {
							$email_array = array($expired_product_owner_mail, $expired_product_max_value_user_mail);
							for ($z=0; $z < 2; $z++) { 
								
							$to = $email_array[$z];
							$expired_product_owner_name = getvendesiyausername($expired_product_owner_id);
							$expired_product_max_bidder_name = getvendesiyausername($expired_product_max_value_user_id);
							$email = "online@vendesiya.lk";
						 	$email_admin = "karthiklenzy@gmail.com";
							$subject = "Bidding Ended for Product | ".SITE_NAME;
							$the_heading = $subject;
							$product_img = getproductimage($product_id);
							$the_message_to_be_sent .= '<img src="';
	                    	$the_message_to_be_sent .= HTTP_PATH;
	                    	$the_message_to_be_sent .= $product_img;
	                    	$the_message_to_be_sent .='" width="150"><br>';

	                    	if ($z == 0) {
	                    		$the_message_to_be_sent .= 'Hi '.$expired_product_owner_name.'<br>Your Product is Expired.<br>The Max bidder of this product will own your product.<br>We will contact you soon.';
	                    	}
	                    	else {
	                    		$the_message_to_be_sent .= 'Hi '.$expired_product_max_bidder_name.'<br>Your are the max bidder of this product.<br>You can claim your product now.<br>We will contact you soon.';
	                    	}
							
						    include DOC_ROOT.'includes/email_template.php';
							$sent =mailing::html_mail($to,$subject,$admin_template,$email);
							$the_message_to_be_sent = "";
							}
						}
						else {

						}
					}
					// End Check expired table to already email sent or not
				}
				

				
				
			}
		}

	include 'template.php';
	?>