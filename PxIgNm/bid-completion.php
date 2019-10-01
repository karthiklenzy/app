<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

$expired_product_data = $db->query("SELECT * FROM tbl_expired_product ORDER BY expired_product_mail_sent_date DESC");
$include_file = BACKEND_DOC_ROOT.'pages/bid_completion_page.php';
include_once BACKEND_DOC_ROOT.'template.php';
?>