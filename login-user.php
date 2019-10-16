<?php
include 'top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'classes/mailing.class.php';
include_once DOC_ROOT.'functions.php';

if (isset($_SESSION['vendesiya_user_name'])) {
	header("Location:".HTTP_PATH."user-profile");
}
if (isset($_POST['btnlog'])) {

	$error_count = 0;
	$error_message = "";

	$txtusername = filter_var($_POST['valid_username'], FILTER_SANITIZE_STRING);
	$txtpassword = filter_var($_POST['valid_pass'], FILTER_SANITIZE_STRING);

	$txtusername = trim($txtusername);
	$md5password = md5($txtpassword);
	$loginattemptArray = array('username' => $txtusername, 'userpassword' => $md5password);
	$sql_getdata = "SELECT user_id, user_name, user_status, user_email, user_phone FROM tbl_user WHERE user_password = :userpassword";
	// Check user login with email or username or number
	if(filter_var($_POST['valid_username'], FILTER_VALIDATE_EMAIL)) {
		$sql_getdata .= " AND user_email = :username";
    }
    else if(is_numeric($txtusername)) {
    	$sql_getdata .= " AND user_phone = :username";
    }
    else {
    	$sql_getdata .= " AND user_name = :username";
    }

    $loginattemptQuery = $db->query($sql_getdata, $loginattemptArray);
	// End Check user login with email or username or number
	if ($loginattemptQuery) {
		if ($loginattemptQuery[0]['user_status'] != 1) {
			$error_message = "User Not active. verifiy account by Email link.!";
			setcookie("cookieErrorLogMessage", $error_message, time() + (10 * 1), "/");
			
			header("Location:".HTTP_PATH."login-user");
		}
		else{

			for ($i=0; $i < count($loginattemptQuery); $i++) {
				$_SESSION['vendesiya_user_id'] = $loginattemptQuery[$i]['user_id'];
				$_SESSION['vendesiya_user_name'] = $loginattemptQuery[$i]['user_name'];
				$username = $loginattemptQuery[$i]['user_name'];
				$_SESSION['user_email'] = $loginattemptQuery[$i]['user_email'];
				$_SESSION['user_phone'] = $loginattemptQuery[$i]['user_phone'];

				/*
				$_SESSION['username'] = $loginattemptQuery[$i]['user_name'];
				$_SESSION['userfirstname'] = $loginattemptQuery[$i]['user_first_name'];
				$_SESSION['userlastname'] = $loginattemptQuery[$i]['user_last_name'];
				$_SESSION['useremail'] = $loginattemptQuery[$i]['user_email'];
				$_SESSION['userphone'] = $loginattemptQuery[$i]['user_phone'];
				$_SESSION['useraddresslineone'] = $loginattemptQuery[$i]['user_address_line_one'];
				$_SESSION['useraddresslinetwo'] = $loginattemptQuery[$i]['user_address_line_two'];
				$_SESSION['usercity'] = $loginattemptQuery[$i]['user_city'];
				$_SESSION['userprovince'] = $loginattemptQuery[$i]['user_province'];
				$_SESSION['userpostalcode'] = $loginattemptQuery[$i]['user_postal_code'];
				$_SESSION['usernicnumber'] = $loginattemptQuery[$i]['user_nic_number'];
				$_SESSION['userstatus'] = $loginattemptQuery[$i]['user_status'];
				*/
				if (isset($_GET['redirect_url'])) {
  					header("Location:".$_GET['redirect_url']);
				}
				else {
					header("Location:".HTTP_PATH."user-profile");
				}
				
			}
			
		}
	}
	else{
		$error_message = "Username or password not matching.!";
		setcookie("cookieErrorLogMessage", $error_message, time() + (10 * 1), "/");
		
		header("Location:".HTTP_PATH."login-user");
	}

}

	// Email Verification
	if (isset($_GET['verifymail'])) {
		$verify_mail_id = filter_var($_GET['verifymail']);
		$verification_array = array('verify_mail_key' => $verify_mail_id);
		$verification_query = $db->query("SELECT user_email FROM tbl_user WHERE user_verification_key = :verify_mail_key", $verification_array);
		
		
		if ($verification_query) {
			$activate_account = $db->query("UPDATE tbl_user SET user_status = 1 WHERE user_verification_key = :verify_mail_key", $verification_array);
			$error_message = '<li><i class="fa fa-check-circle green"></i>Your acount is activated.! Login to upload yout items.</li>';
			
		}
		else {
			$error_message = '<li><i class="fa fa-times-circle red"></i>Invalid link.! please check valid email address</li>';
		}

		
	}
	// Email Verification End



$sub_area_data = $db->query("SELECT area_name, area_id FROM tbl_district_sub_area WHERE district_id = 1 ORDER BY area_id ASC");

$include_file = DOC_ROOT.'pages/login_user_page.php';
include DOC_ROOT.'template.php';

// if ((isset($error_count)) && ($error_count != 0)) {
// 	//echo "<script> $('#myModal').modal({ show: true });</script>";
// 	echo "<script> $('#myModal').modal('show'); </script>";
// }
if (isset($error_message)) {
	//echo "<script> $('#myModal').modal({ show: true });</script>";
	echo "<script> $('#myModal').modal({ show: true });</script>";
	
}
?>