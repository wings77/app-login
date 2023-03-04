<?php
#############################################
# index.php
# index de version, redirecciona a index root
# 12/09/2020
# juan carlos c
# Valparaiso
#############################################

require_once("config.php");

$msg = filter_input(INPUT_GET, 'msg', FILTER_SANITIZE_STRING);
if ($_SERVER['SERVER_ADDR'] != "::1") {                                                     //  ENVIRONMENT production 
  $url = "../index.php?msg=";
} else {
  $url = "../index.php?msg=";
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Alladin...</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta HTTP-EQUIV="REFRESH" CONTENT="0;URL=<?php echo $url . $msg; ?>">
</head>

<body onload="myFunction()" style="margin:0;">
  <!-- Redireccionando al inicio de Alladin... -->
</body>

</html>