<?php
include ('top.php');
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

session_destroy();
header("Location:".HTTP_PATH."login-user");
?>