<?php
include_once 'top.php';
include_once DOC_ROOT.'classes/db_connection.php';

if (isset($_SESSION['vendesiya_user_name'])) {
	header("Location:".HTTP_PATH."user-profile/".$_SESSION['vendesiya_user_name']);
}

if (isset($_POST['btnlogin'])) {

	$error_count = 0;
	$error_message = "";

	$txtusername = filter_var($_POST['txtusername'], FILTER_SANITIZE_STRING);
	$txtpassword = filter_var($_POST['txtpassword'], FILTER_SANITIZE_STRING);

	$txtusername = trim($txtusername);
	$md5password = md5($txtpassword);

	$loginattemptArray = array('username' => $txtusername, 'userpassword' => $md5password);
	$loginattemptQuery = $db->query("SELECT user_id, user_name, user_status FROM tbl_user WHERE user_name = :username AND user_password = :userpassword", $loginattemptArray);

	if ($loginattemptQuery) {
		if ($loginattemptQuery[0]['user_status'] != 1) {
			$error_message .= "<li>User not active.!</li>";
			$error_count++;
		}
		else{

			for ($i=0; $i < count($loginattemptQuery); $i++) {
				$_SESSION['vendesiya_user_id'] = $loginattemptQuery[$i]['user_id'];
				$_SESSION['vendesiya_user_name'] = $loginattemptQuery[$i]['user_name'];
				$username = $loginattemptQuery[$i]['user_name'];

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
			}
			if (isset($_GET['redirect_url'])) {
				header("Location:".$_GET['redirect_url']);
			}
			else{
				header("Location:".HTTP_PATH."user-profile/".$username);
			}
		}
	}
	else{
		$error_message .= "<li>Username or password incorrect</li>";
		$error_count++;
	}

}

$include_file = DOC_ROOT.'pages/login_page.php';
include_once DOC_ROOT.'template.php';

if (isset($error_count)) {
	if ($error_count != 0) {
		echo "<script> $('#displayerrormodel').modal({ show: true });</script>";
	}
}
?>