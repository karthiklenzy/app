<?php
include 'top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'includes/auth_user.php';
include_once DOC_ROOT.'functions.php';

$getcategory_query = $db->query("SELECT * FROM tbl_category");


if ((isset($selectproductcategory)) && ($selectproductcategory != "")) {
	$getsubcategory_query_one_array = array('cat_id' => $selectproductcategory);
	$getsubcategory_query_one = $db->query("SELECT * FROM tbl_sub_category WHERE category_id = :cat_id", $getsubcategory_query_one_array);
}
// if (isset($_GET['upload']) && $_GET['upload'] == 'bulk') {
// 	$_SESSION['bulk'] = filter_var($_GET['upload']);
	
// }
// else {
// 	unset ($_SESSION['bulk']);
// }



$include_file = 'pages/upload_item_page.php';
include 'template.php';
?>