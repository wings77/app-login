<?php
/*===================================
|| config.php
|| Copyright 7-Soft - www.7-soft.com
|| octubre 2018
|| juan carlos contreras
=====================================*/

// ADMIN_URL con / al final
$admin_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_ENV['FORCE_HTTPS']) && $_ENV['FORCE_HTTPS'] == 'true')) ? 'https' : 'http';
$admin_url .= '://' . $_SERVER['HTTP_HOST'];
$admin_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$admin_url = trim($admin_url, '/');
define('ROOT', $_SERVER['DOCUMENT_ROOT']);                                              // /home2/alladine/public_html
// define('SITE_ROOT', __DIR__);                                                           // otro ROOT NO SE UTILIZA
define('ADMIN_URL', $admin_url);
define('ASSETS_PATH', ADMIN_URL . '/assets/');
define('ABSPATH', dirname(__FILE__));                                                   // absolute path - ruta completa del archivo config.php    
define('MAX_SESSION_TIME', 36000);                                                      // tiempo de session, pasado este tiempo se cierra la session esta es 36000 segundos = 10 Horas

if ($_SERVER['SERVER_ADDR'] != "::1") {                                                 //  ENVIRONMENT production 
    ini_set('display_errors', 0);
    define('ENVVIROMENT', 'production');
    define('COMPONENTS_PATH', '/bower_components/');
    define('BACKUP_PATH', ROOT . '/backups');
    define('UPLOADS_PATH', ROOT . '/uploads');
} else {                                                                                //  ENVIRONMENT development
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    define('ENVVIROMENT', 'development');
    define('COMPONENTS_PATH', 'http://wampserver/htdocs/alladinerp/bower_components/');
    define('BACKUP_PATH', '/wampserver/htdocs/alladinerp/backups');
    define('UPLOADS_PATH', '/wampserver/htdocs/alladinerp/uploads');
}

// OTHER SETTINGS (YOU DON'T NEED TO CHANGE THIS IF YOU ARE NOT SURE)

// DATABASE CONNECT SETTINGS (REQUIRED)
define('DB_HOST', 'localhost');                                                         // Database host ## Datenbank Server
define('DB_PORT', 3306);                                                                // Enter the database port for your mysql server
define('DB_USER', 'alladine');                                                          // Database user ## Datenbank Benutzername
define('DB_PASS', 'W#!$@5Sq4Bme');                                                      // Database password ## Datenbank Password
define('DB_PREFIX', 'alladine_');                                                       // Database prefix use (a-z) and (_), for example: cms_
define('DB_NAME_CTRL', '00000');                                                        // Database control name una para todas las empresas
define('DB_CHARSET', 'utf8');                                                           // Mysql charset
define('DB_COLLATE', 'utf8_general_ci');                                                // Don't change if you are not sure
define('DEMO_MODE', 0);                                                                 // This must be 0 for real websites;

// Globbal Arrays ===========================================
$documentType = [
    11 => "Registro Civil",
    12 => "Tarjeta de Identidad",
    13 => "Cédula de Ciudadanía",
    21 => "Tarjeta de Extranjería",
    22 => "Cédula de Extranjería",
    31 => "NIT",
    41 => "Pasaporte",
    42 => "Documento de Identificación Extranjero",
    50 => "NIT de otro país",
    91 => "NUIP *",
];

$documentTypeId = [
    11 => 1,
    12 => 2,
    13 => 3,
    21 => 4,
    22 => 5,
    31 => 6,
    41 => 7,
    42 => 8,
    50 => 9,
    91 => 10,
];

$documentTypeS = [
    0 => "Tipo Documento",
    11 => "R.C",
    12 => "T.I",
    13 => "C.C",
    21 => "T.E",
    22 => "C.E.",
    31 => "NIT",
    41 => "Pasaporte",
    42 => "ID Extranjero",
];

$taxpayer = [
    1 => "Persona Juridica",
    2 => "Persona Natural",
];

$regime = [
    "05" => "Régimen Ordinario",    //comun antes 2
    "04" => "Régimen Simple",       // no existia
    "48" => "Responsable de IVA",
    "49" => "No Responsable de IVA",
];

