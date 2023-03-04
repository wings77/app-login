<?php
//=========================================================================================
// =================================GENERAL FUNCTIONS======================================
//=========================================================================================

function percent($dividend, $divider)
{
	if ($dividend == 0 || $divider == 0) {
		return 0;
	}
	return ($dividend / $divider) * 100;
}

function MakeValidURL($url)
{
	if ($url) {
		if (substr($url, 0, 7) != "http://" and substr($url, 0, 8) != "https://") $url = "http://" . $url;
		return $url;
	} else
		return "";
}


function random_code()
{
	$cod1 = md5(uniqid(rand(), true));
	$cod2 = substr($cod1, 0, 8);
	return $cod2;
}


function random_code_captcha()
{
	$length = 6;
	$i = 0;
	$rand_string = '';
	$possible_letters = '23456789bcdfghjkmnpqrstvwxyz';
	while ($i < $length) {
		$rand_string .= substr($possible_letters, mt_rand(0, strlen($possible_letters) - 1), 1);
		$i++;
	}
	return $rand_string;
}


function RewriteUrl($string)
{
	$diacritics_table = array(
		'Š' => 'S', 'š' => 's', 'Ð' => 'Dj', 'Ž' => 'Z', 'ž' => 'z', 'C' => 'C', 'c' => 'c', 'C' => 'C', 'c' => 'c', 'ć' => 'c', 'Ć' => 'C',
		'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'ą' => 'a', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ę' => 'E',
		'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O',
		'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'Ł' => 'L', 'ł' => 'l',
		'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e',
		'ê' => 'e', 'ë' => 'e', 'ě' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'Ó' => 'O', 'ó' => 'o',
		'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b',
		'ÿ' => 'y', 'R' => 'R', 'r' => 'r', 'č' => 'c', 'ť' => 't', 'Č' => 'C', 'ö' => 'o', 'ş' => 's', 'ı' => 'i', 'ń' => 'n',
		'ğ' => 'g', 'ü' => 'u', 'ș' => 's', 'ț' => 't', 'ă' => 'a', 'Ă' => 'A', 'Ș' => 'S', 'Ț' => 'T', 'Ğ' => 'G', 'İ' => 'I',
		'Ş' => 's', 'İ' => 'I', 'İ' => 'I', 'İ' => 'I', 'İ' => 'I', 'İ' => 'I', 'İ' => 'I', 'İ' => 'I', 'İ' => 'I', 'İ' => 'I', 'Ż' => 'Z', 'ż' => 'z'
	);

	$string = str_replace("\'", "", $string);
	$string2 = strtr($string, $diacritics_table);
	$return = strtolower(trim(preg_replace("/[^0-9a-zA-Z]+/", "-", $string2), "-"));
	if ($return == "") $return = random_code();
	return $return;
}


function Secure($string)
{
	$string = addslashes(htmlspecialchars($string, ENT_QUOTES));
	$string = strip_tags($string);
	return trim($string);
}


function RewriteFile($string)
{
	return strtolower(trim(preg_replace("/[^0-9a-zA-Z.]+/", "-", $string), "-"));
}


function getActiveContentStatusID()
{
	global $conn_ctrl;
	global $database_control_table_prefix;
	$sql = "SELECT id FROM " . $database_control_table_prefix . "content_status WHERE status = 'active' LIMIT 1";
	$rs = $conn_ctrl->query($sql);
	$row = $rs->fetch_assoc();
	$activeContentStatusID = $row['id'];
	return $activeContentStatusID;
}


function getPendingContentStatusID()
{
	global $conn_ctrl;
	global $database_control_table_prefix;
	$sql = "SELECT id FROM " . $database_control_table_prefix . "content_status WHERE status = 'pending' LIMIT 1";
	$rs = $conn_ctrl->query($sql);
	$row = $rs->fetch_assoc();
	$pendingContentStatusID = $row['id'];
	return $pendingContentStatusID;
}


function getDraftContentStatusID()
{
	global $conn_ctrl;
	global $database_control_table_prefix;
	$sql = "SELECT id FROM " . $database_control_table_prefix . "content_status WHERE status = 'draft' LIMIT 1";
	$rs = $conn_ctrl->query($sql);
	$row = $rs->fetch_assoc();
	$draftContentStatusID = $row['id'];
	return $draftContentStatusID;
}



