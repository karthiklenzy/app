<?php
include 'top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'classes/mailing.class.php';
include_once DOC_ROOT.'functions.php';

	if (!isset($_SESSION['smsverification'])) {
		header("Location:".HTTP_PATH."register-user");
	}
	if (isset($_POST['btn-proceed'])) {
		$verification_code = filter_var($_POST['verif_code']);
		// $_SESSION['smsverification'] = rand(1000,9999); 
		// rand(1000,9999)
		$userverification = rand(100000000,999999999);
		$time_stamp = date("Y-m-d h:i:s");

		if ($_SESSION['smsverification'] == $verification_code) {
			// Email Sending
			$to = $_SESSION['emailaddress'];
			$email = "online@vendesiya.lk";
		 	$email_admin = "karthiklenzy@gmail.com";
			$subject = "Activate Your Account | ".SITE_NAME;
			$the_heading = $subject;
			$the_message_to_be_sent = '';
			$the_message_to_be_sent .= 'Please visit below link to verify your account <br> Link : <a href="http://vendesiya.lk/app/login-user?verifymail=';
			$the_message_to_be_sent .= $userverification; 
			$the_message_to_be_sent .= '" target="_blank">http://vendesiya.lk/app/login-user</a>';

			$user_array = array('username' => $_SESSION['username'], 'userfirstname' => $_SESSION['firstname'], 'userlastname' => $_SESSION['lastname'], 'usermobilenumber' => $_SESSION['mobilenumber'], 'useremailaddress' => $_SESSION['emailaddress'], 'userpassword' => $_SESSION['md5password'], 'useraddresslineone' => $_SESSION['addresslineone'], 'usercity' => $_SESSION['selectdistrictsub'], 'userprovince' => $_SESSION['selectdistrict'], 'userpostalcode' => $_SESSION['userpostalcode'], 'usernicnumber' => $_SESSION['nicnumber'], 'usersmsverification' => $_SESSION['smsverification'], 'userverificationkey' => $userverification, 'usercreateddate' => $time_stamp, 'userstatus' => '0');

			$user_sql = $db->query("INSERT INTO tbl_user (user_name, user_first_name, user_last_name, user_email, user_password, user_phone, user_address_line_one, user_city, user_province, user_postal_code, user_nic_number, user_sms_verification, user_verification_key, user_created_date, user_status) VALUES (:username, :userfirstname, :userlastname, :useremailaddress, :userpassword, :usermobilenumber, :useraddresslineone, :usercity, :userprovince, :userpostalcode, :usernicnumber, :usersmsverification, :userverificationkey, :usercreateddate, :userstatus)", $user_array);
				
				include DOC_ROOT.'includes/email_template.php';
				$sent =mailing::html_mail($to,$subject,$admin_template,$email);

				$success_message = "Successfully Registered.! Please verify email to activate your profile";
				setcookie("verifyMessage", $success_message, time() + (10 * 1), "/");
				header("Location:".HTTP_PATH."login-user");
		}
		else {
				$error_message = "Invalid verification code.!";
				setcookie("cookieErrorLogMessage", $error_message, time() + (10 * 1), "/");
				header("Location:".HTTP_PATH."verification");
		}
	}
$include_file = DOC_ROOT.'pages/verification_page.php';
include DOC_ROOT.'template.php';

?>