<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

$reported_ads_query = $db->query("SELECT * FROM tbl_report_ad");


$include_file = BACKEND_DOC_ROOT.'pages/report_ads_page.php';
include_once BACKEND_DOC_ROOT.'template.php';
?>