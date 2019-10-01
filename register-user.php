<?php
include 'top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

if (isset($_SESSION['vendesiya_user_name'])) {
	header("Location:".HTTP_PATH."user-profile");
}
$error_count = 0;
$error_message = "";
if (isset($_POST['btn-sign'])) {
	$error_count = 0;
	$error_message = "";
	$firstname = trim(filter_var($_POST['firstname'], FILTER_SANITIZE_STRING));
	$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
	$lastname = trim(filter_var($_POST['lastname'], FILTER_SANITIZE_STRING));
	$mobile = trim(filter_var($_POST['mobile'], FILTER_SANITIZE_STRING));
	$mail = trim(filter_var($_POST['mail'], FILTER_SANITIZE_STRING));
	$nic = trim(filter_var($_POST['nic'], FILTER_SANITIZE_STRING));
	$postcode = trim(filter_var($_POST['postcode'], FILTER_SANITIZE_STRING));
	$textarea = filter_var($_POST['textarea'], FILTER_SANITIZE_STRING);
	$district = filter_var($_POST['selectdistrict'], FILTER_SANITIZE_STRING);
	$city = filter_var($_POST['selectdistrictsub'], FILTER_SANITIZE_STRING);
	
	// Session for variables
	$_SESSION['firstname'] = trim(filter_var($_POST['firstname'], FILTER_SANITIZE_STRING));
	$_SESSION['username'] = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
	$_SESSION['lastname'] = trim(filter_var($_POST['lastname'], FILTER_SANITIZE_STRING));
	$_SESSION['mobilenumber'] = trim(filter_var($_POST['mobile'], FILTER_SANITIZE_STRING));
	$_SESSION['emailaddress'] = trim(filter_var($_POST['mail'], FILTER_SANITIZE_STRING));
	$_SESSION['password'] = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
	$_SESSION['repassword'] = trim(filter_var($_POST['repassword'], FILTER_SANITIZE_STRING));
	$_SESSION['nicnumber'] = trim(filter_var($_POST['nic'], FILTER_SANITIZE_STRING));
	$_SESSION['userpostalcode'] = trim(filter_var($_POST['postcode'], FILTER_SANITIZE_STRING));
	$_SESSION['addresslineone'] = trim(filter_var($_POST['textarea'], FILTER_SANITIZE_STRING));
	$_SESSION['selectdistrict'] = trim(filter_var($_POST['selectdistrict']));
	$_SESSION['selectdistrictsub'] = trim(filter_var($_POST['selectdistrictsub']));
	$_SESSION['passlength'] = strlen($_SESSION['password']);
	$_SESSION['md5password'] = md5($_SESSION['password']);
	$_SESSION['smsverification'] = rand(1000,9999);
	
	
		if (isset($mail)) {
			$check_user_array = array('user_email' => $_SESSION['emailaddress']);
			$check_user_sql = $db->query("SELECT user_email FROM tbl_user WHERE user_email = :user_email", $check_user_array);
			if ($check_user_sql) {
				$error_message .= '<li><i class="fa fa-times-circle"></i>User Email already exist.!</li>';
				$error_count++;
			}
		}
		if ($_SESSION['firstname'] == "") {
			$error_message .= '<li><i class="fa fa-times-circle"></i>Please enter the first name.!</li>';
			$error_count++;
		}
		if ($_SESSION['username'] == "") {
			$error_message .= '<li><i class="fa fa-times-circle"></i>Please enter the user name.!</li>';
			$error_count++;
		}
		if ($_SESSION['lastname'] == "") {
			$error_message .= '<li><i class="fa fa-times-circle"></i>Please enter the last name.!</li>';
			$error_count++;
		}
		
		if ($_SESSION['emailaddress'] == "") {
			$error_message .= '<li><i class="fa fa-times-circle"></i>Please enter the E-mail.!</li>';
			$error_count++;
		}
		
		if ($_SESSION['mobilenumber'] == "") {
			$error_message .= '<li><i class="fa fa-times-circle"></i>Please enter the number.!</li>';
			$error_count++;
		}
		else{

			$number_length = strlen($_SESSION['mobilenumber']);
				if(!is_numeric($_SESSION['mobilenumber'])){
					$error_message .= '<li><i class="fa fa-times-circle"></i>Invalid format for contact number.!</li>';
					$error_count++;
				}
				else if($number_length != 10){
					$error_message .= '<li><i class="fa fa-times-circle"></i>10 Numbers required for contact number.!</li>';
					$error_count++;
				}
				
		}
		if ($_SESSION['passlength'] < 8) {
			$error_message .= '<li><i class="fa fa-times-circle"></i>Password required minimum length 8</li>';
			$error_count++;
		}
		if ($_SESSION['addresslineone'] == "") {
			$error_message .= '<li><i class="fa fa-times-circle"></i>Please enter the address details.!</li>';
			$error_count++;
		}
		if ($_SESSION['nicnumber'] == "") {
			$error_message .= '<li><i class="fa fa-times-circle"></i>Please enter the nic number.!</li>';
			$error_count++;
		}
		else{
			$nic_length = strlen($_SESSION['nicnumber']);
			if ($nic_length == 10) {
				if ((substr($_SESSION['nicnumber'], -1) != 'V') && (substr($_SESSION['nicnumber'], -1) != 'v') && (substr($_SESSION['nicnumber'], -1) != 'X') && (substr($_SESSION['nicnumber'], -1) != 'x')) {
				$error_message .= '<li><i class="fa fa-times-circle"></i>Please enter a valid format for NIC</li>';
				$error_count++;
				}
			}
			else if ($nic_length == 12) {
				if (!is_numeric($nic)) {
				$error_message .= '<li><i class="fa fa-times-circle"></i>There should be 12 numbers for the NIC number.!</li>';
				$error_count++;
				}
			
			}
			else {
				$error_message .= '<li><i class="fa fa-times-circle"></i>Required valid NIC format.!</li>';
				$error_count++;
			}
			
		}

		if ($_SESSION['password'] != $_SESSION['repassword']) {
			$error_message .= '<li><i class="fa fa-times-circle"></i>Please add same password.!</li>';
			$error_count++;
		}
		if ($_SESSION['selectdistrictsub'] == "") {
			$error_message .= '<li><i class="fa fa-times-circle"></i>Please select city.!</li>';
			$error_count++;
		}

		if ($error_count == 0) {
			header("Location:".HTTP_PATH."verification");
		}
	
}
$area_data = $db->query("SELECT district_id, district_name FROM tbl_districts");
$sub_area_data = $db->query("SELECT area_name, area_id FROM tbl_district_sub_area WHERE district_id = 1 ORDER BY area_id ASC");

// District dropdown
$get_districts = $db->query("SELECT * FROM tbl_districts WHERE district_status = '1'");

if ((isset($selectdistrict)) && ($selectdistrict != "")) {
	$getdistrict_query_one_array = array('district_id' => $selectdistrict);
	$get_district_query_one = $db->query("SELECT * FROM tbl_district_sub_area", $getdistrict_query_one_array);
}

$include_file = DOC_ROOT.'pages/register_user_page.php';
include DOC_ROOT.'template.php';

if ((isset($error_count)) && ($error_count != 0)) {
	//echo "<script> $('#myModal').modal({ show: true });</script>";
	echo "<script> $('#myModal').modal('show'); </script>";
}

?>