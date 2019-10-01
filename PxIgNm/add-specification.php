<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

	$error_count = 0;

	if (isset($_POST['btnsave'])) {
		$txtspecname = filter_var($_POST['txtspecname'], FILTER_SANITIZE_STRING);

		$txtspecname = trim($txtspecname);

		if($txtspecname == ""){
			$error_message = "Please add a valid specification name..!";
			$error_count++;
		}
		else{
			$check_existing_specification_array = array('specname' => $txtspecname);
			$check_existing_specification_query = $db->query("SELECT spec_type_name FROM tbl_spec_type WHERE spec_type_name = :specname", $check_existing_specification_array);

			if ($check_existing_specification_query) {
				$error_message = "The specification already exists..!";
				$error_count++;
			}
			else{
				$add_specification_array = array('specname' => $txtspecname);
				$add_specification_query = $db->query("INSERT INTO tbl_spec_type (spec_type_name) VALUES (:specname)", $add_specification_array);

				if ($add_specification_query) {
					$successMessage = "Specification successfully added..!";
					setcookie("cookieSuccessMessageAddSpec", $successMessage, time() + (20 * 1), "/"); // 1 minute
						
					header("Location:".BACKEND_PATH."specifications");
				}
				else{
					$error_message = "An error occured while entering data, please try again..!";
					$error_count++;
				}
			}
		}
	}


$include_file = BACKEND_DOC_ROOT.'pages/add_specification_page.php';
include_once BACKEND_DOC_ROOT.'template.php';
?>