<?php
include_once '../top.php';
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

$getallspecifications_query = $db->query("SELECT * FROM tbl_spec_type");

$include_file = BACKEND_DOC_ROOT.'pages/specifications_page.php';
include_once BACKEND_DOC_ROOT.'template.php';
?>