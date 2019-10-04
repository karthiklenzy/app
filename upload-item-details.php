<?php
include 'top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'includes/auth_user.php';
include_once DOC_ROOT.'classes/mailing.class.php';
include_once DOC_ROOT.'functions.php';
$the_message_to_be_sent = '';

	if (isset($_GET['selectproductcategory'])) {
		$category_id = $_GET['selectproductcategory'];
		$cat_array = array('id' => $category_id);
		$cat_query = $db->query("SELECT category_name FROM tbl_category WHERE category_id = :id",$cat_array);

	}
	if (isset($_GET['selectproductsubcategory'])) {
		$category_sub_id = $_GET['selectproductsubcategory'];
		$cat_sub_array = array('id_sub' => $category_sub_id);
		$cat_sub_query = $db->query("SELECT sub_category_name FROM tbl_sub_category WHERE sub_category_id = :id_sub",$cat_sub_array);
		
	}

	/* Second step */
if ((isset($_GET['selectproductcategory'])) && (isset($_GET['selectproductsubcategory']))) {
	$categoryid = filter_var($_GET['selectproductcategory']);
	$subcategoryid = filter_var($_GET['selectproductsubcategory']);

	$get_subcat_details_array = array('subcatid' => $subcategoryid);
	$get_additional_specc_query = $db->query("SELECT tbl_spec_type.spec_type_name, tbl_spec_type.spec_type_id, tbl_spec_value.spec_required FROM tbl_spec_type INNER JOIN tbl_spec_value WHERE  tbl_spec_type.spec_type_id = tbl_spec_value.spec_type_id AND tbl_spec_value.sub_category_id = :subcatid", $get_subcat_details_array);

		// Add Product
	 if (isset($_POST['btn-save'])) {
	 	$error_count = 0;
		$error_message = "";
		$item_count = 0;
		$item_name = filter_var($_POST['item_name'],FILTER_SANITIZE_STRING);
		$item_desc_tinymce = $_POST['item_desc_tinymce'];
		$item_price = filter_var($_POST['item_price'],FILTER_SANITIZE_STRING);
		$published_user_id = $_SESSION['vendesiya_user_id'];
		$item_count = filter_var($_POST['item_count'],FILTER_SANITIZE_STRING);
		$item_count_type = "Normal"; 
		$item_count_type = "";
        if (isset($_GET['upload']) && $_GET['upload'] == 'freebid') {
            $item_price = 0;
            $item_count_type = "Freebid";
        }
		
		if ($item_price != 0 && $item_count != 0) {
			$item_count_type = "Bulk";
		}
		
// 		echo $item_count_type." ".$item_price." ".$item_count;exit();
 
		if ($error_count == 0) {
		/* ************ Making the URL ************* */
			  $url_for_product = $item_name;
	          //Lower case everything
	          $url_for_product = strtolower($url_for_product);
	          //Make alphanumeric (removes all other characters)
	          $url_for_product = preg_replace("/[^a-z0-9_\s-]/", "", $url_for_product);
	          //Clean up multiple dashes or whitespaces
	          $url_for_product = preg_replace("/[\s-]+/", " ", $url_for_product);
	          //Convert whitespaces and underscore to dash
	          $url_for_product = preg_replace("/[\s_]/", "-", $url_for_product);

	      	/* ************ Making the URL ************* */

	      	/* ********************************  IMAGE UPLOAD ****************************** */
		        $path = "uploads/products/"; // Upload directory
		        include DOC_ROOT.'includes/imageupload.php'; 
	      	/* ********************************  //IMAGE UPLOAD ****************************** */
	      	if ($uploadOk == 1) {
	      		$path_multiple = "uploads/products/";
            	include DOC_ROOT.'includes/multiple_image_upload.php';
                  
            	if ($uploadOk_for_multiple_for_multiple = 1) {
            	    if ($item_price == 0) {
            	       $start_price = -1;
            	       $item_price = -1;
            	       $item_count = 1;
            	    } else {
            	       $start_price = $item_price / 2; 
            	    }
            		
            		$item_array = array('item_name' => $item_name, 'item_desc_tinymce' => $item_desc_tinymce, 'item_price' => $item_price, 'current_price' => $start_price, 'published_user_id' => $published_user_id, 'main_image_url' => $image_path_to_upload, 'multi_imag_path' => $image_path_to_attach_multiple_images_variable, 'product_url' => $url_for_product, 'item_count' => $item_count, 'item_count_type' => $item_count_type, 'cat_id' => $category_id, 'sub_cat_id' => $category_sub_id);
						$item_sql = $db->query("INSERT INTO tbl_product (product_name, product_description, product_initial_price, product_current_price, published_user_id, product_main_img, product_images, product_url, product_count, product_count_type, category_id, sub_category_id) VALUES (:item_name, :item_desc_tinymce, :item_price, :current_price, :published_user_id, :main_image_url, :multi_imag_path, :product_url, :item_count, :item_count_type, :cat_id, :sub_cat_id)",$item_array);
                        
						if ($item_sql) {
							$getlastproductid_array = array('vendesiyauser' => $_SESSION['vendesiya_user_id']);
		      				$getlastproductid = $db->query("SELECT product_id FROM tbl_product WHERE published_user_id = :vendesiyauser ORDER BY product_id DESC LIMIT 1", $getlastproductid_array);

		      				$productid_for_details = $getlastproductid[0]['product_id'];
		      				$url_for_product = $productid_for_details.'-'.$url_for_product;

		      				$update_product_url_array = array('productid' => $productid_for_details, 'urlforproduct' => $url_for_product);
		      				$update_product_url_query = $db->query("UPDATE tbl_product SET product_url = :urlforproduct WHERE product_id = :productid", $update_product_url_array);

		      					if($update_product_url_query){
			      					$filepath_and_name = DOC_ROOT."uploads/products/product_".$productid_for_details;
			      					$filepath_for_images_without_doc_root = "uploads/products/product_".$productid_for_details;

						            if(!is_dir($filepath_and_name)){
						              mkdir($filepath_and_name, 0755);
						            }

						            /* move images to new folder */			            
						            $main_img_name = substr($image_path_to_upload, strrpos($image_path_to_upload, '/') + 1);

						            $move_to = $filepath_and_name."/".$main_img_name;
									$move_from = DOC_ROOT."uploads/products/".$main_img_name;
									rename($move_from, $move_to);

									$prod_main_img = $filepath_for_images_without_doc_root."/".$main_img_name;

									$updateImagePathArray = array('productid' => $productid_for_details, 'prod_main_img' => $prod_main_img);
									$updateImagePathQuery = $db->query("UPDATE tbl_product SET product_main_img = :prod_main_img WHERE product_id = :productid", $updateImagePathArray);

									$prod_multi_images = "";
									$multipleImageArray = explode(',', $image_path_to_attach_multiple_images_variable);
								
									for ($x=0; $x < count($multipleImageArray); $x++) {
										$mult_img_name = substr($multipleImageArray[$x], strrpos($multipleImageArray[$x], '/') + 1);

										$move_to = $filepath_and_name."/".$mult_img_name;
										$move_from = DOC_ROOT."uploads/products/".$mult_img_name;
										rename($move_from, $move_to);

										if($prod_multi_images == ""){
											$prod_multi_images = $filepath_for_images_without_doc_root."/".$mult_img_name;
											// $prod_multi_images = "";
										}
										else{
											$prod_multi_images .= ",".$filepath_for_images_without_doc_root."/".$mult_img_name;
										}

									}
								
						$updateImagePathArray = array('productid' => $productid_for_details, 'prod_multi_img' => $prod_multi_images);
						$updateImagePathQuery = $db->query("UPDATE tbl_product SET product_images = :prod_multi_img WHERE product_id = :productid", $updateImagePathArray);

								for ($p=0; $p < $_SESSION['additionalProducts']; $p++) {
										$spec_id = filter_var($_POST['hiddenspecid'.$p], FILTER_SANITIZE_STRING);
										$spec_details = filter_var($_POST['txtadditionalspec'.$p], FILTER_SANITIZE_STRING);

										if ($spec_details != "") {
											$insert_additional_spec_array = array('productid' => $productid_for_details, 'spectypeid' => $spec_id, 'specvalue' => $spec_details);
											$insert_additional_spec_query = $db->query("INSERT INTO tbl_additional_product_details (product_id, spec_type_id, spec_value) VALUES (:productid, :spectypeid, :specvalue)", $insert_additional_spec_array);
										}
										
									}

									

			      			}

							$successMessage = "Product sent for aproval successfully.!";
							// Upload user mail
							$to = $_SESSION['vendesiya_useremail'];
							$email = "online@vendesiya.lk";
				 			$email_admin = "karthiklenzy@gmail.com";
							$subject = "Product Upload | ".SITE_NAME;
							$the_heading = $subject;
							$product_img_link = $image_path_to_upload;
							$the_message_to_be_sent .= '<img src="';
                    		$the_message_to_be_sent .= HTTP_PATH;
                    		$the_message_to_be_sent .= $prod_main_img;
                    		$the_message_to_be_sent .='" width="150"><br><br>';
							$the_message_to_be_sent .= '<h3><b>Your product successfully uploaded & sent for aproval.</b><br>within 24 hours your product will be active on Vendesiya after reviewing that product.</h3>';
							include DOC_ROOT.'includes/email_template.php';
				 	    	$sent =mailing::html_mail($to,$subject,$admin_template,$email);
				 	    	// Upload user mail end
							setcookie("SuccessMessage", $successMessage, time() + (20 * 1), "/");
							header("Location:".HTTP_PATH."user-profile");
						}
						else {
							$errorMessage = "Error in adding the product";
							setcookie("ErrorMessage", $errorMessage, time() + (20 * 1), "/"); // 1 minute
							header("Location:".HTTP_PATH."user-profile");
						}	
            		}
		      		
		      		
		      	}

		      	else {
					
				}
		}

		
	 }
}

$include_file = 'pages/upload_item_details_page.php';
include 'template.php';
?>