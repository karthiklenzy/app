<?php
include 'top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

/*$getallproducts = $db->query("SELECT product_id, product_initial_price FROM tbl_product WHERE product_current_price = '0'");

if($getallproducts){
  for ($i=0; $i < count($getallproducts); $i++) { 
  	$productid = $getallproducts[$i]['product_id'];
  	$productinitprice = $getallproducts[$i]['product_initial_price'];

  	$currentprice = $productinitprice / 2; 
  	$updateprice_array = array('productid' => $productid, 'currentprice' => $currentprice);
  	$updateprice_query = $db->query("UPDATE tbl_product SET product_current_price = :currentprice WHERE product_id = :productid", $updateprice_array);
  }
}*/

/*$getallsubcat = $db->query("SELECT sub_category_id FROM tbl_sub_category");

if ($getallsubcat) {
  for ($i=0; $i < count($getallsubcat); $i++) { 
  	$sub_cat_id = $getallsubcat[$i]['sub_category_id'];
  	$insertquery = $db->query("INSERT INTO tbl_price_scheme (sub_category_id, price_scheme_amount, cms_user_id) VALUES ('$sub_cat_id', '5', '1000')");
  }
}*/
// NAFLIN CODE
// $arrayName = array('Alubomulla','Aluthgama','Aubomulla','Bandaragama','Bellana','Beruwala','Bolossagama','Bombuwala','Dharga Town','Dodangoda','Dombagoda','Gamagoda','Halkandawila','Horana','Ingiriya','Kalutara','Keselwatta','Koholana','Maggona','Mathugama','Matugama','Millaniya','Miwanapalana','Morontuduwa','Paiyagala','Panadura','Pokunuwita','Remunagoda','Tebuwana','Wadduwa','Waskaduwa');
// for ($x=0; $x < count($arrayName); $x++) { 
//   $output = $arrayName[$x];
//   $url =$output;
//   $arrayNamee = array('city' => $output, 'cityurl' => $url, 'dist_id' => "30");
//   $insert = $db->query("INSERT INTO tbl_district_sub_area_new (area_name, area_url, district_id) VALUES (:city, :cityurl, :dist_id)", $arrayNamee);
//   echo $output;
// }
// $insert = $db->query("INSERT INTO tbl_district_sub_area_new () VALUES ()");
?>