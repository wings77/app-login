<?php
session_start();
if (isset($_SESSION['user_token']) or isset($_COOKIE['alladin_rememberme'])) {
	// user is logged en el  mismo pc
	header("location:account.php");
	// header("location:../account.php");
	exit;
}

$msg = filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING);
$msg = "";
require_once "config.php";

$long = 10;
//Carácteres para la contraseña
$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890@$%&/()=?#";
$password = "";
//Reconstruimos la contraseña segun la longitud que se quiera
for ($i = 0; $i < $long; $i++) {
	//obtenemos un caracter aleatorio escogido de la cadena de caracteres
	$password .= substr($str, rand(0, 73), 1);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Alladin : Registro</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="7-soft">
	<meta name="keywords" content="Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
	<meta name="author" content="7-soft">
	<script src="https://www.google.com/recaptcha/api.js?render=<?php echo RECAPCHA_SITE_KEY; ?>"></script>
	<!-- Favicon icon -->
	<link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	<!--ico Fonts-->
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
	<!-- alertify js -->
	<link rel="stylesheet" type="text/css" href="assets/plugins/alertifyjs/css/alertify.css" />
	<link rel="stylesheet" type="text/css" href="assets/plugins/alertifyjs/css/themes/bootstrap.css" />
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
		<!-- Container-fluid starts -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="login-card card-block bg-white">
						<form id="registerForm" name="registerForm" class="md-float-material" data-toggle="validator" role="form" method="POST" autocomplete="off">
							<input hidden type="text" id="registerStatus" name="registerStatus" value="<?php echo $msg; ?>">
							<div class="text-center">
								<img src="<?php echo ADMIN_URL . '/assets/images/alladin-login-blue.png'; ?>" height="80%" width="80%">
							</div>
							<!-- <h3 class="text-center txt-primary">Crear Cuenta</h3> -->
							<div class="row">
								<div class="col-md-12">
									<div class="md-input-wrapper">
										<input id="co_name" name="co_name" type="text" class="md-form-control" required value="">
										<label>Nombre o Razon Social*</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="md-input-wrapper">
										<select id="brch_branch_type" name="brch_branch_type" class="md-form-control" required value="">
											<option value="">Tipo Establecimiento Ppal*</option>
											<?php
											$stmt_branch_type = $conn_ctrl->prepare("SELECT * FROM " . $database_control_table_prefix . "branch_type ORDER BY brch_type_name");
											$stmt_branch_type->execute();
											while ($row_branch = $stmt_branch_type->fetch(PDO::FETCH_ASSOC)) {
												$brch_type_id_selected = $row_branch['brch_type_code'];
												$brch_type_name_selected = stripslashes($row_branch['brch_type_name']);
											?>
												<option value="<?php echo $brch_type_id_selected; ?>"><?php echo $brch_type_name_selected; ?></option>
											<?php
											}
											?>
											<option value="50">POS Alimentos y Bebidas</option>
											<option value="51">Parqueadero</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<div class="md-input-wrapper">
										<select name="co_documentType" id="co_documentType" class="md-form-control" required>
											<!-- js-example-basic-single-->
											<option value="">Tipo Documento*</option>
											<?php
											foreach ($documentType as $code => $name) {
												echo "<option value=" . $code . ">" . $name . "</option>";
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-5">
									<div class="md-input-wrapper">
										<input id="co_nit" name="co_nit" type="number" class="md-form-control" required value="">
										<label>Numero*</label>
									</div>
								</div>
								<div class="col-md-2">
									<div class="md-input-wrapper">
										<input id="co_dv" name="co_dv" type="number" class="md-form-control" value="">
										<label>DV</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="checkbox-fade fade-in-primary">
										<label>
											<input type="checkbox" id="pucInclude" name="pucInclude" value="">
											<span class="cr">
												<i class="cr-icon icofont icofont-ui-check txt-primary"></i>
											</span>
											Incluir Plan de Cuentas <br>
											<p id="test"></p>
										</label>
									</div>
								</div>
								<br><br>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="md-input-wrapper">
										<input id="co_email" name="co_email" type="email" class="md-form-control" required value="" autocomplete="ofF">
										<label>Correo Electronico*</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="md-input-wrapper">
										<input id="database_user" name="database_user" type="text" class="md-form-control" maxlength="8" required value="" autocomplete="ofF">
										<label>Usuario*</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="md-input-wrapper">
										<input id="co_invoice" name="co_invoice" type="number" class="md-form-control" required value="">
										<label>Factura de Pago*</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="md-input-wrapper">
										<input id="text" name="password" type="text" class="md-form-control" required autocomplete="ofF" value="<?php echo $password ?>">
										<label>Contraseña Personal*</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="md-input-wrapper">
										<input id="passwordConfirm" name="passwordConfirm" type="text" class="md-form-control" required value="" autocomplete="ofF">
										<label>Confirme Contraseña*</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="checkbox-fade fade-in-primary">
										<label>
											<input type="checkbox" id="terms" name="terms" value="">
											<span class="cr">
												<i class="cr-icon icofont icofont-ui-check txt-primary"></i>
											</span>
											<a href="/uploads/tyc/tyc-alladinerp-21280.pdf" target="_blank">He Leido Terminos y Condiciones</a>
											<!-- http://wampserver/htdocs/alladinerp/uploads/tyc/tyc-alladinerp-21280.pdf -->
											<p id="testterm"></p>
										</label>
									</div>
								</div>
								<br><br>
							</div>
							<!-- RECAPTCHA -->
							<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" />
							<br>
							<div class="col-xs-10 offset-xs-1">
								<button id="btnRegister" name="btnRegister" type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light m-b-20">Registrarse</button>
							</div>
							<br>
							<div class="row">
								<div class="col-md-12"">
											<span class=" text-muted">Ya tiene una Cuenta?</span>
									<a href="index.php" class="f-w-600 p-l-5">Ingrese por Aqui</a>
								</div>
							</div>
						</form>
						<!-- end of form -->
					</div>
					<!-- end of login-card -->
				</div>
				<!-- end of col-sm-12 -->
			</div>
			<!-- end of row-->
		</div>
		<!-- end of container-fluid -->
	</section>
	<!-- Required Jqurey -->
	<script type="text/javascript" src="../bower_components/jquery/js/jquery.min.js"></script>
	<script type="text/javascript" src="../bower_components/jquery-ui/js/jquery-ui.min.js"></script>
	<!-- tether.js -->
	<script type="text/javascript" src="../bower_components/popper.js/js/popper.min.js"></script>
	<!-- waves effects.js -->
	<script src="assets/plugins/waves/js/waves.min.js"></script>
	<!-- Required Framework -->
	<script type="text/javascript" src="../bower_components/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!--text js-->
	<script type="text/javascript" src="assets/pages/elements.js"></script>
	<!-- <script type="text/javascript" src="assets/js/common-pages.min.js"></script> -->
	<!-- allertifyjs include the script -->
	<script src="assets/plugins/alertifyjs/js/alertify.js"></script>
	<script src="assets/plugins/alertifyjs/js/alertify-defaults.js"></script>
	<script src="assets/pages/alladin/js/adm_register.js"></script>
	<!-- recapcha -->
	<script>
		grecaptcha.ready(function() {
			grecaptcha.execute('<?php echo RECAPCHA_SITE_KEY; ?>', {
					action: 'homepage'
				})
				.then(function(token) {
					document.getElementById('g-recaptcha-response').value = token;
				});

			$("#btnRegister").attr("disabled", true);
		});

		$('#terms').change(function() {
			if (this.checked) {
				$("#btnRegister").attr("disabled", false);
				$("#terms").prop("checked", true);
			} else {
				$("#btnRegister").attr("disabled", true);
				$("#myCheck").prop("checked", false);
			}
		});

		$('#co_nit').focusout(function() {
			CalcularDv();
		});

		function CalcularDv() {
			var vpri, x, y, z, i, nit1, dv1;
			nit1 = document.registerForm.co_nit.value;
			if (isNaN(nit1)) {
				document.form1.dv.value = "X";
				alert('El valor digitado no es un numero valido');
			} else {
				vpri = new Array(16);
				x = 0;
				y = 0;
				z = nit1.length;
				vpri[1] = 3;
				vpri[2] = 7;
				vpri[3] = 13;
				vpri[4] = 17;
				vpri[5] = 19;
				vpri[6] = 23;
				vpri[7] = 29;
				vpri[8] = 37;
				vpri[9] = 41;
				vpri[10] = 43;
				vpri[11] = 47;
				vpri[12] = 53;
				vpri[13] = 59;
				vpri[14] = 67;
				vpri[15] = 71;
				for (i = 0; i < z; i++) {
					y = (nit1.substr(i, 1));
					//document.write(y+"x"+ vpri[z-i] +":");
					x += (y * vpri[z - i]);
					//document.write(x+"<br>");		
				}
				y = x % 11
				//document.write(y+"<br>");
				if (y > 1) {
					dv1 = 11 - y;
				} else {
					dv1 = y;
				}
				document.registerForm.co_dv.value = dv1;
			}
		}
	</script>
</body>

</html>