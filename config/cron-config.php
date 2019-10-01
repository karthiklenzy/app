<?php
date_default_timezone_set("Asia/Colombo");

$site_http_path = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/vendesi/";
$CURRENCY_USED = "Rs.";
// $adminpath = $site_http_path."esol-backend/";
$CURRENT_URL = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
define('HTTP_PATH', "http://vendesiya.lk/app/"); // Live path
define('DOC_ROOT', "/home/vendesi1/public_html/app/");
define('SITE_NAME', 'Vendesiya Auction Store');

define('COMPANY_ADDRESS', "307 High Level Load, Maharagama, Sri Lanka.");
define('COMPANY_EMAIL', "online@vendesiya.lk");
define('COMPANY_PHONE', "+94 112 088 330");

$CURRENT_PAGE = basename($_SERVER['PHP_SELF']);

header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
$current_date_time = date('Y-m-d h:i:s');
$current_date = date('Y-m-d');
$current_time = date("H:i:s");
/* Admin e-mails */
$mailArray = array("farshad@esol.lk", "shifaz@esol.lk");