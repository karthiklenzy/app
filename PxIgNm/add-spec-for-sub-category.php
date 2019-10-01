<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

if (isset($_GET['sub_cat_id'])) {
	$sub_cat_id = filter_var($_GET['sub_cat_id']);
	$getallspecifications_query = $db->query("SELECT * FROM tbl_spec_type");

	$getexistingspec_array = array('subcateid' => $sub_cat_id);
	$getexistingspec_query = $db->query("SELECT spec_value_id FROM tbl_spec_value WHERE sub_category_id = :subcateid", $getexistingspec_array);
}
else{
	header("Location:".BACKEND_PATH."categories");
}

	$error_count = 0;

	if (isset($_POST['btnsave'])) {
		$selectspecification = filter_var($_POST['selectspecification'], FILTER_SANITIZE_STRING);

		$selectspecification = trim($selectspecification);

		if(!empty($_POST['chkrequired'])){ 
			$checkboxrequired = "1"; 
		} 
		else { 
			$checkboxrequired = "0"; 
		}

		if($selectspecification == ""){
			$error_message = "Please add a valid specification..!";
			$error_count++;
		}
		else{
			$check_existing_selectspecification_array = array('spectype' => $selectspecification, 'subcateid' => $sub_cat_id);
			$check_existing_selectspecification_query = $db->query("SELECT spec_value_id FROM tbl_spec_value WHERE sub_category_id = :subcateid AND spec_type_id = :spectype", $check_existing_selectspecification_array);

			if ($check_existing_selectspecification_query) {
				$error_message = "The specification already added..!";
				$error_count++;
			}
			else{
				$add_selectspecification_array = array('spectype' => $selectspecification, 'subcateid' => $sub_cat_id, 'subcatrequired' => $checkboxrequired);
				$add_selectspecification_query = $db->query("INSERT INTO tbl_spec_value (sub_category_id, spec_type_id, spec_required) VALUES (:subcateid, :spectype, :subcatrequired)", $add_selectspecification_array);

				if ($add_selectspecification_query) {
					$successMessage = "Specification successfully added to the sub-category..!";
					setcookie("cookieSuccessMessageAddSpec", $successMessage, time() + (20 * 1), "/"); // 1 minute
						
					header("Location:".BACKEND_PATH."view-sub-category?sub_cat_id=".$sub_cat_id);
				}
				else{
					$error_message = "An error occured while entering data, please try again..!";
					$error_count++;
				}
			}
		}
	}


$include_file = BACKEND_DOC_ROOT.'pages/add_spec_for_sub_category_page.php';
include_once BACKEND_DOC_ROOT.'template.php';
?>