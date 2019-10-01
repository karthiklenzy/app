<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';

$getsliderimages = $db->query("SELECT * FROM tbl_slider ORDER BY slider_order ASC");

if (isset($_POST['btnupdate'])) {
	$number_of_total_items = filter_var($_POST['hiddentotalitems_2'], FILTER_SANITIZE_STRING);

	for ($i=0; $i < $number_of_total_items; $i++) { 
		$txtsliderid = filter_var($_POST['txtsliderid'.$i], FILTER_SANITIZE_STRING);
		$txtonclick = filter_var($_POST['txtonclick'.$i], FILTER_SANITIZE_STRING);
		$txtslidercaption = filter_var($_POST['txtslidercaption'.$i], FILTER_SANITIZE_STRING);
		$txtsliderorder = filter_var($_POST['txtsliderorder'.$i], FILTER_SANITIZE_STRING);

		$update_slider_array = array('sliderid' => $txtsliderid, 'slideronclick' => $txtonclick, 'sliderdescription' => $txtslidercaption, 'sliderorder' => $txtsliderorder);
		$update_slider_query = $db->query("UPDATE tbl_slider SET slider_on_click_path = :slideronclick, slider_caption = :sliderdescription, slider_order = :sliderorder WHERE slider_id = :sliderid",$update_slider_array);

		if ($update_slider_query) {
			$success_message = "Slider images updated successfully.!";
			header("Location:".BACKEND_PATH."slider?success_message=".$success_message);
		}
	}
}

$include_file = BACKEND_DOC_ROOT.'pages/slider_page.php';
include_once BACKEND_DOC_ROOT.'template.php';
?>