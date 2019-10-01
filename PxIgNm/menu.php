<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';

if (isset($_POST['btnsave'])) {

	if (isset($_POST['hiddentotalitems'])) {
		$number_of_total_items = filter_var($_POST['hiddentotalitems'], FILTER_SANITIZE_STRING);

		$txtmenuitemid = filter_var(isset($_POST['hiddenmenuitemid'.$number_of_total_items]), FILTER_SANITIZE_STRING);
		$txtmenuitem = filter_var($_POST['txtmenuitem'.$number_of_total_items], FILTER_SANITIZE_STRING);
		$txtmenuitemlink = filter_var($_POST['txtmenuitemlink'.$number_of_total_items], FILTER_SANITIZE_STRING);
		$txtmenuitemorder = filter_var($_POST['txtmenuitemorder'.$number_of_total_items], FILTER_SANITIZE_STRING);

		$insert_new_menu_item_array = array('menuitemid' => $txtmenuitemid, 'menuitem' => $txtmenuitem, 'menuitemlink' => $txtmenuitemlink, 'menuitemorder' => $txtmenuitemorder, 'menutype' => "1");
		$insert_new_menu_item_query = $db->query("INSERT INTO tbl_menu (menu_id, menu_item, menu_item_link, menu_item_order, menu_type) VALUES (:menuitemid, :menuitem, :menuitemlink, :menuitemorder, :menutype)", $insert_new_menu_item_array);

		if ($insert_new_menu_item_query) {
			for ($i=0; $i <= $number_of_total_items; $i++) {
				$txtmenuitemid = filter_var(isset($_POST['hiddenmenuitemid'.$i]), FILTER_SANITIZE_STRING);
				$txtmenuitem = filter_var($_POST['txtmenuitem'.$i], FILTER_SANITIZE_STRING);
				$txtmenuitemlink = filter_var($_POST['txtmenuitemlink'.$i], FILTER_SANITIZE_STRING);
				$txtmenuitemorder = filter_var($_POST['txtmenuitemorder'.$i], FILTER_SANITIZE_STRING);

				$update_menu_item_array = array('menuitemid' => $txtmenuitemid, 'menuitem' => $txtmenuitem, 'menuitemlink' => $txtmenuitemlink, 'menuitemorder' => $txtmenuitemorder, 'menutype' => "1");
				$update_menu_item_query = $db->query("UPDATE tbl_menu SET menu_item = :menuitem, menu_item_link = :menuitemlink, menu_item_order = :menuitemorder, menu_type = :menutype WHERE menu_id = :menuitemid", $update_menu_item_array);
			}

			$success_message_menu_edit = "Added successfully.!";
			setcookie("cookieSuccessMessage", $success_message_menu_edit, time() + (5 * 1), "/");
			header("Location:".BACKEND_PATH."menu");
		}
	}
	else{
		$number_of_total_items = filter_var($_POST['hiddentotalitems_2'], FILTER_SANITIZE_STRING);

		for ($i=0; $i < $number_of_total_items; $i++) {
			$txtmenuitemid = filter_var($_POST['hiddenmenuitemid'.$i], FILTER_SANITIZE_STRING);
			$txtmenuitem = filter_var($_POST['txtmenuitem'.$i], FILTER_SANITIZE_STRING);
			$txtmenuitemlink = filter_var($_POST['txtmenuitemlink'.$i], FILTER_SANITIZE_STRING);
			$txtmenuitemorder = filter_var($_POST['txtmenuitemorder'.$i], FILTER_SANITIZE_STRING);

			$update_menu_item_array = array('menuitemid' => $txtmenuitemid, 'menuitem' => $txtmenuitem, 'menuitemlink' => $txtmenuitemlink, 'menuitemorder' => $txtmenuitemorder, 'menutype' => "1");
			$update_menu_item_query = $db->query("UPDATE tbl_menu SET menu_item = :menuitem, menu_item_link = :menuitemlink, menu_item_order = :menuitemorder, menu_type = :menutype WHERE menu_id = :menuitemid", $update_menu_item_array);
		}

		$success_message_menu_edit = "Saved successfully.!";
		setcookie("cookieSuccessMessage", $success_message_menu_edit, time() + (5 * 1), "/"); 
		header("Location:".BACKEND_PATH."menu");
	}
	
}

$getmainmenu_array = array('menu_type' => "1"); /* Menu type 1 is main menu */
$getmainmenu = $db->query("SELECT * FROM tbl_menu WHERE menu_type = :menu_type ORDER BY menu_item_order ASC", $getmainmenu_array);

$getmaxinmenu = $db->query("SELECT MAX(menu_id) FROM tbl_menu WHERE menu_type = :menu_type", $getmainmenu_array);

if ($getmaxinmenu) {
	$maxid = $getmaxinmenu[0]["MAX(menu_id)"];
}

if (isset($_GET['deleteid'])) {
	$delete_idd = filter_var($_GET['deleteid'], FILTER_SANITIZE_STRING);

	$delete_array = array('delete_id' => $delete_idd);
	$delete_sql = $db->query("DELETE FROM tbl_menu WHERE menu_id = :delete_id",$delete_array);
	
	if ($delete_sql) {
		$success_message_menu_edit = "Deleted successfully.!";
		setcookie("cookieSuccessMessage", $success_message_menu_edit, time() + (5 * 1), "/");
		header("Location:".BACKEND_PATH."menu");
		
	}
	else {
		$success_message_menu_edit = "Error in deleting.!";
		
	}
	
}

$include_file = BACKEND_DOC_ROOT.'pages/menu_page.php';
include_once BACKEND_DOC_ROOT.'template.php';
?>