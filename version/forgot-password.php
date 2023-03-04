<?php
session_start();
if (isset($_SESSION['user_token']) or isset($_COOKIE['alladin_rememberme'])) {
	// user is logged
	header("location:account.php");
	exit;
}
require_once "config.php";
require ABSPATH . "/core/smtp/PHPMailerAutoload.php";
if (!empty($_POST)) {
	$msg = filter_input(INPUT_POST, 'msg', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$sql  = "SELECT * FROM " . $database_control_table_prefix . "users WHERE email='" . $email . "' LIMIT 1";
		$stmt = $conn_ctrl->prepare($sql);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($stmt->rowCount() == 0) {
			$msg = "No es un email registrado!";
		} else {
			$token = bin2hex(random_bytes(30));
			$user_id = $row['user_id'];
			$user_name = $row['user_name'];
			$update = "UPDATE " . $database_control_table_prefix . "users SET password_request = 1, token_password = ? WHERE user_id = ?";
			$stmt = $conn_ctrl->prepare($update);
			$stmt->bindParam(1, $token, PDO::PARAM_STR);
			$stmt->bindParam(2, $user_id, PDO::PARAM_INT);
			$stmt->execute();
			//enviar email
			$url = ADMIN_URL . '/core/UserNewPassword.php?usr_id=' . $user_id . '&token=' . $token;
			$subjet = "Restablecer Contraseña - Alladin ERP";
			// $msgBody = "Se ha solicitado restablecer la contraseña de Alladin para el usuario ".$user_name;

			// SMTP MAILER	
			//----------------------------------------------------------------------------------------------------------		
			$mail = new PHPMailer;

			$mail->IsSMTP();                                   // Set mailer to use SMTP
			$mail->Host = $cfg_mail_smtp_server;               // Specify main and backup server
			$mail->Port = $cfg_mail_smtp_port;                 // Set the SMTP port
			$mail->SMTPAuth = true;                            // Enable SMTP authentication
			$mail->Username = $cfg_mail_smtp_user;             // SMTP username
			$mail->Password = $cfg_mail_smtp_password;         // SMTP password
			$mail->SMTPSecure = $cfg_mail_smtp_encryption;     // Enable encryption, 'ssl' also accepted

			$mail->setFrom($cfg_site_email, $cfg_site_email_name);
			$mail->addReplyTo($cfg_site_email);
			$mail->AddAddress($email);

			$mail->IsHTML(true);                                  // Set email format to HTML

			$mail->Subject = $subjet;  //." desde ".ADMIN_URL;
			$mail->Body = '
				<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
						<style type="text/css">
							@media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
								body[yahoo] .buttonwrapper { background-color: transparent !important; }
								body[yahoo] .button { padding: 0 !important; }
								body[yahoo] .button a { background-color: #9b59b6; padding: 15px 25px !important; }
							}
				
							@media only screen and (min-device-width: 601px) {
								.content { width: 600px !important; }
								.col387 { width: 387px !important; }
							}
						</style>
					</head>
					<body bgcolor="#ffffff" style="margin: 0; padding: 0;" yahoo="fix">
						<!--[if (gte mso 9)|(IE)]>
						<table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td>
						<![endif]-->
						<table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; max-width: 600px;" class="content">
							<tr>
								<td style="padding: 15px 10px 15px 10px;">
									<table border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td align="center" style="color: #fff; font-family: Arial, sans-serif; font-size: 12px;">
												Email not displaying correctly?  <a href="#" style="color: #4680ff;">View it in your browser</a>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td align="center" bgcolor="#4680ff" style="padding: 20px 20px 20px 20px; color: #ffffff; font-family: Arial, sans-serif; font-size: 36px; font-weight: bold;">
									<img src="' . ADMIN_URL . '/assets/images/alladin-mail.png" alt="Alladin Logo" width="262" height="52" style="display:block;" />
								</td>
							</tr>
							<tr>
								<td align="center" bgcolor="#ffffff" style="padding: 40px 20px 40px 20px; color: #555555; font-family: Arial, sans-serif; font-size: 20px; line-height: 30px; border-bottom: 1px solid #f6f6f6;">
									<b>Se ha solicitado restablecer la contraseña de Alladin para:</b>
								</td>
							</tr>
							<tr>
								<td align="center" bgcolor="#f9f9f9" style="padding: 20px 20px 0 20px; color: #555555; font-family: Arial, sans-serif; font-size: 20px; line-height: 30px;">
									<b>Usuario: </b>' . $user_name . '
								</td>
							</tr>
							<tr>
								<td align="center" bgcolor="#f9f9f9" style="padding: 30px 20px 30px 20px; font-family: Arial, sans-serif; border-bottom: 1px solid #f6f6f6;">
									<table bgcolor="#4680ff" border="0" cellspacing="0" cellpadding="0" class="buttonwrapper">
										<tr>
											<td align="center" height="50" style=" padding: 0 25px 0 25px; font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;" class="button">
												<a href=' . $url . ' style="color: #ffffff; text-align: center; text-decoration: none;">Restablecer Contraseña</a>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td align="center" bgcolor="#ffffff" style="padding: 10px 20px 10px 20px; color: #555555; font-family: Arial, sans-serif; font-size: 15px; line-height: 24px;">
									Ayuda! <a href='. $cfg_app_url . ' style="color: #1b8bf9;">No lo he solicitado!</a>
								</td>
							</tr>
							<tr>
								<td align="center" bgcolor="#dddddd" style="padding: 15px 10px 15px 10px; color: #555555; font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;">
									<b>Alladin</b><br/>Enviado desde Software Alladin ERP
								</td>
							</tr>
							<tr>
								<td style="padding: 15px 10px 15px 10px;">
									<table border="0" cellpadding="0" cellspacing="0" width="100%">
										<tr>
											<td align="center" width="100%" style="color: #fff; font-family: Arial, sans-serif; font-size: 12px;">
												2017-18 &copy; <a href="' . $cfg_app_url . '" style="color: #4680ff;">' . $cfg_app_name . " V" . $cfg_app_version . '</a>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<!--[if (gte mso 9)|(IE)]>
								</td>
							</tr>
						</table>
						<![endif]-->
					</body>
				</html>
				';
			// $mail->AltBody = $msgBody;
			if (!$mail->Send()) {
				echo 'El mensaje no pudo ser enviado!';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
				exit;
			}
			$msg = "Se ha enviado un email a " . $email . " con un link para restablecer su contraseña, por favor verifique!";
		}
	} else {
		$msg = "No es un email valido!";
	}
} else {
	$msg = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Alladin : Restaurar Contraseña</title>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Alladin">
	<meta name="keywords" content=", Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
	<meta name="author" content="Alladin">
	<!-- Favicon icon -->
	<link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	<!-- iconfont -->
	<link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
	<!-- Required Fremwork -->
	<link rel="stylesheet" type="text/css" href="../bower_components/bootstrap/css/bootstrap.min.css">
	<!-- waves css -->
	<link rel="stylesheet" type="text/css" href="assets/plugins/waves/css/waves.min.css">
	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<!-- Responsive.css-->
	<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
	<!--color css-->
	<link rel="stylesheet" type="text/css" href="assets/css/color/color-1.min.css" id="color" />
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH; ?>pages/alladin/css/alladin.css" />
	<link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>plugins/mobirise/web/assets/mobirise-icons/mobirise-icons.css">
	<link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>plugins/mobirise/tether/tether.min.css">
	<link rel="stylesheet" href="<?php echo COMPONENTS_PATH; ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>plugins/mobirise/dropdown/css/style.css">
	<link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>plugins/mobirise/theme/css/style.css">
	<link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>plugins/mobirise/mobirise/css/mbr-additional.css">
	<link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>plugins/alertifyjs/css/themes/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>plugins/alertifyjs/css/alertify.css" />

</head>

<body>
	<section class="header15 cid-rpO9bm6VjZ mbr-fullscreen mbr-parallax-background" id="header15-w">
		<div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(60, 120, 255);">
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="login-card card-block">
						<?php
						if ($msg != '')
							echo '<p class="text-danger">' . $msg . '<p/>';
						?>
						<form id="forgotPassword" class="md-float-material" data-toggle="validator" role="form" method="post" action="<?php $_SERVER['PHP_SELF'] ?>" autocomplete="off">
							<div class="text-center">
								<img src="<?php echo ADMIN_URL . '/assets/images/alladin-login-blue.png'; ?>" height="108" width="362">
							</div>
							<h3 class="text-primary text-center m-b-25">Recupere su Contraseña</h3>
							<div class="md-group">
								<div class="md-input-wrapper">
									<input type="email" class="md-form-control" id="email" name="email" data-error="Ingrese un email valido" required>
									<label>E-mail</label>
								</div>
							</div>
							<div class="btn-forgot">
								<input type="submit" class="btn btn-primary btn-md waves-effect waves-light text-center" value="Enviar" name="submit" />
							</div>
							<div class=" text-center m-t-25">
								<a href="index.php" class="f-w-600 p-l-5">Iniciar Sesion</a>
							</div>
							<!-- end of btn-forgot class-->
						</form>
						<!-- end of form -->
					</div>
					<!-- end of login-card -->
				</div>
				<!-- end of col-sm-12 -->
			</div>
			<!-- end of row -->
		</div>
		<!-- end of container-fluid -->
	</section>
	<div id="scripts">
		<!-- Required Jqurey -->
		<script type="text/javascript" src="../bower_components/jquery/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bower_components/jquery-ui/js/jquery-ui.min.js"></script>
		<!-- tether.js -->
		<script type="text/javascript" src="../bower_components/popper.js/js/popper.min.js"></script>
		<!-- waves effects.js -->
		<script src="assets/plugins/waves/js/waves.min.js"></script>
		<!-- Required Framework -->
		<script type="text/javascript" src="../bower_components/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<!-- Custom js -->
		<script type="text/javascript" src="assets/pages/elements.js"></script>
		<!-- <script type="text/javascript" src="assets/js/common-pages.min.js"></script> -->
	</div>
</body>

</html>