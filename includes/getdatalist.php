<?php
include_once ('../top.php');
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

if (isset($_GET['typedvalue'])){
  if (strlen($_GET['typedvalue']) > 1) {
  	$getdatalist_array = array('typedvalue' => '%'.$_GET['typedvalue'].'%', 'current_date_time' => $current_date_time);
    $getdatalist = $db->query("SELECT product_name FROM tbl_product WHERE product_name LIKE :typedvalue AND product_bid_ends_on >= :current_date_time", $getdatalist_array);

    if ($getdatalist) {
  	  for ($t=0; $t < count($getdatalist); $t++) { 
  	    echo '<option value="'.$getdatalist[$t]['product_name'].'">';
  	  }
    }
  }
}
?>