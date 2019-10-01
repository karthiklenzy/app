<?php
date_default_timezone_set('Asia/Colombo');
$current_date_time = date('Y-m-d h:i:s');
// Tiny MCE option to text area Start
$contact = "yes";
// Tiny MCE option to text area End
include 'top.php';
include 'classes/db_connection.php';
include_once DOC_ROOT.'classes/mailing.class.php';
$error_count = 0;
$error_message = "";
if (isset($_POST['btn-submit'])) {
	$name = filter_var($_POST['name']);
	$mail = filter_var($_POST['email']);
	$number = filter_var($_POST['number']);
	$message = filter_var($_POST['message']);
	$numlength = strlen((string)$number);
	$current_date = date("Y-m-d");

	if ($name == "") {
		$error_message .= "<li><i class='fas fa-times-circle'></i>&emsp;Please Fill User Name</li>";
		$error_count++;
	}
	if ($mail == "") {
		$error_message .= "<li><i class='fas fa-times-circle'></i>&emsp;Please Fill User Email</li>";
		$error_count++;
	}
	if ($number == "") {
		$error_message .= "<li><i class='fas fa-times-circle'></i>&emsp;Please Fill User Number</li>";
		$error_count++;
	}
	if ($numlength != 10) {
		$error_message .= "<li><i class='fas fa-times-circle'></i>&emsp;Number Length Should be 10</li>";
		$error_count++;
	}
	if ($message == "") {
		$error_message .= "<li><i class='fas fa-times-circle'></i>&emsp;Please Fill User Message</li>";
		$error_count++;
	}

	if ($error_count == 0) {
		$contact_array = array('name' => $name, 'mail' =>$mail, 'number_user' => $number, 'message' => $message, 'cur_date' => $current_date);
		$contact_sql = $db->query("INSERT INTO tbl_contact (contact_user_name, contact_user_email, contact_user_number, contact_user_message, contact_user_date) VALUES (:name, :mail, :number_user, :message, :cur_date)", $contact_array);

		if ($contact_sql) {
			$successMessage = "Message Succesfully Sent.!";
			setcookie("successMessage", $successMessage, time() + (20 * 1), "/"); // 1 minute
			header("Location:".HTTP_PATH."contact-us");
		}
		else {
			$errorMessage = "Error in Sending Message.!";
			setcookie("errorMessage", $errorMessage, time() + (20 * 1), "/"); // 1 minute
			header("Location:".HTTP_PATH."contact-us");
		}
	}
	
}
	// $to = "karthiklenzy@gmail.com";
	// $email = "online@vendesiya.lk";
	// 	$email_admin = "karthiklenzy@gmail.com";
	// $subject = "Bid submission | ".SITE_NAME;
	// $the_heading = $subject;

	// $the_message_to_be_sent .= 'Product Expired';
	// include DOC_ROOT.'includes/email_template.php';
	// $sent =mailing::html_mail($to,$subject,$admin_template,$email);
$include_file = 'pages/contact_page.php';
include 'template.php';

if ($error_count != 0) {?>
	<script>
		$('#myModal').modal('show');
	</script>
<?php } ?>