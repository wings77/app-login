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

if (!isset($_SESSION)) {
    session_start();
}

// user is logged en el  mismo pc
if (isset($_COOKIE['alladin_rememberme'])) {
    header("location: " . trim($version, '/') . "/account.php");
    exit;
}

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
    <title><?php echo $cfg_site_meta_title; ?></title>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="<?php echo $cfg_site_meta_description; ?>">
    <meta name="keywords" content="<?php echo $cfg_site_meta_keywords; ?>">
    <meta name="author" content="7-soft">
    <meta property="og:title" content="AlladinERP login form">
    <meta property="og:type" content="article">
    <meta property="og:url" content="https://alladinerp.com.com/">
    <meta property="og:image" content="assets/images/erp.png">
    <meta property="og:image:secure_url" content="assets/images/erp.png">
    <meta property="og:description" content="AlladinERP Software Adminitrativo y de Facturacion Electronica">
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/stylesheet/style.css">
    <link rel="stylesheet" href="assets/stylesheet/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/stylesheet/login.css" />
    <link rel="stylesheet" href="assets/stylesheet/general-style-plugins.css">
    <link rel="stylesheet" href="assets/bootstrap/css/style.css">
    <link rel="stylesheet" href="assets/plugins/alertify/css/alertify.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo RECAPCHA_SITE_KEY; ?>"></script>
    <?php

    ?>
</head>

