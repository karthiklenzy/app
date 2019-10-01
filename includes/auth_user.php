<?php
if(!isset($_SESSION['vendesiya_user_id'])) {
	header("Location:".HTTP_PATH."login-user");
}
else {
	$user_auth_results_data_array = array("uid" => $_SESSION['vendesiya_user_id'], "userstatus" => '1');
  $user_auth_results = $db->query("SELECT * FROM tbl_user WHERE user_id = :uid AND user_status = :userstatus", $user_auth_results_data_array);

  	if ($user_auth_results) {
  		$_SESSION['vendesiya_user_id'] = $user_auth_results[0]['user_id'];
      $_SESSION['vendesiya_user_name'] = $user_auth_results[0]['user_name'];
      $_SESSION['vendesiya_user_first_name'] = $user_auth_results[0]['user_first_name'];
      $_SESSION['vendesiya_user_last_name'] = $user_auth_results[0]['user_last_name'];
      $_SESSION['vendesiya_useremail'] = $user_auth_results[0]['user_email'];
      $_SESSION['vendesiya_userphone'] = $user_auth_results[0]['user_phone'];
      $_SESSION['vendesiya_useraddresslineone'] = $user_auth_results[0]['user_address_line_one'];
      // $_SESSION['vendesiya_useraddresslinetwo'] = $user_auth_results[0]['user_address_line_two'];
      $_SESSION['vendesiya_usercity'] = $user_auth_results[0]['user_city'];
      $_SESSION['vendesiya_userprovince'] = $user_auth_results[0]['user_province'];
      $_SESSION['vendesiya_userpostalcode'] = $user_auth_results[0]['user_postal_code'];
      $_SESSION['vendesiya_usernicnumber'] = $user_auth_results[0]['user_nic_number'];
      $_SESSION['vendesiya_userstatus'] = $user_auth_results[0]['user_status'];
     
  	}
  	else {
      session_destroy();
  		header("Location:".HTTP_PATH."login-user");
  	}
}
?>