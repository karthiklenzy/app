<?php
include_once ('../top.php');
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

$product_url = $_GET['prod_url'];
$current_price = $_GET['current_price'];

$checkcurrentbid_array = array('produrl' => $product_url, 'currprice' => $current_price);
$checkcurrentbid_query = $db->query("SELECT product_id FROM tbl_product WHERE product_url = :produrl AND product_current_price > :currprice", $checkcurrentbid_array);

if ($checkcurrentbid_query) {
	echo '<span class="error">Someone has outbided this amount. Please <a href="'.HTTP_PATH.'view-product/'.$product_url.'">Click</a> here to refresh the page.</span>';
}
?>