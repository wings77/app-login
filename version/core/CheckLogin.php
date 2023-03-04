<?php
####################################
# CheckLogin.php
# verifica el tiempo de 
# inactividad del usuario logueado
# graba las cookies
# arma la session
# enero 1 de 2018
# juan carlos contreras vp
####################################

if (!isset($_SESSION)) {
	session_start();
}

//https://stackoverflow.com/questions/520237/how-do-i-expire-a-php-session-after-30-minutes
if (isset($_SESSION['LAST_ACTIVITY'])) {
	$timeLoged = time() - $_SESSION['LAST_ACTIVITY'];
	if ($timeLoged > 36000) {
		if ($reports == 1) { 														 // cuando es llamado desde un reporte y se acaba la session cierra la ventana ****
			echo "<script>window.close();</script>";
			exit;
		} else {
			header("Location: " . ADMIN_URL . "/logout.php?msg=sessionEnd&timeLoged=" . $timeLoged . "&org=chklog");
			exit;
		}
	}
}

$_SESSION['LAST_ACTIVITY'] = time();

if (isset($_COOKIE['alladin_rememberme'])) {
	// User is logged (cookie)
	$token = filter_input(INPUT_COOKIE, 'alladin_rememberme', FILTER_SANITIZE_ENCODED);
} else if (isset($_SESSION['user_token'])) {
	// User is logged (session)
	$token = filter_var($_SESSION['user_token']);
} else {
	// User not logged
	header("location: " . ADMIN_URL . "/logout.php?msg=not_logged");
	exit;
}

// User logged	
$stmt = $conn_ctrl->prepare("SELECT * FROM " . $database_control_table_prefix . "users 
		INNER JOIN " . $database_control_table_prefix . "users_roles 
			ON " . $database_control_table_prefix . "users.role_id = " . $database_control_table_prefix . "users_roles.role_id 
		WHERE token = ? LIMIT 1");
$stmt->bindParam(1, $token);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (empty($row) || (empty($row['logged']))) {
	header("location: " . ADMIN_URL . "/logout.php?msg=invalid_user");
	exit;
}

$logged_user_id = $row['user_id'];
$logged_user_name = stripslashes($row['user_name']);
$logged_user_email = stripslashes($row['email']);
$logged_user_role_id = $row['role_id'];
$logged_user_role = $row['role'];
$logged_user_avatar = (empty($row['avatar'])) ? "no_avatar.png" : $row['avatar'];
$logged_user_company_id = $row['company_id'];
$logged_user_cashier_functions = $row['user_cashier_functions'];

$sql = "SELECT role FROM " . $database_control_table_prefix . "users_roles WHERE role_id = ? LIMIT 1";
$stmt = $conn_ctrl->prepare($sql);
$stmt->bindParam(1, $logged_user_role_id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$logged_user_role = stripslashes($row['role']);

// update last activity
$now = date("Y-m-d H:i:s");
$sql = "UPDATE " . $database_control_table_prefix . "users SET last_activity = ? WHERE user_id = ? ORDER BY user_id DESC LIMIT 1";
$conn_ctrl->prepare($sql)->execute([$now, $logged_user_id]);

$pageLog = 'chklogpage';