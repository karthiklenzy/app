<?php
if(!isset($_SESSION['cms_user_id'])) {
	header("Location:".BACKEND_PATH);
}
else {
	$user_auth_results_data_array = array("uid"=>$_SESSION['cms_user_id']);
  $user_auth_results = $db->query("SELECT * FROM tbl_cms_users WHERE cms_user_id = :uid", $user_auth_results_data_array);

  	if ($user_auth_results) {
  		$_SESSION['cms_user_id'] = $user_auth_results[0]['cms_user_id'];
  		$_SESSION['cms_user_name'] = $user_auth_results[0]['cms_user_username'];
      $_SESSION['cms_user_status'] = $user_auth_results[0]['cms_user_status'];
     
  	}
  	else {
      session_destroy();
  		header("Location:".BACKEND_PATH);
  	}
}
?>