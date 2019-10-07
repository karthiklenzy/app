<?php
function getcategoryid($caturl){
	global $db;

	$get_products_for_category_array = array('categoryurl' => $caturl);
	$get_products_for_category_query = $db->query("SELECT category_id FROM tbl_category WHERE category_url = :categoryurl", $get_products_for_category_array);

	if ($get_products_for_category_query) {
		return $get_products_for_category_query[0]['category_id'];
	}
}

function getcategoryname($catid){
	global $db;

	$get_products_for_category_array = array('categoryid' => $catid);
	$get_products_for_category_query = $db->query("SELECT category_name FROM tbl_category WHERE category_id = :categoryid", $get_products_for_category_array);

	if ($get_products_for_category_query) {
		return $get_products_for_category_query[0]['category_name'];
	}
}

function getpublishuserid($productid){
	global $db;

	$get_product_published_user_array = array('productid' => $productid);
	$get_product_published_user_sql = $db->query("SELECT published_user_id FROM tbl_product WHERE product_id = :productid", $get_product_published_user_array);

	if ($get_product_published_user_sql) {
		return $get_product_published_user_sql[0]['published_user_id'];
	}
}

function getsubcategoryid($caturl){
	global $db;

	$get_products_for_category_array = array('categoryurl' => $caturl);
	$get_products_for_category_query = $db->query("SELECT sub_category_id FROM tbl_sub_category WHERE sub_category_url = :categoryurl", $get_products_for_category_array);

	if ($get_products_for_category_query) {
		return $get_products_for_category_query[0]['sub_category_id'];
	}
}

function getdistrictid($id){
	global $db;

	$get_district_array = array('id' => $id);
	$get_district_query = $db->query("SELECT district_id FROM tbl_districts WHERE district_id = :id", $get_district_array);

	if ($get_district_query) {
		return $get_district_query[0]['district_id'];
	}
}

function getsubcategoryname($subcatid){
	global $db;

	$get_sub_cat_name_array = array('subcategoryid' => $subcatid);
	$get_sub_cat_name_query = $db->query("SELECT sub_category_name FROM tbl_sub_category WHERE sub_category_id = :subcategoryid", $get_sub_cat_name_array);

	if ($get_sub_cat_name_query) {
		return $get_sub_cat_name_query[0]['sub_category_name'];
	}
}

function getsubcategorybycategoryid($catid){
	global $db;

	$get_products_for_sub_category_array = array('categoryid' => $catid);
	$get_products_for_sub_category_query = $db->query("SELECT * FROM tbl_sub_category WHERE category_id = :categoryid", $get_products_for_sub_category_array);

	if ($get_products_for_sub_category_query) {
		return $get_products_for_sub_category_query;
	}
}

function getvendesiyausername($userid){
	global $db;

	$getusername_array = array('userid' => $userid);
	$getusername_query = $db->query("SELECT user_first_name, user_last_name FROM tbl_user WHERE user_id = :userid", $getusername_array);

	return $getusername_query[0]['user_first_name'].' '.$getusername_query[0]['user_last_name'];
}

function getuseremail($userid){
	global $db;

	$getuseremail_array = array('userid' => $userid);
	$getuseremail_query = $db->query("SELECT user_email FROM tbl_user WHERE user_id = :userid", $getuseremail_array);

	return $getuseremail_query[0]['user_email'];
}

function getcmsusername($userid){
	global $db;

	$getusername_array = array('userid' => $userid);
	$getusername_query = $db->query("SELECT cms_user_full_name FROM tbl_cms_users WHERE cms_user_id = :userid", $getusername_array);

	return $getusername_query[0]['cms_user_full_name'];
}

function getproductcodeusingurl($producturl){
	global $db;

	$getproductcode_array = array('producturl' => $producturl);
	$getproductcode_query = $db->query("SELECT product_id FROM tbl_product WHERE product_url = :producturl", $getproductcode_array);

	return $getproductcode_query[0]['product_id'];
}

