<?php
include 'top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'classes/mailing.class.php';
include_once DOC_ROOT.'functions.php';

if (!isset($_GET['userverifyid'])) {
	header("Location:".HTTP_PATH."forgot-password");
}
if(isset($_SESSION['vendesiya_user_id'])) {
	header("Location:".HTTP_PATH."user-profile");
}

if (isset($_POST['btn-submit'])) {
	$error_count = 0;
	$error_message_verify = "";
	$password_one = filter_var($_POST['valid_password_one'], FILTER_SANITIZE_STRING);
	$password_two = filter_var($_POST['valid_password_two'], FILTER_SANITIZE_STRING);
	$password_one_length = strlen($password_one);
	$password_two_length = strlen($password_two);

	if ($password_one != $password_two) {
		$error_message_verify .= '<li><i class="fa fa-times-circle"></i>Passwords does not matching.!</li>';
		$error_count++;
	}
	if ($password_one_length < 8 || $password_two_length < 8) {
		$error_message_verify .= '<li><i class="fa fa-times-circle"></i>Password required minimum length 8</li>';
		$error_count++;
	}
	if ($password_one == "" || $password_two == "") {
		$error_message_verify .= '<li><i class="fa fa-times-circle"></i>Password can not be empty.!</li>';
		$error_count++;
	}

	if ($error_count == 0) {
		$password_one = md5($password_one);
		$verification_code = filter_var($_GET['userverifyid']);
		$password_array = array('verification_code' => $verification_code, 'password' => $password_one);
		$password_query = $db->query("UPDATE tbl_user SET user_password = :password WHERE user_verification_key = :verification_code", $password_array);

		if ($password_query) {
			$suc_message = "Password Successfully Changed.!";
			setcookie("verifyMessage", $suc_message, time() + (5 * 1), "/");
			header("Location:".HTTP_PATH."login-user");
		}
	}

}

$include_file = DOC_ROOT.'pages/forgot_password_change_page.php';
include DOC_ROOT.'template.php';

if (isset($error_message_verify)) {
	//echo "<script> $('#myModal').modal({ show: true });</script>";
	echo "<script> $('#myModal').modal('show'); </script>";
}
?>