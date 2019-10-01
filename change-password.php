<?php
include 'top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'includes/auth_user.php';
include_once DOC_ROOT.'functions.php';

if (isset($_POST['btn-update'])) {
	$pass_old = md5($_POST['password']);
	$pass_new = $_POST['password_new'];
	$pass_new_again = $_POST['pasword_two'];
	$user_id = $_SESSION['vendesiya_user_id'];
	$password_array = array('id' => $user_id);
	$select_password_query = $db->query("SELECT user_password FROM tbl_user WHERE user_id = :id",$password_array);

		if ($select_password_query) {
			for ($i=0; $i < count($select_password_query); $i++) { 
				$password = $select_password_query[0]['user_password'];

				if ($pass_old == $password && $pass_new == $pass_new_again) {
					$pass_new = md5($pass_new);
					$change_password = array('pass' => $pass_new, 'id_user' => $user_id);
					$change_password_sql = $db->query("UPDATE tbl_user SET user_password = :pass WHERE user_id = :id_user",$change_password);

					$suc_message = "Successfully Updated.!";
					setcookie("cookieSuccessMessage", $suc_message, time() + (5 * 1), "/");
					header("Location:".HTTP_PATH."change-password");
				}
				else {
					$error_message = "Please Check Old and New Password.!";
					setcookie("cookieErrorMessage", $error_message, time() + (5 * 1), "/");
					header("Location:".HTTP_PATH."change-password");
				}

			}
		}	
	
}

if ((isset($selectproductcategory)) && ($selectproductcategory != "")) {
	$getsubcategory_query_one_array = array('cat_id' => $selectproductcategory);
	$getsubcategory_query_one = $db->query("SELECT * FROM tbl_district_sub_area WHERE district_id = :cat_id", $getsubcategory_query_one_array);
}

$include_file = 'pages/change_password_page.php';
include 'template.php';
?>