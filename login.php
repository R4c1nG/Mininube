<?php

session_start();

include_once ("libs/bGeneral.php");
include_once ("libs/conf.php");
include_once ("libs/bFechas.php");
include_once ("libs/bFicheros.php");

$errores = [];

if (isset($_REQUEST["acceder"])) {
    $usuario = recoge("usuario");
    $pass = recoge("pass");
    cPassword($pass, $errores);
    cUsuario($usuario, $errores);

    if(! empty($errores)) {
        header("location:login.php");
    } else {
        if(validaLogin($usuario, $pass, $ficheroUsuarios, $errores) ) {
            $_SESSION["user"] = $usuario;
            $_SESSION["tiempo"] = time();
            $_SESSION["navegador"] = $_SERVER['HTTP_USER_AGENT'];
            header("location:user.php");
        } else if (validaLogin($usuario, $pass, $ficheroUsuarios, $errores) == 1) {
            header("location:suscripcion.php");
        } else {
           require ("forms/formLogin.php");
        }
    }
} else if(isset($_REQUEST["registro"])){
    header("location:alta.php");
} else {
    require ("forms/formLogin.php");
}
?> 