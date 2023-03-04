<?php

if (!$_POST){
    echo "Login Fallo!";
    exit;
}

echo $_POST['login_email'] . "<br>";
echo $_POST['login_password'] . "<br>";
// echo $_POST['remember_device'] . "<br>";
echo $_POST['login_status'] . "<br>";
echo $_POST['timeLoged'] . "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

echo "Logueado con exito!";
