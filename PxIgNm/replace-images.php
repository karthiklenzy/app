<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

if (isset($_GET['product_id'])) {
	$product_id = filter_var($_GET['product_id']);

	$find_product_array = array('productid' => $product_id);
	$find_product_query = $db->query("SELECT product_url FROM tbl_product WHERE product_id = :productid", $find_product_array);

	if($find_product_query[0]['product_url'] == 0) {
		header("Location:".BACKEND_PATH."approved-ads");
	}
	else{
		$url_for_product = $find_product_query[0]['product_url'];

		if (isset($_POST['btnsubmit'])) {
			/* ********************************  IMAGE UPLOAD ****************************** */
	        $path = DOC_ROOT."uploads/products/product_".$product_id."/"; // Upload directory
	        $upload_path_without_doc_root = "uploads/products/product_".$product_id."/";
	        include BACKEND_DOC_ROOT.'includes/imageupload.php';
      		/* ********************************  //IMAGE UPLOAD ****************************** */
      		if($uploadOk == 1){
      			$path_multiple = DOC_ROOT."uploads/products/product_".$product_id."/"; // Upload directory
      			$path_multiple_without_docroot = "uploads/products/product_".$product_id."/";;
            	include BACKEND_DOC_ROOT.'includes/multiple_imageupload.php';

            	if ($uploadOk_for_multiple_for_multiple == 1) {
            		$replaceImages_array = array('productid' => $product_id, 'productidmainimage' => $upload_path_without_doc_root, 'productmultipleimages' => $image_path_to_attach_multiple_images_variable);
            		$replaceImages_query = $db->query("UPDATE tbl_product SET product_main_img = :productidmainimage, product_images = :productmultipleimages WHERE product_id = :productid", $replaceImages_array);

            		if ($replaceImages_query) {
            			header("Location:".BACKEND_PATH."view-pending-ad?product_id=".$product_id);

            		}
            	}
        	}
		}
	}
}
else{
	header("Location:".BACKEND_PATH."approved-ads");
}

$include_file = BACKEND_DOC_ROOT.'pages/replace_images_page.php';
include_once BACKEND_DOC_ROOT.'template.php';
?>