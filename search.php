<?php
include 'top.php';
include 'classes/db_connection.php';
	
	/*  Pagination Settings  */
	$num_rec_per_page = 12;
	$limit_from = 0;
	$showmaxpagelimit = 5;
	$showminpagelimit = 0;
	$current_page_number = 1;

		if (isset($_GET['currentpage'])) {  
			$current_page_number = $_GET['currentpage'];
			if ($current_page_number != 1) {
				$previous_page = $current_page_number-1;
				$limit_from = $previous_page*$num_rec_per_page;
				$showmaxpagelimit = $current_page_number + 3;
				$showminpagelimit = $current_page_number - 3;
			}
			
		}
	/*  //Pagination Settings  */

	if (isset($_GET['txtsearch'])) {
	 	$searchtearm = trim(filter_var($_GET['txtsearch']));

		if ($searchtearm == "") {
		   	$error_message = "No keyword added to search";
		}
		
		else {
		   	$product_data_array = array('productname' => '%'.$searchtearm.'%', 'activestatus' => "1");
		   	$product_data = $db->query("SELECT product_id, product_url, product_name, product_main_img, product_initial_price FROM tbl_product WHERE product_name LIKE :productname AND product_status = :activestatus limit $limit_from, $num_rec_per_page", $product_data_array);

		   	if ($product_data) {
		   			$product_data_pagination = $db->query("SELECT count(product_id) FROM tbl_product WHERE product_name LIKE :productname AND product_status = :activestatus", $product_data_array);

		   			$total_product = $product_data_pagination[0]['count(product_id)'];
					$total_pages = $total_product / $num_rec_per_page;
					$total_pages = ceil($total_pages); //convert to highest full number
		   	}
		   	if (!$product_data) {
		   	 	 
		   		$suggested_keyword = substr($searchtearm, 0, 1);
		   		
		   		$product_array = array('productname' => $suggested_keyword.'%', 'activestatus' => "1");
		   		$product_data_suggest = $db->query("SELECT product_id, product_url, product_name, product_main_img, product_initial_price FROM tbl_product WHERE product_name LIKE :productname AND product_status = :activestatus LIMIT 6", $product_array);
		   		
		   		// if not a product name start with firl sug keyword
		   		if (!$product_data_suggest) {
		   			$product_array = array('productname' => '%'.$suggested_keyword.'%', 'activestatus' => "1");
		   			$product_data_suggest = $db->query("SELECT product_id, product_url, product_name, product_main_img, product_initial_price FROM tbl_product WHERE product_name LIKE :productname AND product_status = :activestatus LIMIT 6", $product_array);
		   			// second character
		   			if (!$product_data_suggest) {
		   				$suggested_keyword = substr($searchtearm, 1, 2);
		   				$product_array = array('productname' => '%'.$suggested_keyword.'%', 'activestatus' => "1");
		   				$product_data_suggest = $db->query("SELECT product_id, product_url, product_name, product_main_img, product_initial_price FROM tbl_product WHERE product_name LIKE :productname AND product_status = :activestatus LIMIT 6", $product_array);
		   			}
		   		}
		   		
		   		$error_message = "No product found on that keyword";
		   	}
		   	

		}
	}
	else {
	  	$error_message = "No product found on that keyworddd";
	}


$include_file = 'pages/search_page.php';
include 'template.php';
?>