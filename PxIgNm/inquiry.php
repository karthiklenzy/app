<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

$inquiries = $db->query("SELECT * FROM tbl_contact");

$include_file = BACKEND_DOC_ROOT.'pages/inquiry_page.php';
include_once BACKEND_DOC_ROOT.'template.php';
?>