/*
https://www.dian.gov.co/impuestos/factura-electronica/Documents/Anexo-Tecnico-Resolucion-000012-09022021.pdf
13.2.2. Tributos 
Identificador Nombre Descripción
01 IVA Impuesto sobre la Ventas
02 IC Impuesto al Consumo Departamental Nominal
03 ICA Impuesto de Industria, Comercio y Aviso
04 INC Impuesto Nacional al Consumo
05 ReteIVA Retención sobre el IVA
06 ReteRenta Retención sobre Renta
07 ReteICA Retención sobre el ICA
08 IC Porcentual Impuesto al Consumo Departamental Porcentual
20 FtoHorticultura Cuota de Fomento Hortifrutícula
21 Timbre Impuesto de Timbre
22 INC Bolsas Impuesto Nacional al Consumo de Bolsa Plástica
23 INCarbono Impuesto Nacional del Carbono
24 INCombustibles Impuesto Nacional a los Combustibles
25 Sobretasa Combustibles Sobretasa a los combustibles
26 Sordicom Contribución minoristas (Combustibles)
30 IC Datos Impuesto al Consumo de Datos
ZZ* Nombre de la figura tributaria** Otros tributos, tasas, contribuciones, y similares
*/

$typeTax = [
    "01" => "IVA",
    "02" => "IC",
    "03" => "ICA",
    "04" => "INC",
    "05" => "Retención sobre el IVA",
    "06" => "Retención sobre fuente por renta",
    "07" => "Retención sobre el ICA",
    "08" => "IC Porcentual",
    "20" => "FtoHorticultura",
    "21" => "Timbre",
    "22" => "Bolsas",
    "23" => "INCarbono",
    "24" => "INCombustibles",
    "25" => "Sobretasa Combustibles",
    "26" => "Sordicom",
    "30" => "IC Datos",
    "ZA" => "IVA e INC",
    "ZY" => "Obsoleto",
    "ZZ" => "No Aplica",
];

$paymentForm = [
    "01" => "Contado",
    "02" => "Credito",
];

$movementType = [
    1 => "Entrada",
    2 => "Salida",
    3 => "Traslado",
    4 => "Saldo Inicial",
    5 => "Toma Inventario",
    6 => "Ajuste Inventario",
    7 => "Comparativo y Ajuste",
];

$brchTypeClass = [
    0 => "Administracion",
    1 => "Punto de Venta",
    2 => "Alimentos y Bebidas",
    3 => "Parqueadero",
];

$responsabilitiesId = [
    "O-13" => 7,            // gran contribuyente
    "O-15" => 9,            // Autorretenedor 
    "O-23" => 14,           // Agente de retención en el impuesto sobre las ventas
    "O-47" => 112,          // Régimen Simple de Tributación
    "R-99-PN" => 117,       // No responsable PN
];
// $empContractTypeName = $empContractType[$emp_contractType];
$empContractType = [
    "1" =>    "Termino Fijo",
    "2" =>    "Termino Indefinido",
    "3" =>    "Obra Labor",
    "4" =>    "Aprendizaje",
    "5" =>    "Prácticas o pasantías",
];
// end Global Arrays ========================================

#==============================================
# YOU DON'T NEED DO CHANGE ANYTHING BELOW
#==============================================

if (!extension_loaded('pdo')) {
    exit('<strong>FATAL ERROR! This software requires PDO extension (PHP Data Objects).</strong> 
        Please contact your hosting!<br /><br />Read more about <a href="http://php.net/manual/en/book.pdo.php" target="_blank">PHP PDO</a>');
}

// check for PHP version
if (version_compare(phpversion(), '7.1', '<')) {
    // php version isn't high enough
    $php_version = phpversion();
    exit('Error! Your version of PHP (' . $php_version . ') is very old. You need at least PHP 7.1 to be installed on your server!');
}

// CONNECT TO DATABASE CONTROL
$database_control_table_prefix = "ctrl_";
$dsn_ctrl = "mysql:host=" . DB_HOST . ";dbname=" . DB_PREFIX . DB_NAME_CTRL . ";charset=" . DB_CHARSET . ";port=" . DB_PORT;
$opt_ctrl = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => true,
    PDO::ATTR_PERSISTENT => true,
];

