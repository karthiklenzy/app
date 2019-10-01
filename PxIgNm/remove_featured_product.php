<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

if (isset($_GET['q'])) {
	$product_code = filter_var($_GET['q']);
	$removefeaturedproduct_array = array('productid' => $product_code, 'featuredstatus' => "0");
	$removefeaturedproduct_query = $db->query("UPDATE tbl_product SET product_featured = :featuredstatus WHERE product_id = :productid ", $removefeaturedproduct_array);

	if ($removefeaturedproduct_query) {
		$successMessage = "Product removed from featured ad successfully..!";
		setcookie("cookieSuccessProductResponse", $successMessage, time() + (20 * 1), "/"); // 1 minute
		header("Location:".BACKEND_PATH."featured-ads");
	}
}

?>