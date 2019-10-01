<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

if(isset($_GET['cat_id'])){
	$category_id = $_GET['cat_id'];
	$category_name = getcategoryname($category_id);
	$error_count = 0;

	if (isset($_POST['btnsave'])) {
		$txtsubcatname = filter_var($_POST['txtsubcatname'], FILTER_SANITIZE_STRING);
		$txtsubcaturl = filter_var($_POST['txtsubcaturl'], FILTER_SANITIZE_STRING);
		$txtbidpricemargin = filter_var($_POST['txtbidpricemargin'], FILTER_SANITIZE_STRING);

		$txtsubcatname = trim($txtsubcatname);
		$txtsubcaturl = trim($txtsubcaturl);
		$txtbidpricemargin = trim($txtbidpricemargin);

		$check_existing_subcategory_array = array('subcaturl' => $txtsubcaturl);
		$check_existing_subcategory_query = $db->query("SELECT sub_category_url FROM tbl_sub_category WHERE sub_category_url = :subcaturl", $check_existing_subcategory_array);

		if ($check_existing_subcategory_query) {
			$error_message = "The sub-category url already exists..!";
			$error_count++;
		}
		else if(!is_numeric ($txtbidpricemargin)){
			$error_message = "Invalid price format..!";
			$error_count++;
		}
		else{
			$add_sub_category_array = array('categoryid' => $category_id, 'subcatname' => $txtsubcatname, 'subcaturl' => $txtsubcaturl);
			$add_sub_category_query = $db->query("INSERT INTO tbl_sub_category (sub_category_name, sub_category_url, category_id) VALUES (:subcatname, :subcaturl, :categoryid)", $add_sub_category_array);

			if ($add_sub_category_query) {

				$getsubcatid_array = array('subcaturl' => $txtsubcaturl);
				$getsubcatid_query = $db->query("SELECT sub_category_id FROM tbl_sub_category WHERE sub_category_url = :subcaturl", $getsubcatid_array);
				$subcat_id = $getsubcatid_query[0]['sub_category_id'];

				/* Add the bidding price margin */
					$addbiddingpricemargin_array = array('subcatid' => $subcat_id, 'priceschemeamount' => $txtbidpricemargin, 'addeduser' => $_SESSION['cms_user_id']);
					$addbiddingpricemargin_query = $db->query("INSERT INTO tbl_price_scheme (sub_category_id, price_scheme_amount, cms_user_id) VALUES (:subcatid, :priceschemeamount, :addeduser)", $addbiddingpricemargin_array);
				/* //Add the bidding price margin */

				if($addbiddingpricemargin_query){
					$successMessage = "Sub-category successfully added..!";
					setcookie("cookieSuccessMessageAddCat", $successMessage, time() + (20 * 1), "/"); // 1 minute
						
					header("Location:".BACKEND_PATH."categories");
				}
				else{
					$error_message = "An error occured while entering data, please try again..!";
					$error_count++;
				}
			}
			else{
				$error_message = "An error occured while entering data, please try again..!";
				$error_count++;
			}
		}
	}
}
else{
	header("Location:".BACKEND_PATH."home");
}

$include_file = BACKEND_DOC_ROOT.'pages/add_sub_categories_page.php';
include_once BACKEND_DOC_ROOT.'template.php';
?>