<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

if (isset($_POST['btnsubmit'])) {
	$error_count = 0;

	$txtslidercaption = filter_var($_POST['txtslidercaption'], FILTER_SANITIZE_STRING);
	$txtslideronclick = filter_var($_POST['txtslideronclick'], FILTER_SANITIZE_STRING);

	$txtslidercaption = trim($txtslidercaption);
	$txtslideronclick = trim($txtslideronclick);

	if ($txtslidercaption == "") {
		$error_message = "caption cannot be empty..!";
		$error_count++;
	}
	else if($txtslideronclick == ""){
		$error_message = "Slider on click cannot be empty..!";
		$error_count++;
	}
	else if($error_count == 0){
		$url_for_product = $txtslidercaption;
		//Lower case everything
		$url_for_product = strtolower($url_for_product);
		//Make alphanumeric (removes all other characters)
		$url_for_product = preg_replace("/[^a-z0-9_\s-]/", "", $url_for_product);
		//Clean up multiple dashes or whitespaces
		$url_for_product = preg_replace("/[\s-]+/", " ", $url_for_product);
		//Convert whitespaces and underscore to dash
		$url_for_product = preg_replace("/[\s_]/", "-", $url_for_product);

		/* ********************************  IMAGE UPLOAD ****************************** */
	        $path = DOC_ROOT."uploads/slider/"; // Upload directory
	        $upload_path_without_doc_root = "uploads/slider/";
	        include BACKEND_DOC_ROOT.'includes/imageupload.php';
	  	/* ********************************  //IMAGE UPLOAD ****************************** */

	  	$getlastslidernumber = $db->query("SELECT slider_order FROM tbl_slider ORDER BY slider_id DESC LIMIT 1");
	  	$nextslider = $getlastslidernumber[0]['slider_order'] + 1;

	  	$addslider_array = array('sliderimagepath' => $upload_path_without_doc_root, 'slideronclick' => $txtslideronclick, 'slidercaption' => $txtslidercaption, 'sliderorder' => $nextslider);
	  	$addslider_query = $db->query("INSERT INTO tbl_slider (slider_img_path, slider_on_click_path, slider_caption, slider_order) VALUES (:sliderimagepath, :slideronclick, :slidercaption, :sliderorder)", $addslider_array);

	  	if ($addslider_query) {
	  		$success_message = "Slider image added successfully.!";
			header("Location:".BACKEND_PATH."slider?success_message=".$success_message);
	  	}
	}
	else{
		$error_message = "An error occured while adding slider, please try again in a while..!";
		$error_count++;
	}
}

$include_file = BACKEND_DOC_ROOT.'pages/add_slider_page.php';
include_once BACKEND_DOC_ROOT.'template.php';
?>