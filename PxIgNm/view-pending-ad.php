<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';
require_once DOC_ROOT.'classes/mailing.class.php';

if (isset($_GET['product_id'])) {
	$productid = $_GET['product_id'];
	$getpendingproductdetails_array = array('productid' => $productid, 'productstatus' => "0");
	$getpendingproductdetails_query = $db->query("SELECT * FROM tbl_product WHERE product_id = :productid AND product_status = :productstatus", $getpendingproductdetails_array);

	if ($getpendingproductdetails_query) {

		$getadditionaldetails_array = array('productid' => $productid);
		$getadditionaldetails_query = $db->query("SELECT * FROM tbl_additional_product_details WHERE product_id = :productid", $getadditionaldetails_array);

		for ($i=0; $i < count($getpendingproductdetails_query); $i++) { 
			$product_name = $getpendingproductdetails_query[$i]['product_name'];
			$product_description = $getpendingproductdetails_query[$i]['product_description'];
			$product_main_img = $getpendingproductdetails_query[$i]['product_main_img'];
			$product_images = $getpendingproductdetails_query[$i]['product_images'];
			$product_initial_price = $getpendingproductdetails_query[$i]['product_initial_price'];
			$category_id = $getpendingproductdetails_query[$i]['category_id'];
			$sub_category_id = $getpendingproductdetails_query[$i]['sub_category_id'];
			$published_user_id = $getpendingproductdetails_query[$i]['published_user_id'];
			$product_url = $getpendingproductdetails_query[$i]['product_url'];
		}

		if (isset($_POST['btnproceed'])) {
			$error_count = 0;
			$error_message_list = "";

			$current_date_and_time = date("Y-m-d h:i:s");
			$bid_end_date_and_time = date('Y-m-d h:i:s', strtotime("+10 days"));

			$selectstatus = filter_var($_POST['selectstatus'], FILTER_SANITIZE_STRING);

			if ($selectstatus == "") {
				$error_message_list .= "<li>Please select the status</li>";
				$error_count++;
			}
			else if ($selectstatus == 2) {
				$txtdisapprovereason = filter_var($_POST['txtdisapprovereason'], FILTER_SANITIZE_STRING);
				$txtdisapprovereason = trim($txtdisapprovereason);

				if ($txtdisapprovereason == "") {
					$error_message_list .= "<li>Please add the reason to disapprove</li>";
					$error_count++;
				}
			}

			if($error_count == 0){
				if ($selectstatus == 1) {
					$addResponse_array = array('productid' => $productid, 'approvedon' => $current_date_and_time, 'biddingednson' => $bid_end_date_and_time, 'productstatus' => $selectstatus, 'approvedcmsuser' => $_SESSION['cms_user_id']);
					$addResponse_query = $db->query("UPDATE tbl_product SET product_approved_on = :approvedon, product_bid_ends_on = :biddingednson, product_status = :productstatus, cms_user_id = :approvedcmsuser WHERE product_id = :productid", $addResponse_array);

					if ($addResponse_query) {

						/* SEND EMAIL TO USER */
						$subject = "Vendesiya - Product approved";
						$current_date = $current_date_and_time;
						$the_heading = $subject;

						$userfullname = getvendesiyausername($published_user_id);
						$theuseremail = getuseremail($published_user_id);
						$the_message_to_be_sent .= '<img src="';
                    	$the_message_to_be_sent .= HTTP_PATH;
                    	$the_message_to_be_sent .= $product_main_img;
                    	$the_message_to_be_sent .='" width="150"><br><br>';
						$the_message_to_be_sent .= '<b>Hi '.$userfullname.', <br><br>
						The '.$product_name.' ad you sent has been accepted. Click the link to view the ad.
						<a href="'.HTTP_PATH.'product-preview?product-url='.$product_url.'" target="_BLANK">'.HTTP_PATH.'view-product/'.$product_url.'</a>
						<br><br>
						Best regards,
						<br>
						Team Vendesiya.</b>';

						include DOC_ROOT.'includes/email_template.php';

						$to = $theuseremail;
						$email = "online@vendesiya.lk";
						$sent = mailing::html_mail($to,$subject,$admin_template,$email);
						/* //SEND EMAIL TO USER */

						$successMessage = "Product approval successfull..!";
						setcookie("cookieSuccessProductResponse", $successMessage, time() + (20 * 1), "/"); // 1 minute
						header("Location:".BACKEND_PATH."approved-ads");
					}
				}
				else if($selectstatus == 2){
					/*tbl_disapprove   disapprove_id	disapprove_reason	disapproved_on	product_id	cms_user_id*/
					$addResponse_array = array('productid' => $productid, 'disapprovereason' => $txtdisapprovereason, 'disapprovedon' => $current_date_and_time, 'disapprovedcmsuser' => $_SESSION['cms_user_id']);
					$addResponse_query = $db->query("INSERT INTO tbl_disapprove (disapprove_reason, disapproved_on, product_id, cms_user_id) VALUES (:disapprovereason, :disapprovedon, :productid, :disapprovedcmsuser)", $addResponse_array);

					if($addResponse_query){
						$updateProductStatus_array = array('productid' => $productid, 'productstatus' => $selectstatus);
						$updateProductStatus_query = $db->query("UPDATE tbl_product SET product_status = :productstatus WHERE product_id = :productid", $updateProductStatus_array);

						if ($updateProductStatus_query) {

							/* Send email to user and admins */
							$subject = "Vendesiya - Product disapproved";
							$current_date = $current_date_and_time;
							$the_heading = $subject;

							$userfullname = getvendesiyausername($published_user_id);
							$theuseremail = getuseremail($published_user_id);
							$the_message_to_be_sent .= '<img src="';
                    		$the_message_to_be_sent .= HTTP_PATH;
                    		$the_message_to_be_sent .= $product_main_img;
                    		$the_message_to_be_sent .='" width="150"><br><br>';
							$the_message_to_be_sent .= '<b>Hi '.$userfullname.', <br><br>
							The '.$product_name.' ad you sent has been disapproved. The reason(s) to disapproved the ad is/are : '.$txtdisapprovereason.' <br> Please correct the mistakes and resubmit the ad.
							<br><br>
							Best regards,
							<br>
							Team Vendesiya.</b>';

							include DOC_ROOT.'includes/email_template.php';

							$to = $theuseremail;
							$email = "online@vendesiya.lk";
							$sent = mailing::html_mail($to,$subject,$admin_template,$email);
							/* Send email to user and admins */

							$successMessage = "Product disapproved successfully..!";
							setcookie("cookieSuccessProductResponse", $successMessage, time() + (20 * 1), "/"); // 1 minute
							header("Location:".BACKEND_PATH."disapproved-ads");
						}
					}
				}
			}
		}
	}
	else{
		$error_message = "Item not found..! Or not pending..!";
	}
}
else{
	header("Location:".BACKEND_PATH."home");
}

$include_file = BACKEND_DOC_ROOT.'pages/view_pending_ad_page.php';
include_once BACKEND_DOC_ROOT.'template.php';

if(isset($error_count)){
	if ($error_count != 0) {
		echo "<script> $('#errorModal').modal({ show: true });</script>";
	}
}
?>