<body>
    <div class="content-container welcome-container">
        <div class="ad-placement-header-footer">
        </div>
        <div id="contnet">
            <div class="wrapper">
                <img class="red-svg" src="assets/images/background14.png" alt="wave">
                <div class="new_login">
                    <div class="login_header">
                        <div>
                            <div class="header_logo">
                                <a href="https://www.alladinerp.com" target="_blank" class="logo">
                                    <img src="assets/images/logo_login3.png" alt="Logo">
                                </a>
                            </div>
                            <div class="header_text">
                                <p>¡Todas las Funciones de su Empresa!</p>
                            </div>
                        </div>
                        <div class="form-tabs">
                            <button id="openLogin">Ingresar</button>
                            <button id="openRegister">Registrar</button>
                            <a href="https://app.alladinerp.com/uploads/tyc/tyc-alladinerp-21280.pdf"><button>TyC</button></a>
                            <a href="https://support.7-soft.com/es" target="_blank"><button>Soporte</button></a>
                            <a href="https://www.alladinerp.com/site/contact.php?t=7%20Soft%20-%20Contactenos" target="_blank"><button>Contacto</button></a>
                            <!-- <a href="https://www.alladinerp.com" target="_blank"><button>Demos</button></a> -->
                            <a href="https://www.alladinerp.com" target="_blank"><button>AlladinERP.com</button></a>
                        </div>
                        <div class="dontHaveAnAccount">
                            <p>¿No tienes una cuenta? <button>Registrar</button></p>
                        </div>
                    </div>
                    <div class="login_div" id="login_div">
                        <div class="login_left_content">
                            <div class="login_left_content_text">
                                <h3 class="text-muted">Sistemas de Facturación</h3>
                                <p></p>
                            </div>
                            <!-- Slider main container -->
                            <div class="swiper">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Slides -->
                                    <div class="swiper-slide">
                                        <img src="assets/images/erp.png" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="assets/images/pos.png" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="assets/images/fd.png" alt="">

                                    </div>
                                    <div class="swiper-slide">
                                        <img src="assets/images/park.png" alt="">
                                    </div>
                                </div>
                                <!-- If we need pagination -->
                                <!-- <div class="swiper-pagination"></div> -->
                                <!-- If we need navigation buttons -->
                                <!-- <div class="swiper-button-prev"></div> -->
                                <!-- <div class="swiper-button-next"></div> -->
                                <!-- If we need scrollbar -->
                                <div class="swiper-scrollbar"></div>
                            </div>
                        </div>
                        <div class="formDiv">
                            <h3 class="text-muted">Ingresar</h3>
                            <form id="loginForm" name="loginForm" action="<?php echo trim($version, '/'); ?>/core/Login.php" method="post" autocomplete="off" style="padding-top: 10px;">
                                <input hidden type="text" id="login_status" name="login_status" value="<?php echo $msg; ?>">
                                <input hidden type="number" id="timeLoged" name="timeLoged" value="<?php echo $timeLoged; ?>">
                                <!-- recapcha -->
                                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" />
                                <!-- <div class="alert alert-danger login_errors"></div> -->
                                <div class="form_fields">
                                    <label for="login_email">Correo Electronico</label>
                                    <input type="email" id="login_email" name="login_email" class="form-control px-3 display-7" placeholder="Email" required="required" autocomplete="ofF" autofocus="">
                                </div>
                                <div class="form_fields">
                                    <div>
                                        <label for="password">Contraseña</label>
                                        <a href="recover_passw.php" class="main">¿Olvidaste tu Contraseña?</a>
                                    </div>
                                    <input type="password" id="login_password" name="login_password" class="form-control px-3 display-7" placeholder="Contraseña" data-minlength="6" required="required" data-error="Password to short" required="required" autocomplete="off">
                                </div>
                                <div class="forgot_password">
                                    <div class="form-group">
                                        <div class="switch switch-primary d-inline m-r-10">
                                            <input type="checkbox" id="remember_device" name="remember_device" value="">
                                            <label for="remember_device" class="cr"></label>
                                        </div>
                                        <label for="remember_device">Recordar este dispositivo</label>
                                    </div>
                                </div>
                                <div class="login_signup_combo">
                                    <div class="login__">
                                        <button type="submit" class="btn btn-outline-primary">Ingresar</button>
                                    </div>
                                    <div class="social_btns">
                                        <p><span></span>Siguenos en:<span></span></p>
                                        <div class="social_btns_div">
                                            <a href="https://www.facebook.com/profile.php?id=100064249383731" class="btn no_padd">
                                                <img src="assets/images/fa-facebook.png" alt="">
                                            </a>
                                            <a href="https://www.instagram.com/7soft77/" class="btn no_padd">
                                                <img src="assets/images/fa-instagram.png" alt="">
                                            </a>
                                            <a href="https://www.twitter.com/jccol77" class="btn no_padd">
                                                <img src="assets/images/fa-twiter.png" alt="">
                                            </a>
                                            <a href="https://www.youtube.com/channel/UC1NdOad7cuwNBYIccccIgZg" class="btn no_padd">
                                                <img src="assets/images/fa-youtube.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="login_div" id="register_div">
                        <div class="login_left_content">
                            <div class="login_left_content_text">
                                <h3 class="text-muted">¡Productos Alladin!</h3>
                                <p></p>
                            </div>
                        </div>
                        <div class="formDiv">
                            <form id="register" method="post">
                                <p class="title main">Registrar</p>
                                <div class="alert alert-danger register_errors"></div>
                                <div class="form_fields">
                                    <label for="username">Correo Electronico</label>
                                    <input id="username" name="username" type="text" autocomplete="off" autofocus="">
                                </div>
                                <div class="form_fields">
                                    <label for="email">Direcció de E-mail</label>
                                    <input id="email" name="email" type="email">
                                </div>
                                <div class="form_fields">
                                    <label for="password">Contraseña</label>
                                    <input id="register_password" name="password" type="password">
                                </div>
                                <div class="form_fields">
                                    <label for="confirm_password">Confirmar Contraseña</label>
                                    <input id="confirm_password" name="confirm_password" type="password">
                                </div>
                                <div class="form_fields">
                                    <label for="gender">Genero</label>
                                    <select name="gender" id="gender">
                                        <option value="0">Genero</option>
                                        <option value="female">Mujer</option>
                                        <option value="male">Hombre</option>
                                    </select>
                                </div>
                                <div class="terms">
                                    <input type="checkbox" name="accept_terms" id="accept_terms" onchange="activateButton(this)">
                                    <label for="accept_terms">
                                        Al crear su cuenta, usted está de acuerdo con nuestra <a href="https://alladinerp.com/wonderful/welcome10/Script/terms/terms" class="main">Condiciones</a> &amp; <a href="https://alladinerp.com/wonderful/welcome10/Script/terms/privacy-policy" class="main">Política</a>
                                    </label>
                                    <div class="clear"></div>
                                </div>
                                <div class="login_signup_combo">
                                    <div class="login__">
                                        <button type="submit" style="background: #c32e3a !important;" class="btn btn-main btn-mat add_wow_loader" id="sign_submit" disabled="">¡Vamos!</button>
                                    </div>
                                    <div class="signup__">
                                        <p>¿Ya tienes una cuenta? <a class="dec main" href="index.php">Ingresar</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="welcome-footer">
                            Alladin ERP <?php echo $cfg_app_version; ?> | © Copyright 2023 | 7-Soft | All Rights Reserved
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="second-footer" style="display: none; ">
            <div class="page-margin">
                <div class="footer-wrapper">
                    <hr>
                    <div class="footer-powered">
                        <p>
                            © 2023 Alladin </p>
                        <ul class="list-inline">
                            <li><a href="https://alladinerp.com/wonderful/welcome10/Script" data-ajax="?link1=home">Inicio</a></li>
                            <li><a href="https://alladinerp.com/wonderful/welcome10/Script/terms/about-us" data-ajax="?link1=terms&amp;type=about-us">Pin</a></li>
                            <li><a href="https://alladinerp.com/wonderful/welcome10/Script/contact-us" data-ajax="?link1=contact-us">Contacto</a></li>
                            <li><a href="https://alladinerp.com/wonderful/welcome10/Script/terms/privacy-policy" data-ajax="?link1=terms&amp;type=privacy-policy">Política</a></li>
                            <li><a href="https://alladinerp.com/wonderful/welcome10/Script/terms/terms" data-ajax="?link1=terms&amp;type=terms">Condiciones</a></li>
                            <li><a href="https://alladinerp.com/wonderful/welcome10/Script/terms/refund" data-ajax="?link1=terms&amp;type=refund">Solicitar un reembolso</a></li>

                            <li><a href="https://alladinerp.com/wonderful/welcome10/Script/blogs" data-ajax="?link1=blogs">Blog</a></li>
                            <li><a data-ajax="?link1=developers" href="https://alladinerp.com/wonderful/welcome10/Script/developers">Developers</a></li>
                        </ul>
                        <span class="lang_selct dropup">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="currentColor" d="M17.9,17.39C17.64,16.59 16.89,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.78 4.21,10.21L9,15V16A2,2 0 0,0 11,18M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path>
                                </svg> Idioma </a>
                            <ul class="dropdown-menu dropdown-menu-right wow_lang_select_menu" style="bottom: 100%;">
                                <li class="language_select"><a href="?lang=english" rel="nofollow" class="English">English</a></li>
                                <li class="language_select"><a href="?lang=arabic" rel="nofollow" class="Arabic">Arabic</a></li>
                                <li class="language_select"><a href="?lang=dutch" rel="nofollow" class="Dutch">Dutch</a></li>
                                <li class="language_select"><a href="?lang=french" rel="nofollow" class="French">French</a></li>
                                <li class="language_select"><a href="?lang=german" rel="nofollow" class="German">German</a></li>
                                <li class="language_select"><a href="?lang=italian" rel="nofollow" class="Italian">Italian</a></li>
                                <li class="language_select"><a href="?lang=portuguese" rel="nofollow" class="Portuguese">Portuguese</a></li>
                                <li class="language_select"><a href="?lang=russian" rel="nofollow" class="Russian">Russian</a></li>
                                <li class="language_select"><a href="?lang=spanish" rel="nofollow" class="Spanish">Spanish</a></li>
                                <li class="language_select"><a href="?lang=turkish" rel="nofollow" class="Turkish">Turkish</a></li>
                            </ul>
                        </span>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </footer>
    </div>

    <!-- JS FILES -->
    <!-- recapcha -->
    <script src="<?php echo $components_path; ?>jquery/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo $components_path; ?>jquery/js/jquery.min.js"></script>
    <script src="<?php echo $components_path; ?>popper.js/js/popper.min.js"></script>
    <script src="<?php echo $components_path; ?>bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="<?php echo $components_path; ?>bootstrap/4.3.1/js/popper.min.js"></script>
    <script src="<?php echo $assets_path; ?>plugins/jquery-ui-1.12.1/jquery-ui.js"></script>
    <script src="<?php echo $assets_path; ?>plugins/alertifyjs/js/alertify.js"></script>
    <script src="<?php echo $assets_path; ?>plugins/alertifyjs/js/alertify-defaults.js"></script>
    <script src="<?php echo $assets_path; ?>plugins/animated-text/animated-text.js"></script>
    <script src="assets/javascript/swiper-bundle.min.js"></script>
    <script src="assets/javascript/login.js"></script>
    <script src="https://kit.fontawesome.com/152212a856.js"></script>
    <script src="assets/plugins/alertify/js/alertify.js"></script>
    <script>
        $(document).ready(function() {
            // console.log( "ready!" );
            // alertify.success('Success message');
            // var notification = alertify.notify('sample', 'success', 5, function() {
            //     console.log('dismissed');
            // });
            alertify.set('notifier', 'position', 'top-right');
            alertify.success('Current position : ' + alertify.get('notifier', 'position'));
        });
    </script>
</body>

</html>

