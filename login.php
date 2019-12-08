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
        require ("forms/formLogin.php");
    } else {
        if( validaLogin($usuario, $pass) ) {
            $_SESSION["user"] = $usuario;
            header("location:user.php");
        } else {
            require ("forms/formLogin.php");
        }
    }
} else if(isset($_REQUEST["registro"])){
    require ("forms/formAlta.php");
} else {
    require ("forms/formLogin.php");
}
?> 