function getproductmaxvalue($productid){
	global $db;

	$getproductmax_value_array = array('productid' => $productid);
	$getproductmax_value_sql = $db->query("SELECT MAX(bid_amount) FROM tbl_bid WHERE product_id = :productid", $getproductmax_value_array);

	return $getproductmax_value_sql[0]['MAX(bid_amount)'];
}

function getproductmaxvalueuserid($product_max_value){
	global $db;

	$getproductmax_value_array = array('product_max_value' => $product_max_value);
	$getproductmax_value_sql = $db->query("SELECT bid_user_id FROM tbl_bid WHERE bid_amount = :product_max_value", $getproductmax_value_array);

	return $getproductmax_value_sql[0]['bid_user_id'];
}

function gettotalbids($productid){
	global $db;

	$gettotalbids_array = array('productid' => $productid);
	$gettotalbids_query = $db->query("SELECT count(bid_id) FROM tbl_bid WHERE product_id = :productid", $gettotalbids_array);

	return $gettotalbids_query[0]['count(bid_id)'];
}

function getproductname($productid){
	global $db;

	$getproductname_array = array('productid' => $productid);
	$getproductname_query = $db->query("SELECT product_name FROM tbl_product WHERE product_id = :productid", $getproductname_array);

	return $getproductname_query[0]['product_name'];
}
function getproductimage($productid){
	global $db;

	$getproductname_array = array('productid' => $productid);
	$getproductname_query = $db->query("SELECT product_main_img FROM tbl_product WHERE product_id = :productid", $getproductname_array);

	return $getproductname_query[0]['product_main_img'];
}

function getspecnamebyid($specid){
	global $db;

	$getspecname_array = array('specid' => $specid);
	$getspecname_query = $db->query("SELECT spec_type_name FROM tbl_spec_type WHERE spec_type_id = :specid", $getspecname_array);

	return $getspecname_query[0]['spec_type_name'];
}
function getsubcategorycount($catcid){
	global $db;

	$getsub_category_count_array = array('catid' => $catcid);
	$getsub_category_count_array_query = $db->query("SELECT count(sub_category_id) FROM tbl_sub_category WHERE category_id = :catid", $getsub_category_count_array);

	return $getsub_category_count_array_query[0]['count(sub_category_id)'];
}

function getbidmargin($subcatid){
	global $db;

	$getbidmargin_array = array('subcatid' => $subcatid);
	$getbidmargin_query = $db->query("SELECT price_scheme_amount FROM tbl_price_scheme WHERE sub_category_id = :subcatid", $getbidmargin_array);
	return $getbidmargin_query[0]['price_scheme_amount'];
}

function excerpt($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}

function rmrf($dir) {
    foreach (glob($dir) as $file) {
        if (is_dir($file)) { 
            rmrf("$file/*");
            rmdir($file);
        } else {
            unlink($file);
        }
    }
}
function getfavproduct($product_id){
	global $db;
	$get_fav_item_array = array('product_idd' => $product_id, 'user_id' => $_SESSION['vendesiya_user_id']);
	$get_fav_item = $db->query("SELECT * FROM tbl_wish_list WHERE product_id = :product_idd AND user_id = :user_id", $get_fav_item_array);

		if ($get_fav_item) {
			$class = "active";
			return $class;
		}
		else {
			$class = "";
			return $class;
		}
	}
function getreportedadname($reportid){
	global $db;

	if ($reportid == 1) {
		$report_reson_name = "Item sold/unavailable";
	}
	else if ($reportid == 2) {
		$report_reson_name = "Fraud";
	}
	else if ($reportid == 3) {
		$report_reson_name = "Duplicate";
	}
	else if ($reportid == 4) {
		$report_reson_name = "Spam";
	}
	else if ($reportid == 5) {
		$report_reson_name = "Wrong category";
	}
	else if ($reportid == 6) {
		$report_reson_name = "Offensive";
	}
	else {
		$report_reson_name = "Other";
	}
	return $report_reson_name;
	
}
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
?>