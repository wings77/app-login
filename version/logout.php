<?php
/*
logout.php
cierre de sesion
enero 2018
juan carlos c vp
*/
if (isset($_GET['delco'])) {
    // session_start();
    session_destroy();
    header("location: index.php");
    exit;
}

include_once("core/UserCounting.php");

// $company_id = (!isset($_GET['coId'])) ? 0 : $_GET['coId'];
$message = (!isset($_GET['msg'])) ? "sessionClose" : $_GET['msg'];              // mensaje de cierre de sesion
$timeLoged = (isset($_REQUEST['timeLoged'])) ? $_REQUEST['timeLoged'] : 0;      // cierre por inactividad
$org = (!isset($_GET['org'])) ? "noOrg" : $_GET['org'];                         // Donde se origina el cierre de session
$mtto = (!isset($_GET['mtto'])) ? "" : $_GET['mtto'];
$pageLog = (!isset($_GET['pageLog'])) ? "NoPageLog" : $_GET['pageLog'];

$_SESSION = [];

setcookie("alladin_rememberme", "", time() - MAX_SESSION_TIME, "/");

if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
} else {
    // session_start();
    session_unset();
    session_destroy();
}

if ($mtto == 1) {
    header('Location: index-mtto.php');
    exit;
}

header("location: ../index.php?msg=" . $message);  