function getAdminRoleId()
{
	global $conn_ctrl;
	global $database_control_table_prefix;

	$stmt = $conn_ctrl->prepare("SELECT role_id FROM " . $database_control_table_prefix . "users_roles WHERE role = 'admin' LIMIT 1");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$admin_role_id = $row['role_id'];
	return (int) $admin_role_id;
	$stmt->closeCursor();
}

function getUserRoleId()
{
	global $conn_ctrl;
	global $database_control_table_prefix;

	$stmt = $conn_ctrl->prepare("SELECT role_id FROM " . $database_control_table_prefix . "users_roles WHERE role = 'user' LIMIT 1");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$user_role_id = $row['role_id'];
	return (int) $user_role_id;
	$stmt->closeCursor();
}



function checkIfValueInList($value, $list)
{
	$list_items = explode(',', $list);
	if (in_array($value, $list_items)) {
		return 1;
	} else {
		return 0;
	}
}



// *******************************************************************************
// DATE and TIME functions
// *******************************************************************************

//funciones alladin

function format_date_Y_mm_dd($date)
{
	//cambia el separador de / a - y entrega la fecha en formato YYYY-mm-dd
	// $date = str_replace('/', '-', $date);
	// $date = date('Y-m-d', strtotime($date)); //con guion
	$date = date('d/m/Y', strtotime($date)); //con slash
	return $date;
}

function format_date_dd_mm_Y($date)
{
	return date('d-m-Y', strtotime($date));
}

function format_date_dd_mm_Y_His($dateTime)
{
	return date("d-m-Y H:i:s", strtotime($dateTime));
}


function IsValidDate($fecha)
{
	$valores = explode('/', $fecha);
	if (count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])) {
		return true;
	}
	return false;
}

function xDaysDiff($dateDue)
{
	// diferecia de fechas
	$datetime1 = new DateTime($dateDue);
	$datetime2 = new DateTime('now');
	$interval = $datetime1->diff($datetime2);
	$daysDiff = $interval->format('%R%a dias');

	return $daysDiff;
}


//fin funciones jcc

function spanishDate($date)
{
	$date = substr($date, 0, 10);
	$DayNumber = date('d', strtotime($date));
	$dia = date('l', strtotime($date));
	$mes = date('F', strtotime($date));
	$anio = date('Y', strtotime($date));
	$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
	$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
	$nombredia = str_replace($dias_EN, $dias_ES, $dia);
	$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
	// return $nombredia." ".$DayNumber." de ".$nombreMes." de ".$anio; //  Jueves 01 de Agosto de 2019
	return $DayNumber . " de " . $nombreMes . " de " . $anio . ", " . $nombredia; // 01 de Agosto de 2019, Jueves
}

function Now()
{
	$now = date("Y-m-d H:i:s");
	return $now;
}

function DateFormat_form($date)
{
	$date = new DateTime($date);
	return $date->format('m/d/Y');
}


function DateFormat($date)
//http://php.net/manual/es/timezones.php
{
	$date_format = "M d Y";

	if ($date == '0000-00-00')
		return "-";
	else {
		// setlocale(LC_ALL, 'es_CO.UTF-8');
		date_default_timezone_set('America/Bogota'); //Europe/Madrid  - America/Bogota -  Europe/London
		$datetime = date_create($date);
		return $datetime->format($date_format);
	}
}


function DateTimeFormat($date)
{
	$date_format = "M d Y";
	if ($date == '0000-00-00 00:00:00')
		return "-";
	else {
		date_default_timezone_set('Europe/London');
		$datetime = date_create($date);
		return $datetime->format($date_format . ', H:i');
	}
}


function TimeFormat($date)
{
	date_default_timezone_set('Europe/London');
	$datetime = date_create($date);
	return $datetime->format('H:i');
}


function xDaysAgo($days)
{
	return date("Y-m-d", strtotime("-$days day"));
}


//=========================================================================================
//DATABASE FUNCTIONS
//=========================================================================================
function addSettings($set_name, $set_value)
{
	global $conn_ctrl;
	global $database_control_table_prefix;
	$stmt = $conn_ctrl->prepare("SELECT id FROM " . $database_control_table_prefix . "settings WHERE set_name = ? LIMIT 1");
	$stmt->execute([$set_name]);
	$exist = $stmt->fetchColumn();

	if ($exist == 0 and $set_value) {
		// insert
		$stmt = $conn_ctrl->prepare("INSERT INTO " . $database_control_table_prefix . "settings (set_id, set_name, set_value) VALUES (NULL, ?, ?)");
		$stmt->execute([$set_name, $set_value]);
	} else {
		// update	
		$stmt = $conn_ctrl->prepare("UPDATE " . $database_control_table_prefix . "settings SET set_value = ? WHERE set_name = ? LIMIT 1");
		$stmt->execute([$set_value, $set_name]);
	}
}



