<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

	if (isset($_POST['btnsave'])) {

		$error_count = 0;

		$txtsubcatname = filter_var($_POST['txtsubcatname'], FILTER_SANITIZE_STRING);
		$txtsubcaturl = filter_var($_POST['txtsubcaturl'], FILTER_SANITIZE_STRING);

		$txtsubcatname = trim($txtsubcatname);
		$txtsubcaturl = trim($txtsubcaturl);
		/* ************ Making the URL ************* */
			  $url_for_product = $txtsubcatname;
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
		        $path = "images/catagory-icons/"; // Upload directory
		        include DOC_ROOT.'PxIgNm/includes/imageupload.php'; 
	      	/* ********************************  //IMAGE UPLOAD ****************************** */
	if ($uploadOk == 1) {
		
	
		if($txtsubcatname == ""){
			$error_message = "Please add a valid category name..!";
			$error_count++;
		}
		else{
			$check_existing_subcategory_array = array('subcaturl' => $txtsubcaturl);
			$check_existing_subcategory_query = $db->query("SELECT category_url FROM tbl_category WHERE category_url = :subcaturl", $check_existing_subcategory_array);

			if ($check_existing_subcategory_query) {
				$error_message = "The category url already exists..!";
				$error_count++;
			}
			else{
				$add_sub_category_array = array('catname' => $txtsubcatname, 'caturl' => $txtsubcaturl, 'image_path_to_upload' => $image_path_to_upload);
				$add_sub_category_query = $db->query("INSERT INTO tbl_category (category_name, category_url, category_icon) VALUES (:catname, :caturl, :image_path_to_upload)", $add_sub_category_array);

				if ($add_sub_category_query) {
					$successMessage = "Category successfully added..!";
					setcookie("cookieSuccessMessageAddCat", $successMessage, time() + (20 * 1), "/"); // 1 minute
						
					header("Location:".BACKEND_PATH."categories");
				}
				else{
					$error_message = "An error occured while entering data, please try again..!";
					$error_count++;
				}
			}
		}
	} 
 }


$include_file = BACKEND_DOC_ROOT.'pages/add_category_page.php';
include_once BACKEND_DOC_ROOT.'template.php';
?>