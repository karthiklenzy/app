<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'classes/mailing.class.php';
include_once DOC_ROOT.'functions.php';

$getexistingproducts_array = array('activestatus' => "1", 'notfeaturedproductstatus' => "0");
$getexistingproducts_query = $db->query("SELECT product_id, product_name FROM tbl_product WHERE product_status = :activestatus AND product_featured = :notfeaturedproductstatus", $getexistingproducts_array);

if (isset($_POST['btnsave'])) {
	$error_count = 0;

	$selectfeaturedad = filter_var($_POST['selectfeaturedad'], FILTER_SANITIZE_STRING);

	if ($selectfeaturedad == "") {
		$error_message = "Please select a product to add as featured item.!";
		$error_count++;
	}
	else{
		if($error_count == 0){
			$addfeaturedproduct_array = array('productid' => $selectfeaturedad, 'featuredstatus' => "1");
			$addfeaturedproduct_query = $db->query("UPDATE tbl_product SET product_featured = :featuredstatus WHERE product_id = :productid ", $addfeaturedproduct_array);
			$product_mail_array = array('product_f_id' => $selectfeaturedad, 'product_status' => "1");
			$product_mail = $db->query("SELECT product_main_img, published_user_id FROM tbl_product WHERE product_id = :product_f_id AND product_status = :product_status", $product_mail_array);
			$product_main_img = $product_mail[0]['product_main_img'];
			$userfullname = getvendesiyausername($product_mail[0]['published_user_id']);
			$theuseremail = getuseremail($product_mail[0]['published_user_id']);
			if ($addfeaturedproduct_query) {
				$the_message_to_be_sent .= '<img src="';
                    	$the_message_to_be_sent .= HTTP_PATH;
                    	$the_message_to_be_sent .= $product_main_img;
                    	$the_message_to_be_sent .='" style="width:15%;"><br><br>';
						$the_message_to_be_sent .= 'Hi '.$userfullname.', <br><br>
						The '.$product_name.' ad you sent has been added to featured product. Click the link to view the ad.
						<a href="'.HTTP_PATH.'product-preview?product-url='.$product_url.'" target="_BLANK">'.HTTP_PATH.'view-product/'.$product_url.'</a>
						<br><br>
						Best regards,
						<br>
						Team Vendesiya.';

						include DOC_ROOT.'includes/email_template.php';

						$to = $theuseremail;
						$email = "online@vendesiya.lk";
						$sent = mailing::html_mail($to,$subject,$admin_template,$email);
						/* //SEND EMAIL TO USER */
				$successMessage = "Product added as featured ad successfully..!";
				setcookie("cookieSuccessProductResponse", $successMessage, time() + (20 * 1), "/"); // 1 minute
				header("Location:".BACKEND_PATH."featured-ads");
			}
		}
	}
}

$include_file = BACKEND_DOC_ROOT.'pages/add_featured_ad_page.php';
include_once BACKEND_DOC_ROOT.'template.php';
?>