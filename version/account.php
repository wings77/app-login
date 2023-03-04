<?php
/*===================================
|| account.php
|| controlador
|| Copyright 7-Soft - www.7-soft.com
|| diciembre 2017
|| Juan Carlos Contreras - vp
=====================================*/

require_once("config.php");
require_once ABSPATH . "/core/CheckLogin.php";
require_once ABSPATH . "/core/functions.php";

$optId = (!isset($_GET['optId'])) ? NULL : filter_input(INPUT_GET, 'optId', FILTER_SANITIZE_NUMBER_INT);

// var_dump($_POST);
// exit;

if (!isset($co_init_page) && !isset($optId)) {
	header("location: " . ADMIN_URL . "/logout.php?msg=sessionEnd&org=account&pagelog=" . $pageLog);
}

if ($cfg_app_mtto == 1) {
	header("location: " . ADMIN_URL . "/logout.php?msg=mtto&mtto=1");
	exit;
}

if ($optId) {
	if ($logged_user_role_id != 99 && $optId == 134) {
		header("location: " . ADMIN_URL . "/logout.php?msg=sessionEnd&org=account&pagelog=" . $pageLog);
	}
}

if (!isset($brch_type_class)) {
	header("Location: " . ADMIN_URL . "/logout.php?msg=sessionEnd&timeLoged=" . $timeLoged . "&org=chklog");
	exit;
}

switch ($brch_type_class) {
	case 0:
		$co_init_page = "dashboard-today";
		break;
	case 1:
	case 2:
		$co_init_page = "dashboard-pos";
		break;
	case 3:
		$co_init_page = "dashboard-park";
		break;
	default:
		$co_init_page = "dashboard-today";
};

if ($logged_user_role_id == 99) {
	$co_init_page = "app_settings";
}

$page = (!isset($_GET['page'])) ? $co_init_page : filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
$regId = (!isset($_GET['regId'])) ? NULL : filter_input(INPUT_GET, 'regId', FILTER_SANITIZE_NUMBER_INT);
$msg = filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING);
$pagenum = filter_input(INPUT_GET, 'pagenum', FILTER_SANITIZE_NUMBER_INT);  // algunas paginas lo usan 08/06/2019

// opciones super admin
if ($user_role_id == 7) {
	$optId = 127;
}

//opcion
if ($optId) {
	$sql_option = "SELECT * FROM " . $database_control_table_prefix . "menu_options WHERE mnu_id=" . $optId . " LIMIT 1"; 		// busca por el Id
} else {
	$sql_option = "SELECT * FROM " . $database_control_table_prefix . "menu_options WHERE mnu_href='" . $page . "' LIMIT 1"; 	// busca por el nombre de la pagina
}

$stmt_option = $conn_ctrl->prepare($sql_option);
$stmt_option->execute();
$row_option = $stmt_option->fetch(PDO::FETCH_ASSOC);

if (empty($row_option)) {
	if ($optId == 900) {
		$menu_id = 900;
		$page = "super_adm_accounts";
		$title = "Administracion Alladin";
		$description = "Administracion de las cuentas de Clientes Alladin";
		$optPath = "Administracion Alladin - Cuentas";
		$head = "";
		$foot = "super_adm_accounts";
	} else {
		$menu_id = 92;
		$page = $co_init_page;
		$title = "";
		$description = "";
		$optPath = "";
		$head = "";
		$foot = "";
	}
} else {
	$menu_id =  $row_option['mnu_id'];
	$page = $row_option['mnu_href'];
	$title = $row_option['mnu_title'];
	$description = $row_option['mnu_description'];
	$optPath = $row_option['mnu_nameSection'] . " - " . (empty($row_option['mnu_nameLevel2']) ? $row_option['mnu_nameLevel1'] : $row_option['mnu_nameLevel1'] . "  -  ") . (empty($row_option['mnu_nameLevel3']) ? $row_option['mnu_nameLevel2'] : $row_option['mnu_nameLevel2'] . "  -  ") . strtoupper($row_option['mnu_nameLevel3']);
	$head = $row_option['mnu_header'];
	$foot = $row_option['mnu_footer'];
}

// activity log 
$sqlLog = "INSERT INTO " . $database_control_table_prefix . "activity_log (log_user_id, log_user_name, log_co_id, log_brch_id, log_menu_id, log_date_time_in, log_app, log_app_version, log_ip, log_host_name)
	VALUES ($user_id, '" . $user_name . "', $co_id, $brch_id, $menu_id, CURTIME(), '" . $cfg_app_name . "', '" . $cfg_app_version . "', '" . $usr_ip . "', '" . $log_host_name . "')";
