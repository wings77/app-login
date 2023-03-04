<?php
##############################################
# config_api.php
# Parametros de conexion base de datos apidian
# 11/06/2021
# juan carlos c
# vp
##############################################

// credenciales del vps
$chartset = "utf8";
$dns_api = "mysql:host=" . $cfg_app_api_server_name . ";dbname=" . $cfg_app_api_database_name . ";charset=" . $chartset . ";port=" . $cfg_app_api_port;
$opt_api = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => true,
    PDO::ATTR_PERSISTENT => true,
];

try {
    $conn_api = new PDO($dns_api, $cfg_app_api_user_name, $cfg_app_api_password, $opt_api);
} catch (PDOException $e) {
    $conection_api['success'] = false;
    $conection_api['message'] = "Uuups! " . $e->getMessage() . "<br/>";
    echo json_encode($conection_api);
    die();
}