function addSettingsNotUnique($set_name, $set_value)
{
	global $conn_ctrl;
	global $database_control_table_prefix;

	// insert
	$stmt = $conn_ctrl->prepare("INSERT INTO " . $database_control_table_prefix . "settings (set_id, set_name, set_value) VALUES (NULL, ?, ?)");
	$stmt->execute([$set_name, $set_value]);
}

function addUsersExtraUnique($user_id, $user_name, $value)
{
	global $conn_ctrl;
	global $database_control_table_prefix;

	$stmt = $conn_ctrl->prepare("SELECT id FROM " . $database_control_table_prefix . "users_extra WHERE user_name = ? AND user_id = ? LIMIT 1");
	$stmt->execute([$user_name, $user_id]);
	$exist = $stmt->fetchColumn();

	if ($value != "") {
		if ($exist == 0) {
			$stmt = $conn_ctrl->prepare("INSERT INTO " . $database_control_table_prefix . "users_extra (id, user_id, user_name, value) VALUES (NULL, ?, ?, ?)");
			$stmt->execute([$user_id, $user_name, $value]);
		} else {
			$stmt = $conn_ctrl->prepare("UPDATE " . $database_control_table_prefix . "users_extra SET value = ? WHERE user_name = ? AND user_id = ? LIMIT 1");
			$stmt->execute([$value, $user_name, $user_id]);
		}
	}
}


function getUsersExtraUnique($user_id, $user_name)
{
	global $conn_ctrl;
	global $database_control_table_prefix;

	$stmt = $conn_ctrl->prepare("SELECT value FROM " . $database_control_table_prefix . "users_extra WHERE user_name = ? AND user_id = ? LIMIT 1");
	$stmt->execute([$user_name, $user_id]);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$value = stripslashes($row['value']);

	return $value;
}


function addTags($content_id, $tags)
{
	global $conn;
	global $database_table_prefix;

	// delete all content tags
	$sql = "DELETE FROM " . $database_table_prefix . "tags WHERE content_id = '$content_id'";
	$rs = $conn->query($sql);

	// insert new tags		
	$tags = explode(",", $tags);
	for ($i = 0; $i < count($tags); ++$i) {
		$tag = trim($tags[$i]);
		$tag = addslashes($tag);
		$tag_permalink = RewriteUrl($tag);

		$query = "INSERT INTO " . $database_table_prefix . "tags (id, content_id, tag, permalink) VALUES (NULL, '$content_id', '$tag', '$tag_permalink')";
		if ($conn->query($query) === false) {
			trigger_error('Error: ' . $conn->error, E_USER_ERROR);
		} else {
			$last_inserted_id = $conn->insert_id;
			$affected_rows = $conn->affected_rows;
		}
	} // end for
}




function getUserDetailsArray($user_id)
{
	global $conn_ctrl;
	global $database_control_table_prefix;
	$UserDetailsArray = array();

	$stmt = $conn_ctrl->prepare("SELECT email, user_name, permalink, avatar, role_id, active, email_verified, last_activity, branch_id FROM " . $database_control_table_prefix . "users WHERE user_id = ? LIMIT 1");
	$stmt->execute([$user_id]);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	$email = $row['email'];
	$user_name = stripslashes($row['user_name']);
	$permalink = $row['permalink'];
	$avatar = $row['avatar'];
	$role_id = $row['role_id'];
	$active = $row['active'];
	$email_verified = $row['email_verified'];
	$last_activity = $row['last_activity'];
	$branch_id = $row['branch_id'];

	if (!$avatar) $user_avatar = "no_avatar.png";

	$stmt = $conn_ctrl->prepare("SELECT role, title FROM " . $database_control_table_prefix . "users_roles WHERE role_id = ? LIMIT 1");
	$stmt->execute([$role_id]);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$role = stripslashes($row['role']);
	$role_title = stripslashes($row['title']);

	$stmt = $conn_ctrl->prepare("SELECT value FROM " . $database_control_table_prefix . "users_extra WHERE user_id = ? AND user_name = ? LIMIT 1");

	$stmt->execute([$user_id, 'bio']);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$bio = stripslashes($row['value']);

	$stmt->execute([$user_id, 'register_ip']);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$register_ip = stripslashes($row['value']);

	$stmt->execute([$user_id, 'register_time']);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$register_time = stripslashes($row['value']);

	$stmt->execute([$user_id, 'register_host']);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$register_host = stripslashes($row['value']);

	$UserDetailsArray = array(
		"email" => $email, "user_name" => $user_name, "permalink" => $permalink, "avatar" => $avatar, "role_id" => $role_id, "active" => $active,
		"email_verified" => $email_verified, "last_activity" => $last_activity, "role" => $role, "role_title" => $role_title, "bio" => $bio, "register_ip" => $register_ip,
		"register_time" => $register_time, "register_host" => $register_host, "branch_id" => $branch_id
	);

	$stmt->closeCursor();
	return $UserDetailsArray;
}


