<?php
include 'top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'classes/mailing.class.php';
include_once DOC_ROOT.'functions.php';

if (isset($_POST['btn-submit'])) {
	$email_user = filter_var($_POST['valid_mail'], FILTER_SANITIZE_STRING);
	$email_array = array('email' => $email_user);
	$email_sql = $db->query("SELECT user_id, user_name, user_email, user_verification_key FROM tbl_user WHERE user_email = :email", $email_array);

	if ($email_sql) {
		// email
		$to = $email_user;
		$email = "online@vendesiya.lk";
	 	$email_admin = "karthiklenzy@gmail.com";
		$subject = "Password Change | ".SITE_NAME;
		$the_heading = $subject;

    	$the_message_to_be_sent .= '<b>Please visit below link to change your password</b><br>Link : <a href="'.HTTP_PATH.'forgot-password-change?userverifyid='.$email_sql[0]['user_verification_key'].'">'.HTTP_PATH.'forgot-password-change</a>';
    	include DOC_ROOT.'includes/email_template.php';
 	    $sent =mailing::html_mail($to,$subject,$admin_template,$email);
 	     $the_message_to_be_sent = "";
 	     // End email
		$success_message = "Check your email to change your password.!";
		setcookie("cookieSuccessMessage", $success_message, time() + (5 * 1), "/");
		header("Location:".HTTP_PATH."forgot-password");
		

	}
	else {
		$error_message = "Your are not a registered user.!";
		setcookie("cookieErrorMessage", $error_message, time() + (5 * 1), "/");
		
		header("Location:".HTTP_PATH."forgot-password");
	}
}

$include_file = DOC_ROOT.'pages/forgot_password_page.php';
include DOC_ROOT.'template.php';

?>