$conn_ctrl->exec($sqlLog);
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<title><?php echo $title . " : " . $cfg_app_name; ?></title> <!-- $co_name -->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Software de gestion administrativa en la nube" />
	<meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
	<meta name="author" content="Alladin" />
	<meta http-equiv="Expires" content="0">
	<!-- Favicon icon -->
	<link rel="shortcut icon" href="<?php echo ASSETS_PATH; ?>images/favicon.png" type="image/x-icon">
	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	<!-- Required Fremwork -->
	<link rel="stylesheet" type="text/css" href="<?php echo COMPONENTS_PATH; ?>bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- waves.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>pages/waves/css/waves.min.css" media="all">
	<!-- feather icon -->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>icon/feather/css/feather.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>icon/themify-icons/themify-icons.css">
	<!-- ico font -->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>icon/icofont/css/icofont.css">
	<!-- font awesome -->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>icon/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>pages/j-pro/css/j-forms.css">
	<!-- jquery-loading -->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>plugins/jquery-loading/css/jquery.loading.css">
	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>css/pages.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>css/widget.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>css/responsive.css">
	<!-- select2 -->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>plugins/select2/css/select2.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>plugins/select2/css/select2-bootstrap.css">
	<!-- alertify js -->
	<link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>plugins/alertifyjs/css/themes/bootstrap.css" />
	<!-- <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>plugins/alertifyjs/css/themes/default.css"/> -->
	<link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>plugins/alertifyjs/css/alertify.css" />
	<!-- daterangepicker -->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>plugins/daterangepicker/css/daterangepicker.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>plugins/datetimepicker/css/bootstrap-datetimepicker.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>pages/alladin/css/alladin.css" />
	<?php
	if ($head != "") {
		include "shared/head_" . $head . ".php";
	}
	//para evitar que el usuario vea el codigo fuente de la pagina: en la etiqueta <body oncontextmenu="return false" onkeydown="return false">
	?>
	<style type="text/css">
		#preloader {
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background: #ffffff;
			z-index: 100;
		}

		#loader {
			width: 200px;
			height: 100px;
			position: absolute;
			left: 47%;
			top: 50%;
			background: url(<?php echo ASSETS_PATH; ?>images/preloaders/MainSpinner.gif) no-repeat center 0;
			margin: -50px 0 0 -50px;
		}
	</style>
</head>

