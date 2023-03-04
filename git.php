<?php
###############################
# index.php
# login Alladin se ubica en el root
# version 3.0.23001
# 26/02/2023
# Juan Carlos C - vp
###############################
$admin_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_ENV['FORCE_HTTPS']) && $_ENV['FORCE_HTTPS'] == 'true')) ? 'https' : 'http';
$admin_url .= '://' . $_SERVER['HTTP_HOST'];
$admin_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$admin_url = trim($admin_url, '/');

$root = $_SERVER['DOCUMENT_ROOT'];                                                          // /home2/alladine/public_html
$abspath = dirname(__FILE__);

if ($_SERVER['SERVER_ADDR'] != "::1") {                                                     //  ENVIRONMENT production 
    ini_set('display_errors', 0);
    $components_path = '/bower_components/';
    $version = "/version/";
    $assets_path = $admin_url . $version . 'assets/';
} else {                                                                                    //  ENVIRONMENT development
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $admin_url = "/wampserver/htdocs/alladinerp3";
    $components_path = 'http://wampserver/htdocs/alladinerp3/bower_components/';
    $version = "/version/";
    $assets_path = "http:/" . $admin_url . $version . 'assets/';
}

// user is logged en el  mismo pc
$msg = filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING);
$timeLoged = filter_input(INPUT_GET, 'timeLoged', FILTER_SANITIZE_NUMBER_INT);
$site_root = __DIR__ . $version;

require_once($site_root . "config.php");

if ($cfg_app_mtto == 1) {
    header('Location: index-mtto.php');
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>