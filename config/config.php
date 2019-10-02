<?php
date_default_timezone_set("Asia/Colombo");

// if(!isset($_SERVER['REQUEST_SCHEME'])){
//   $_SERVER['REQUEST_SCHEME'] = 'http';
// }

$CURRENCY_USED = "Rs.";
$CURRENT_URL = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

define('HTTP_PATH', $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/vendesiya/app/"); // Live path

define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT']."/vendesiya/app/");
define('SITE_NAME', 'Vendesiya Auction Store');

define('BACKEND_PATH', HTTP_PATH.'PxIgNm/');
define('BACKEND_DOC_ROOT', DOC_ROOT.'PxIgNm/');

define('COMPANY_ADDRESS', "307 High Level Load, Maharagama, Sri Lanka.");
define('COMPANY_EMAIL', "info@esol.lk");
define('COMPANY_PHONE', "+94 112 088 330");

$CURRENT_PAGE = basename($_SERVER['PHP_SELF']);

header("Cache-Control: no cache");
// session_cache_limiter("private_no_expire");

$current_date_time = date('Y-m-d h:i:s');
$current_date = date('Y-m-d');
$current_time = date("H:i:s");
/* Admin e-mails */
$mailArray = array("farshad@esol.lk", "shifaz@esol.lk");