<body class="background-grd-dar">
	<!-- [ Pre-loader ] start -->
	<!-- <div class="loader-bg">
		<div class="loader-bar"></div>
	</div> -->
	<?php if ($optId != 127) {
		echo '<div id="preloader">
			<div id="loader"></div>
		</div>';
	}
	?>
	<!-- [ Pre-loader ] end -->
	<!-- id="pcoded" class="pcoded" start -->
	<!-- este div d la configuracion para la pagina estilo box no wide -->
	<!-- <div id="pcoded" class="pcoded iscollapsed" theme-layout="vertical" vertical-placement="left" vertical-layout="box" pcoded-device-type="desktop" vertical-nav-type="expanded" vertical-effect="shrink" vnavigation-view="view1" nav-type="st2" fream-type="theme1" layout-type="light"> -->
	<div id="pcoded" class="pcoded">
		<div class="pcoded-overlay-box"></div>
		<?php
		// aap_admin user

		// incluye la barra de navegacion para los que NO son POS
		if ($optId != 5 && $optId != 120 && $optId != 127) {
			include "shared/adm_navigation.php";
		}

		// ADMIN pages
		if ($page) {
			include "views/" . $page . ".php";
		} else {
			include "views/dashboard-today.php";
		}
		?>
		<!-- [ style Customizer ] start -->
		<div id="styleSelector">
		</div>
		<!-- [ style Customizer ] end -->
	</div>
	</div>
	</div>
	</div>
	</div>
	<!-- id="pcoded" class="pcoded" end -->
	<!-- scripts -->
	<script type="text/javascript">
		var co_nit = "<?php echo $co_nit; ?>";
		var co_tax_default = "<?php echo $co_tax_default; ?>";
		var co_database_name = "<?php echo $co_database_name; ?>";
		var brch_id = "<?php echo $brch_id; ?>";
		var brch_sales_doc_file = "<?php echo $brch_sales_doc_file; ?>";
		var brch_receipt_doc_file = "<?php echo $brch_receipt_doc_file; ?>";
		var user_id = "<?php echo $user_id; ?>";
		var user_role_id = "<?php echo $user_role_id; ?>";
		var permitDiscount = "<?php echo $permitDiscount; ?>";
		var logged_user_name = "<?php echo $logged_user_name; ?>";
		var brch_branch_type = "<?php echo $brch_branch_type; ?>";
		var brch_type_class = "<?php echo $brch_type_class; ?>";
		var brch_date_plan_due = "<?php echo $brch_date_plan_due; ?>";
		var cfg_app_pco_name = "<?php echo $cfg_app_pco_name; ?>";
		var brch_resolution_invoce_type = "<?php echo $brch_resolution_invoce_type; ?>";
		var cfg_app_api_mtto = "<?php echo $cfg_app_api_mtto; ?>";
		var QtyFelDocs = "<?php echo $QtyFelDocs; ?>";
		var co_token_enterprise = "<?php echo $co_token_enterprise; ?>";
		var cfg_app_doc_url = "<?php echo $cfg_app_doc_url; ?>";
		var cfg_app_url = "<?php echo $cfg_app_url; ?>";
	</script>
	<script src="<?php echo COMPONENTS_PATH; ?>jquery/js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo COMPONENTS_PATH; ?>jquery-ui/js/jquery-ui.min.js"></script>
	<script src="<?php echo COMPONENTS_PATH; ?>bootstrap/4.3.1/js/popper.min.js"></script>
	<script src="<?php echo COMPONENTS_PATH; ?>bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="<?php echo ASSETS_PATH; ?>plugins/waves/js/waves.min.js"></script>
	<script src="<?php echo COMPONENTS_PATH; ?>jquery-slimscroll/js/jquery.slimscroll.js"></script>
	<script src="<?php echo ASSETS_PATH; ?>js/pcoded.js"></script>
	<script src="<?php echo ASSETS_PATH; ?>js/vertical/vertical-layout.js"></script>
	<script src="<?php echo ASSETS_PATH; ?>js/script.js"></script>
	<script src="<?php echo ASSETS_PATH; ?>js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="<?php echo ASSETS_PATH; ?>plugins/jquery.nicescroll/js/jquery.nicescroll.min.js"></script>
	<script src="<?php echo COMPONENTS_PATH; ?>classie/js/classie.js"></script>
	<script src="<?php echo ASSETS_PATH; ?>plugins/notification/js/bootstrap-growl.min.js"></script>
	<script src="<?php echo ASSETS_PATH; ?>plugins/jquery-loading/js/jquery.loading.min.js"></script>
	<script src="<?php echo ASSETS_PATH; ?>plugins/select2/js/select2.js"></script>
	<script src="<?php echo ASSETS_PATH; ?>plugins/select2/js/select2-defaults.js"></script>
	<script src="<?php echo ASSETS_PATH; ?>plugins/select2/js/i18n/es.js"></script>
	<script src="<?php echo ASSETS_PATH; ?>plugins/alertifyjs/js/alertify.js"></script>
	<script src="<?php echo ASSETS_PATH; ?>plugins/alertifyjs/js/alertify-defaults.js"></script>
	<script src="<?php echo ASSETS_PATH; ?>pages/alladin/js/adm_messages.js"></script>
	<script src="<?php echo ASSETS_PATH; ?>plugins/daterangepicker/js/moment.min.js"></script>
	<script src="<?php echo ASSETS_PATH; ?>plugins/daterangepicker/js/daterangepicker.js"></script>
	<script src="<?php echo ASSETS_PATH; ?>plugins/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script src="<?php echo ASSETS_PATH; ?>plugins/charts/Chart.js/js/Chart.bundle.min.js"></script>
	<script src="<?php echo ASSETS_PATH; ?>plugins/charts/Chart.js/js/utils.js"></script>
	<script src="<?php echo ASSETS_PATH; ?>pages/goolgle-charts/js/loader.js"></script>
	<script src="<?php echo ASSETS_PATH; ?>pages/alladin/js/account.js"></script>
	<script src="<?php echo ASSETS_PATH; ?>pages/alladin/js/adm_todo.js"></script>
	<?php
	if ($foot) {
		include "shared/foot_" . $foot . ".php";
	}
	?>
	<!-- scripts -->
</body>

</html>