function getCategDetailsArray($categ_id)
{
	global $conn;
	global $database_table_prefix;
	$CategDetailsArray = array();

	$sql_db = "SELECT title, permalink FROM " . $database_table_prefix . "categories WHERE id = '$categ_id' LIMIT 1";
	$rs_db = $conn->query($sql_db);
	if ($conn->query($sql_db) === false) {
		trigger_error('Error: ' . $conn->error, E_USER_ERROR);
	}
	$row = $rs_db->fetch_assoc();

	$categ_title = stripslashes($row['title']);
	$categ_permalink = stripslashes($row['permalink']);

	$CategDetailsArray = array("title" => $categ_title, "permalink" => $categ_permalink);

	return $CategDetailsArray;
}




//**************************************************************************************************
// TIME DIFFERENCE IN HOURS AND MINUTES
function timeFromLastOrder($time)
{
	$now = date("Y-m-d H:i:s");
	$datetime1 = new DateTime($time);
	$datetime2 = new DateTime($now);
	$interval = $datetime1->diff($datetime2);
	return $interval->format('%h') . " Hours " . $interval->format('%i') . " Minutes";
}


//------    CONVERTIR NUMEROS A LETRAS         ---------------
//------    Máxima cifra soportada: 18 dígitos con 2 decimales
//------    999,999,999,999,999,999.99
// NOVECIENTOS NOVENTA Y NUEVE MIL NOVECIENTOS NOVENTA Y NUEVE BILLONES
// NOVECIENTOS NOVENTA Y NUEVE MIL NOVECIENTOS NOVENTA Y NUEVE MILLONES
// NOVECIENTOS NOVENTA Y NUEVE MIL NOVECIENTOS NOVENTA Y NUEVE PESOS CON 99/100 M.L.
//------    Creada por:                        ---------------
//------             ULTIMINIO RAMOS GALÁN     ---------------
//------            uramos@gmail.com           ---------------
//------    10 de junio de 2009. México, D.F.  ---------------
//------    PHP Version 4.3.1 o mayores (aunque podría funcionar en versiones anteriores, tendrías que probar)

