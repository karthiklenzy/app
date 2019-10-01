<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';

if(isset($_SESSION['cms_user_id'])) {
  header("Location:".BACKEND_PATH."home");
}

if (isset($_POST['btnlogin'])) {

	$username = filter_var($_POST['txtusername'], FILTER_SANITIZE_STRING);
	$username = trim($username); /* Remove space at the end */

  	$password = filter_var($_POST['txtpassword'], FILTER_SANITIZE_STRING);
  	$md5_password = md5($password);

  	$data_array = array("username"=>$username,"userpassword"=>$md5_password);
  	$results = $db->query("SELECT * FROM tbl_cms_users WHERE cms_user_username = :username AND cms_user_password = :userpassword", $data_array);

  	if ($results) {
  		$_SESSION['cms_user_id'] = $results[0]['cms_user_id'];
      $_SESSION['cms_user_status'] = $results[0]['cms_user_status'];
  		header("Location:".BACKEND_PATH);
  	}
  	else{
  		$error_message = "Username or password wrong.!";
  	}
}

include_once BACKEND_DOC_ROOT.'pages/index_page.php';
?>