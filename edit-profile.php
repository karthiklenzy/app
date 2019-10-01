<?php
include 'top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'includes/auth_user.php';
include_once DOC_ROOT.'functions.php';

if (isset($_SESSION['vendesiya_user_id'])) {
	if (isset($_POST['btn-up'])) {
		$user_id_new = $_SESSION['vendesiya_user_id'];

		$user_name_new = filter_var($_POST['user_new']);
		$user_number_new = filter_var($_POST['new_number']);
		$user_address_new = filter_var($_POST['new_address']);
		$user_nic_new = filter_var($_POST['new_nic']);

		$user_district_new = filter_var($_POST['selectlocation']);
		$user_district_sub_area_new = filter_var($_POST['selectsubarea']);

		$user_details = array('user_id' => $user_id_new, 'user_name' => $user_name_new, 'user_number' => $user_number_new, 'address' => $user_address_new, 'nic' => $user_nic_new, 'district' => $user_district_new, 'area' => $user_district_sub_area_new);
		$user_details_query = $db->query("UPDATE tbl_user SET user_name = :user_name, user_phone = :user_number, user_address_line_one = :address, user_nic_number = :nic, user_province = :district, user_city = :area WHERE user_id = :user_id", $user_details);

			if ($user_details_query) {
				$suc_message = "Successfully Updated.!";
				setcookie("cookieSuccessMessage", $suc_message, time() + (5 * 1), "/");
				header("Location:".HTTP_PATH."edit-profile");
			}
	}

	$user_array = array('id' => $_SESSION['vendesiya_user_id']);
	$user_details = $db->query("SELECT * FROM tbl_user WHERE user_id = :id",$user_array);

	$getlocation_query = $db->query("SELECT * FROM tbl_districts");

	if ((isset($selectlocation)) && ($selectlocation != "")) {
		$getsubcategory_query_one_array = array('cat_id' => $selectlocation);
		$getsubcategory_query_one = $db->query("SELECT * FROM tbl_district_sub_area WHERE district_id = :cat_id", $getsubcategory_query_one_array);
	}

	$district_id_location = $user_details[0]['user_province'];
	if (isset($district_id_location)) {
		$location_array = array('location_id' => $district_id_location);
		$location_sql = $db->query("SELECT district_name FROM tbl_districts WHERE district_id = :location_id", $location_array);

		$area_id = $user_details[0]['user_city'];
		$area_array = array('area_id' => $area_id);
		$area_sql = $db->query("SELECT area_name FROM tbl_district_sub_area WHERE area_id = :area_id", $area_array);
	
		$getsubarea_array_one = array('dis_id' => $user_details[0]['user_province']);
		$getsubarea_query_one = $db->query("SELECT * FROM tbl_district_sub_area_new WHERE district_id = :dis_id", $getsubarea_array_one);
	}

}
else{
	echo 'error'; exit();
}
// District dropdown
$get_districts = $db->query("SELECT * FROM tbl_districts");

if ((isset($selectdistrict)) && ($selectdistrict != "")) {
	$getdistrict_query_one_array = array('district_id' => $selectdistrict);
	$get_district_query_one = $db->query("SELECT * FROM tbl_district_sub_area_new WHERE district_id = :district_id", $getdistrict_query_one_array);
}

$include_file = 'pages/edit_profile_page.php';
include 'template.php';
?>