function numtoletras($xcifra)
{
	global $co_money_code, $co_money;

	$co_money_code .= $co_money;

	$xarray = array(
		0 => "Cero",
		1 => "UN", "DOS", "TRES", "CUATRO", "CINCO", "SEIS", "SIETE", "OCHO", "NUEVE",
		"DIEZ", "ONCE", "DOCE", "TRECE", "CATORCE", "QUINCE", "DIECISEIS", "DIECISIETE", "DIECIOCHO", "DIECINUEVE",
		"VEINTI", 30 => "TREINTA", 40 => "CUARENTA", 50 => "CINCUENTA", 60 => "SESENTA", 70 => "SETENTA", 80 => "OCHENTA", 90 => "NOVENTA",
		100 => "CIENTO", 200 => "DOSCIENTOS", 300 => "TRESCIENTOS", 400 => "CUATROCIENTOS", 500 => "QUINIENTOS", 600 => "SEISCIENTOS", 700 => "SETECIENTOS", 800 => "OCHOCIENTOS", 900 => "NOVECIENTOS"
	);
	//
	$xcifra = trim($xcifra);
	$xlength = strlen($xcifra);
	$xpos_punto = strpos($xcifra, ".");
	$xaux_int = $xcifra;
	$xdecimales = "00";
	if (!($xpos_punto === false)) {
		if ($xpos_punto == 0) {
			$xcifra = "0" . $xcifra;
			$xpos_punto = strpos($xcifra, ".");
		}
		$xaux_int = substr($xcifra, 0, $xpos_punto); // obtengo el entero de la cifra a covertir
		$xdecimales = substr($xcifra . "00", $xpos_punto + 1, 2); // obtengo los valores decimales
	}

	$XAUX = str_pad($xaux_int, 18, " ", STR_PAD_LEFT); // ajusto la longitud de la cifra, para que sea divisible por centenas de miles (grupos de 6)
	$xcadena = "";
	for ($xz = 0; $xz < 3; $xz++) {
		$xaux = substr($XAUX, $xz * 6, 6);
		$xi = 0;
		$xlimite = 6; // inicializo el contador de centenas xi y establezco el límite a 6 dígitos en la parte entera
		$xexit = true; // bandera para controlar el ciclo del While
		while ($xexit) {
			if ($xi == $xlimite) { // si ya llegó al límite máximo de enteros
				break; // termina el ciclo
			}

			$x3digitos = ($xlimite - $xi) * -1; // comienzo con los tres primeros digitos de la cifra, comenzando por la izquierda
			$xaux = substr($xaux, $x3digitos, abs($x3digitos)); // obtengo la centena (los tres dígitos)
			for ($xy = 1; $xy < 4; $xy++) { // ciclo para revisar centenas, decenas y unidades, en ese orden
				switch ($xy) {
					case 1: // checa las centenas
						if (substr($xaux, 0, 3) < 100) { // si el grupo de tres dígitos es menor a una centena ( < 99) no hace nada y pasa a revisar las decenas

						} else {
							$key = (int) substr($xaux, 0, 3);
							if (TRUE === array_key_exists($key, $xarray)) {  // busco si la centena es número redondo (100, 200, 300, 400, etc..)
								$xseek = $xarray[$key];
								$xsub = subfijo($xaux); // devuelve el subfijo correspondiente (Millón, Millones, Mil o nada)
								if (substr($xaux, 0, 3) == 100)
									$xcadena = " " . $xcadena . " CIEN " . $xsub;
								else
									$xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
								$xy = 3; // la centena fue redonda, entonces termino el ciclo del for y ya no reviso decenas ni unidades
							} else { // entra aquí si la centena no fue numero redondo (101, 253, 120, 980, etc.)
								$key = (int) substr($xaux, 0, 1) * 100;
								$xseek = $xarray[$key]; // toma el primer caracter de la centena y lo multiplica por cien y lo busca en el arreglo (para que busque 100,200,300, etc)
								$xcadena = " " . $xcadena . " " . $xseek;
							} // ENDIF ($xseek)
						} // ENDIF (substr($xaux, 0, 3) < 100)
						break;
					case 2: // checa las decenas (con la misma lógica que las centenas)
						if (substr($xaux, 1, 2) < 10) {
						} else {
							$key = (int) substr($xaux, 1, 2);
							if (TRUE === array_key_exists($key, $xarray)) {
								$xseek = $xarray[$key];
								$xsub = subfijo($xaux);
								if (substr($xaux, 1, 2) == 20)
									$xcadena = " " . $xcadena . " VEINTE " . $xsub;
								else
									$xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
								$xy = 3;
							} else {
								$key = (int) substr($xaux, 1, 1) * 10;
								$xseek = $xarray[$key];
								if (20 == substr($xaux, 1, 1) * 10)
									$xcadena = " " . $xcadena . " " . $xseek;
								else
									$xcadena = " " . $xcadena . " " . $xseek . " Y ";
							} // ENDIF ($xseek)
						} // ENDIF (substr($xaux, 1, 2) < 10)
						break;
					case 3: // checa las unidades
						if (substr($xaux, 2, 1) < 1) { // si la unidad es cero, ya no hace nada

						} else {
							$key = (int) substr($xaux, 2, 1);
							$xseek = $xarray[$key]; // obtengo directamente el valor de la unidad (del uno al nueve)
							$xsub = subfijo($xaux);
							$xcadena = " " . $xcadena . " " . $xseek . " " . $xsub;
						} // ENDIF (substr($xaux, 2, 1) < 1)
						break;
				} // END SWITCH
			} // END FOR
			$xi = $xi + 3;
		} // ENDDO

		if (substr(trim($xcadena), -5, 5) == "ILLON") // si la cadena obtenida termina en MILLON o BILLON, entonces le agrega al final la conjuncion DE
			$xcadena .= " DE";

		if (substr(trim($xcadena), -7, 7) == "ILLONES") // si la cadena obtenida en MILLONES o BILLONES, entoncea le agrega al final la conjuncion DE
			$xcadena .= " DE";

		// ----------- esta línea la puedes cambiar de acuerdo a tus necesidades o a tu país -------
		if (trim($xaux) != "") {
			switch ($xz) {
				case 0:
					if (trim(substr($XAUX, $xz * 6, 6)) == "1")
						$xcadena .= "UN BILLON ";
					else
						$xcadena .= " BILLONES ";
					break;
				case 1:
					if (trim(substr($XAUX, $xz * 6, 6)) == "1")
						$xcadena .= "UN MILLON ";
					else
						$xcadena .= " MILLONES ";
					break;
				case 2:
					if ($xcifra < 1) {
						$xcadena = "CERO PESOS CON $xdecimales/100 " . $co_money_code;
					}
					if ($xcifra >= 1 && $xcifra < 2) {
						$xcadena = "UN PESO CON $xdecimales/100 " . $co_money_code;
					}
					if ($xcifra >= 2) {
						$xcadena .= " PESOS CON $xdecimales/100 " . $co_money_code; //
					}
					break;
			} // endswitch ($xz)
		} // ENDIF (trim($xaux) != "")
		// ------------------      en este caso, para México se usa esta leyenda     ----------------
		$xcadena = str_replace("VEINTI ", "VEINTI", $xcadena); // quito el espacio para el VEINTI, para que quede: VEINTICUATRO, VEINTIUN, VEINTIDOS, etc
		$xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles
		$xcadena = str_replace("UN UN", "UN", $xcadena); // quito la duplicidad
		$xcadena = str_replace("  ", " ", $xcadena); // quito espacios dobles
		$xcadena = str_replace("BILLON DE MILLONES", "BILLON DE", $xcadena); // corrigo la leyenda
		$xcadena = str_replace("BILLONES DE MILLONES", "BILLONES DE", $xcadena); // corrigo la leyenda
		$xcadena = str_replace("DE UN", "UN", $xcadena); // corrigo la leyenda
	} // ENDFOR ($xz)
	return trim($xcadena);
}