try {
    $conn_ctrl = new PDO($dsn_ctrl, DB_USER, DB_PASS, $opt_ctrl);
} catch (PDOException $e) {
    print "Error! " . $e->getMessage() . "<br/>";
    die();
}

// get settings
$stmt = $conn_ctrl->prepare("SELECT * FROM " . $database_control_table_prefix . "settings");
$stmt->execute();
while ($rowCtrl = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $set_name = $rowCtrl['set_name'];
    $set_value = $rowCtrl['set_value'];
    $$set_name = $set_value;                                                        //$$ http://php.net/manual/es/language.variables.variable.php
};
$stmt->closeCursor();

// reCATPCHA alldinerp.com
define('RECAPCHA_SITE_KEY', $cfg_google_recaptcha_site_key);
define('RECAPCHA_SECRET_KEY', $cfg_google_recaptcha_secret_key);

// END CONNECTION CONTROL DATABASE

// CONNECTION COMPANY DATABASE
$database_table_prefix = "adm_";
if (!isset($_SESSION)) session_start();
if (isset($_SESSION['co_id'])) {
    $company_id = $_SESSION['co_id'];
    $branch_id = $_SESSION['branch_id'];
    $user_role_id = $_SESSION['user_role_id'];
    $user_device = ($user_role_id == 7) ? "mobile" : "pc";
    $log_host_name = gethostname();
    $branch_terminal_id = substr(gethostname(), 0, 5);
    // $sql_company = "SELECT * FROM " . $database_control_table_prefix . "view_co_branch WHERE co_id = ? AND brch_id = ?";
    // $stmt_company = $conn_ctrl->prepare($sql_company);
    // $stmt_company->bindParam(1, $company_id);
    // $stmt_company->bindParam(2, $branch_id);
    // se cambia el view por la conculta inner join no se elimina el view 08/12/2021 TODO
    $sql_company = "SELECT * 
        FROM " . $database_control_table_prefix . "company 
        INNER JOIN " . $database_control_table_prefix . "branches ON co_id = brch_co_id 
        WHERE co_id = " . $company_id . " AND brch_id = " . $branch_id . " LIMIT 1;";
    $stmt_company = $conn_ctrl->prepare($sql_company);
    $stmt_company->execute();

    $row_company = $stmt_company->fetch(PDO::FETCH_ASSOC);

    if ($row_company) {
        foreach ($row_company as $field => $value) {
            $set_var_name = $field;
            $set_value = $value;
            $$set_var_name = $set_value;
        }
    }

    $co_documentType = intval($row_company['co_documentType']);
    $documentName = $documentType[$co_documentType];
    $co_logo = (empty($row_company['co_logo'])) ? 'placeholder-square.png' : $row_company['co_logo'];
    $co_logo_menu = (empty($row_company['co_logo_menu'])) ? 'placeholder-square.png' : $row_company['co_logo_menu'];
    $co_logoReports = (empty($row_company['co_logoReports'])) ? 'placeholder-square.png' : $row_company['co_logoReports'];
    $co_logoDocs = (empty($row_company['co_logoDocs'])) ? 'placeholder-square.png' : $row_company['co_logoDocs'];
    $co_tax_include = (empty($row_company['co_tax_include'])) ? 0 : $row_company['co_tax_include'];
    $brch_resolution_invoce_type = (empty($row_company['brch_resolution_invoce_type']) || $row_company['brch_resolution_invoce_type'] == 0) ? 0 : 1;

    $stmt = $conn_ctrl->prepare("SELECT * FROM " . $database_control_table_prefix . "countries WHERE country_iso2='" . $co_country_iso2 . "' LIMIT 1");
    $stmt->execute();
    $rowCountry = $stmt->fetch(PDO::FETCH_ASSOC);
    $co_country_name = $rowCountry['country_name'];

    setlocale(LC_ALL, $co_country_code); //$co_country_code
    //strftime("%A - %B %d, %G")  //muestra domingo - junio 17, 2018
    date_default_timezone_set($co_timezone); //"America/Bogota" $co_timezone

    $usr_city = $brch_city;
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
    $user_email = $_SESSION['user_email'];

    $usr_ip = $_SESSION['usr_ip'];

    $co_openSessions = $conn_ctrl->query("SELECT count(logged) FROM " . $database_control_table_prefix . "users WHERE logged = 1 AND role_id <> 9 AND company_id = " . $company_id)->fetchColumn();
    $co_openSessions = (empty($co_openSessions)) ? -1 : $co_openSessions;

    //define company database
    define('DB_NAME', $co_database_name); // Name base de datos para cada empresa
    
    // CONNECT TO COMPANY DATABASE
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_PREFIX . DB_NAME . ";charset=" . DB_CHARSET . ";port=" . DB_PORT;
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => true,                                 // da error 1615 si esta en false
        PDO::ATTR_PERSISTENT => true,
    ];
    try {
        $conn = new PDO($dsn, DB_USER, DB_PASS, $opt);
    } catch (PDOException $e) {
        print "Error! " . $e->getMessage() . "<br/>";
        die();
    }

    $ctrl_DB = DB_PREFIX . DB_NAME_CTRL . "." . $database_control_table_prefix;
    $production_DB = DB_PREFIX . DB_NAME . "." . $database_table_prefix;

    $config_reports = array(
        "user_db" => array(
            "connectionString" => "mysql:host=" . DB_HOST . ";dbname=" . DB_PREFIX . DB_NAME,
            "username" => DB_USER,
            "password" => DB_PASS,
            "charset" => DB_CHARSET
        )
    );

    // get settings company
    $stmt_set_co = $conn->prepare("SELECT set_co_variable, set_co_value FROM " . $database_table_prefix . "settings_co");
    $stmt_set_co->execute();

    while ($row_set_co = $stmt_set_co->fetch(PDO::FETCH_ASSOC)) {
        $set_co_variable = $row_set_co['set_co_variable'];
        $set_co_value = $row_set_co['set_co_value'];
        $$set_co_variable = $set_co_value;
    };

    $stmt_set_co->closeCursor();

    // roles 
    $sqlRol = "SELECT * FROM " . $database_table_prefix . "permissions_roles WHERE permit_role_id = 1 LIMIT 1";
    $stmtRol = $conn->prepare($sqlRol);
    $stmtRol->execute();
    $rowRol = $stmtRol->fetch(PDO::FETCH_ASSOC);
    $i = 0;
    // pagina de inicio y roles segun el rol 
    switch ($user_role_id) {
        case 1:
            $co_init_page = "adm_quote_leads";
            $globalPermissions1  = explode(",", $rowRol['permit_role_1']);
            foreach ($globalPermissions1 as $permit) {  // 0,1,2,3,4
                switch ($i) {
                    case 0:
                        $permitSave = ($permit == "1") ? 1 : 0;
                        break;
                    case 1:
                        $permitEdit = ($permit == "1") ? 1 : 0;
                        break;
                    case 2:
                        $permitDelete = ($permit == "1") ? 1 : 0;
                        break;
                    case 3:
                        $permitAnnul = ($permit == "1") ? 1 : 0;
                        break;
                    case 4:
                        $permitDiscount = ($permit == "1") ? 1 : 0;
                        break;
                    default:
                };
                $i++;
            }
            break;
        case 2:
            $co_init_page = (empty($row_company['co_init_page'])) ? "dashboard-today" : $row_company['co_init_page'];
            $globalPermissions2  = explode(",", $rowRol['permit_role_2']);
            foreach ($globalPermissions2 as $permit) {  // 0,1,2,3,4
                switch ($i) {
                    case 0:
                        $permitSave = ($permit == "1") ? 1 : 0;
                        break;
                    case 1:
                        $permitEdit = ($permit == "1") ? 1 : 0;
                        break;
                    case 2:
                        $permitDelete = ($permit == "1") ? 1 : 0;
                        break;
                    case 3:
                        $permitAnnul = ($permit == "1") ? 1 : 0;
                        break;
                    case 4:
                        $permitDiscount = ($permit == "1") ? 1 : 0;
                        break;
                    default:
                };
                $i++;
            }
            break;
        case 3:
            $co_init_page = (empty($row_company['co_init_page'])) ? "dashboard-today" : $row_company['co_init_page'];
            $globalPermissions3  = explode(",", $rowRol['permit_role_3']);
            foreach ($globalPermissions3 as $permit) {  // 0,3,2,3,4
                switch ($i) {
                    case 0:
                        $permitSave = ($permit == "1") ? 1 : 0;
                        break;
                    case 1:
                        $permitEdit = ($permit == "1") ? 1 : 0;
                        break;
                    case 2:
                        $permitDelete = ($permit == "1") ? 1 : 0;
                        break;
                    case 3:
                        $permitAnnul = ($permit == "1") ? 1 : 0;
                        break;
                    case 4:
                        $permitDiscount = ($permit == "1") ? 1 : 0;
                        break;
                    default:
                };
                $i++;
            }
            break;
        case 4:
            $co_init_page = (empty($row_company['co_init_page'])) ? "dashboard-today" : $row_company['co_init_page'];
            $globalPermissions4  = explode(",", $rowRol['permit_role_4']);
            foreach ($globalPermissions4 as $permit) {  // 0,4,2,3,4
                switch ($i) {
                    case 0:
                        $permitSave = ($permit == "1") ? 1 : 0;
                        break;
                    case 1:
                        $permitEdit = ($permit == "1") ? 1 : 0;
                        break;
                    case 2:
                        $permitDelete = ($permit == "1") ? 1 : 0;
                        break;
                    case 3:
                        $permitAnnul = ($permit == "1") ? 1 : 0;
                        break;
                    case 4:
                        $permitDiscount = ($permit == "1") ? 1 : 0;
                        break;
                    default:
                };
                $i++;
            }
            break;
        case 5:
            $co_init_page = (empty($row_company['co_init_page'])) ? "dashboard-today" : $row_company['co_init_page'];
            $globalPermissions5  = explode(",", $rowRol['permit_role_5']);
            foreach ($globalPermissions5 as $permit) {  // 0,5,2,3,4
                switch ($i) {
                    case 0:
                        $permitSave = ($permit == "1") ? 1 : 0;
                        break;
                    case 1:
                        $permitEdit = ($permit == "1") ? 1 : 0;
                        break;
                    case 2:
                        $permitDelete = ($permit == "1") ? 1 : 0;
                        break;
                    case 3:
                        $permitAnnul = ($permit == "1") ? 1 : 0;
                        break;
                    case 4:
                        $permitDiscount = ($permit == "1") ? 1 : 0;
                        break;
                    default:
                };
                $i++;
            }
            break;
        case 6:
            $co_init_page = (empty($row_company['co_init_page'])) ? "dashboard-today" : $row_company['co_init_page'];
            $globalPermissions6  = explode(",", $rowRol['permit_role_6']);
            foreach ($globalPermissions6 as $permit) {  // 0,6,2,3,4
                switch ($i) {
                    case 0:
                        $permitSave = ($permit == "1") ? 1 : 0;
                        break;
                    case 1:
                        $permitEdit = ($permit == "1") ? 1 : 0;
                        break;
                    case 2:
                        $permitDelete = ($permit == "1") ? 1 : 0;
                        break;
                    case 3:
                        $permitAnnul = ($permit == "1") ? 1 : 0;
                        break;
                    case 4:
                        $permitDiscount = ($permit == "1") ? 1 : 0;
                        break;
                    default:
                };
                $i++;
            }
            break;
        case 99:
            $co_init_page = "app_settings";
            $permitSave = 1;
            $permitEdit = 1;
            $permitDelete = 1;
            $permitAnnul = 1;
            $permitDiscount = 1;
            break;
        default:
            $co_init_page = (empty($row_company['co_init_page'])) ? "dashboard-today" : $row_company['co_init_page'];
            $permitSave = 1;
            $permitEdit = 1;
            $permitDelete = 1;
            $permitAnnul = 1;
            $permitDiscount = 1;
            break;
    }
    // roles end

    // conteo de documentos electronicos
    if ($brch_resolution_invoce_type == 1) {
        $branchId = $brch_id;
        $database_name = $co_database_name;
        require_once("core/FEL_QtyDocs.php");
        // salen las variables $totalDocs y $QtyFelDocs
    } else {
        $baught = 0;
        $totalDocs = 0;
        $QtyFelDocs = 0;
    }

    // END CONNECTION COMPANY DATABASE
    $stmt->closeCursor();
    $stmtRol->closeCursor();
}
