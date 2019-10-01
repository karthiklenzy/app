<?php
include ('top.php');
include_once DOC_ROOT.'classes/db_connection.php';
include_once DOC_ROOT.'functions.php';

/*
$user_ip = get_client_ip();
$current_date_and_time = date("Y-m-d h:i:s");

$set_logger_array = array('userid' => $_SESSION['vendesiya_user_id'], 'ipaddress' => $user_ip, 'usestatus' => "End", 'dateandtime' => $current_date_and_time );
$set_logger = $db->query("INSERT INTO logger (User_idUser, IP, S_Status, date_and_time) VALUES (:userid, :ipaddress, :usestatus, :dateandtime)", $set_logger_array);
*/
session_destroy();
header("Location:".HTTP_PATH."login");