// END FUNCTION

function subfijo($xx)
{ // esta función regresa un subfijo para la cifra
	$xx = trim($xx);
	$xstrlen = strlen($xx);
	if ($xstrlen == 1 || $xstrlen == 2 || $xstrlen == 3)
		$xsub = "";
	//
	if ($xstrlen == 4 || $xstrlen == 5 || $xstrlen == 6)
		$xsub = "MIL";
	//
	return $xsub;
}

// END FUNCTION


// file:///DOCUMENTOS/Facturacion%20electronica/DIAN/Kit%20Factura%20Electronica%20Validacion%20Previa/Anexo%20Tecnico/Anexos%20Tecnicos.pdf   (redondeos dian)
function roundingNumber($valToRounding)
{
	$value = $valToRounding;
	$integer = intval($value);
	$decimals = $value - $integer;
	if ($decimals == 0) return floatval($value);
	$digit = intval(substr($decimals, 3, 1));
	$digit2 = intval(substr($decimals, 4, 1));
	$digit3 = intval(substr($decimals, 5, 1));

	switch ($digit2) {
		case 0:
		case 1:
		case 2:
		case 3:
		case 4:
			$digit = intval(substr($decimals, 3, 1));
			break;
		case 5:
			$digit = ($digit3 == 0 || $digit3 % 2 == 0) ? $digit = intval(substr($decimals, 3, 1)) : $digit++;
			break;
		case 6:
		case 7:
		case 8:
		case 9:
			$digit++;
			break;
	}
	$value = $integer . substr($decimals, 1, 2) . $digit;

	return floatval($value);
};

function get_numeric($val)
{
	if (is_numeric($val)) {
		return $val + 0;
	}
	return 0;
}
  
// Example:
//   get_numeric('3'); // int(3)
//   get_numeric('1.2'); // float(1.2)
//   get_numeric('3.0'); // float(3)
