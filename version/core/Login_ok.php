<?php
// session_start();

// ; Lifetime in seconds of cookie or, if 0, until browser is restarted.
// ; http://php.net/session.cookie-lifetime
//seteo la vida de la session en 7200 segundos    
// ini_set("session.cookie_lifetime", MAX_SESSION_TIME);

// ; After this number of seconds, stored data will be seen as 'garbage' and
// ; cleaned up by the garbage collection process.
// ; http://php.net/session.gc-maxlifetime
//seteo el maximo tiempo de vida de la seession
// ini_set("session.gc_maxlifetime", MAX_SESSION_TIME);
//inicio la session    
// session_start();

require_once "../config.php";
require_once ABSPATH . "/core/PasswordHash.php";
require_once ABSPATH . "/core/random_compat/lib/random.php";

//recaptcha json
// {
// 	"success": true|false,      // whether this request was a valid reCAPTCHA token for your site
// 	"score": number             // the score for this request (0.0 - 1.0)
// 	"action": string            // the action name for this request (important to verify)
// 	"challenge_ts": timestamp,  // timestamp of the challenge load (ISO format yyyy-MM-dd'T'HH:mm:ssZZ)
// 	"hostname": string,         // the hostname of the site where the reCAPTCHA was solved
// 	"error-codes": [...]        // optional
// }

$login_email = filter_input(INPUT_POST, 'login_email', FILTER_SANITIZE_EMAIL);
$login_password = filter_input(INPUT_POST, 'login_password');
$loggedUsers = 0;
$logged = 1;

// recaptcha
if (ENVVIROMENT == "production") {
	if ($_POST) {
		function getCaptcha($SecretKey)
		{
			$Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . RECAPCHA_SECRET_KEY . "&response={$SecretKey}");
			$Return = json_decode($Response);
			// echo $Response;
			// exit;
			return $Return;
		}
		$Return = getCaptcha($_POST['g-recaptcha-response']);
		if ($Return->success == false && $Return->score < 0.9 || !isset($Return->score)) {   //if($Return->success == false){ 
			// You are a Robot!!
			header("Location: ../index.php?msg=robot");
			exit;
		}
	}
}
// end recaptcha

if (!filter_var($login_email, FILTER_VALIDATE_EMAIL)) {
	header("Location: ../index.php?msg=error");
	exit;
}

// Passwords should never be longer than 72 characters to prevent DoS attacks
if (strlen($login_password) > 72) {
	die('Contraseña debe tener 72 caracteres o menos');
}

$dbPassword = '*'; // In case the user email is not found

// validar email
$query = "SELECT * FROM " . $database_control_table_prefix . "users WHERE email = ? LIMIT 1";
$stmt = $conn_ctrl->prepare($query);
$stmt->bindParam(1, $login_email);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
	$dbPassword = $row['password'];

	$hasher = new PasswordHash(8, false);

	if ($hasher->CheckPassword($login_password, $dbPassword)) {
		//paswword OK
		$user_id = $row['user_id'];
		$user_name = $row['user_name'];
		$user_role_id = $row['role_id'];
		$user_active = $row['active'];
		$company_id = $row['company_id'];
		$branch_id = $row['branch_id'];

		if ($user_active == 0) {
			header("Location: ../index.php?msg=error_inactive");
			exit;
		}

		if ($user_role_id != 9){
			// verifica si el establecimiemto no esta bloqueado
			$sqlBranch = "SELECT * FROM " . $database_control_table_prefix . "branches WHERE brch_id = " . $row['branch_id'];
			$stmtBranch = $conn_ctrl->prepare($sqlBranch);
			$stmtBranch->execute();
			$rowBranch = $stmtBranch->fetch(PDO::FETCH_ASSOC);
			if ($rowBranch['brch_locked']) {
				header("Location: ../index.php?msg=error_activation_code");
				exit;
			}
		}

		// verifica numero se sesiones
		$query = "SELECT co_maxSessions, co_openSessions, co_locked FROM " . $database_control_table_prefix . "company WHERE co_id = " . $company_id;
		$stmtMaxSessions = $conn_ctrl->prepare($query);
		$stmtMaxSessions->execute();
		$rowCompany = $stmtMaxSessions->fetch(PDO::FETCH_ASSOC);
		if ($rowCompany['co_locked']) {
			header("Location: ../index.php?msg=error_activation_code");
			exit;
		}

		if ($rowCompany['co_maxSessions'] != 0) {
			$loggedUsers = $conn_ctrl->query("SELECT count(logged) FROM " . $database_control_table_prefix . "users WHERE logged = 1 AND company_id = " . $company_id)->fetchColumn();
			$loggedUsers = intval($loggedUsers);
			$co_maxSessions = intval($rowCompany['co_maxSessions']);
			if ($loggedUsers >= $co_maxSessions) {
				$loggedUsers -= 1;  // se desactiva la session del usuario en otros equipos no hay session full nunca 23/03/2020 jcc
				// header("Location: ../index.php?msg=sessionFull");
				// exit;
			}
		}

		$loggedUsers += 1;

		$authenticator = random_bytes(33);
		$user_token = hash('sha256', $authenticator);

		// graba nuevo token y señal de logeado
		$sql  = "UPDATE " . $database_control_table_prefix . "users SET token = ?, logged = ? WHERE user_id = ? LIMIT 1";
		$conn_ctrl->prepare($sql)->execute([$user_token, $logged, $user_id]);

		// incrementa el numero de sesiones abiertas
		$sqlSession  = "UPDATE " . $database_control_table_prefix . "company SET co_openSessions = $loggedUsers WHERE co_id = " . $company_id . " LIMIT 1";
		$conn_ctrl->prepare($sqlSession)->execute();

		// inicia session
		session_set_cookie_params(MAX_SESSION_TIME);
		if (!isset($_SESSION)) {
			session_start();
		}
		session_regenerate_id();
		ini_set("session.cookie_lifetime", MAX_SESSION_TIME);
		ini_set("session.gc_maxlifetime", MAX_SESSION_TIME);

		// variables de session
		$_SESSION['user_token'] = $user_token;
		$_SESSION['user_id'] = $user_id;
		$_SESSION['user_name'] = $user_name;
		$_SESSION['user_email'] = $login_email;
		$_SESSION['user_role_id'] = $user_role_id;
		$_SESSION['co_id'] = $company_id;
		$_SESSION['branch_id'] = $branch_id;
		$_SESSION['LAST_ACTIVITY'] = time();
		$_SESSION['app_url'] = $cfg_app_url;

		// geolocalización user data location
		// https://ipapi.com/
		// https://ipapi.com/documentation
		// mi ip 181.232.1.182
		// echo json_encode($api_result);

		// *-*-*-* archivo json *-*-*-*-*-
		// "ip":"::1",
		// "type":"ipv6",
		// "continent_code":null,
		// "continent_name":null,
		// "country_code":null,
		// "country_name":null,
		// "region_code":null,
		// "region_name":null,
		// "city":null,
		// "zip":null,
		// "latitude":null,
		// "longitude":null,
		// "location":{"geoname_id":null,
		//             "capital":null,
		//             "languages":null,
		//             "country_flag":null,
		//             "country_flag_emoji":null,
		//             "country_flag_emoji_unicode":null,
		//             "calling_code":null,
		//             "is_eu":false}

		// set IP address and API access key
		$ip = $_SERVER['REMOTE_ADDR'];  // mi ip '181.232.1.182'
		$access_key = '5a73cba014de3af93fa457407390d4c2';

		if ($ip != "::1") {
			// Initialize CURL:
			$ch = curl_init('http://api.ipapi.com/' . $ip . '?access_key=' . $access_key . '');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			// Store the data:
			$json = curl_exec($ch);
			curl_close($ch);

			// Decode JSON response:
			$api_result = json_decode($json, true);

			// Output the "calling_code" object inside "location"
			// echo $api_result['location']['calling_code'];
			// echo $api_result['city'];
			$city = (empty($api_result['city'])) ? "BOGOTÁ" : strtoupper($api_result['city']);
			$ip = (!isset($api_result['ip'])) ? 'localhost' : $api_result['ip'];
		} else {
			$city = 'BOGOTÁ';
			$ip = 'localhost';
		}

		$_SESSION['usr_city'] = $city;
		$_SESSION['usr_ip'] = $ip;

		// remember me
		if ($_POST['remember'] == "on") {
			setcookie('alladin_rememberme', $user_token, time() + 30 * 60 * 24 * 120, '/', '', false, true);
			session_set_cookie_params(MAX_SESSION_TIME);
		}

		header("location: ../account.php");
		exit;
	} else {
		header("Location: ../index.php?msg=error");
		exit;
	}
} else {
	header("Location: ../index.php?msg=error");
	exit;
}

unset($hasher);
exit;
