<?php
session_start();


include_once ("libs/bGeneral.php");
include_once ("libs/conf.php");
include_once ("libs/bFechas.php");
include_once ("libs/bFicheros.php");
include_once ("libs/bSesiones.php");

$errores = [];
$user=$_SESSION['user'];

cabecera("Bienvenido");
echo "<img src=\"img_usuarios/$user\" height='50px' width='50px'>";
echo "Hola $user";
require("forms/formUser.php");

if(isset($_REQUEST["publico"])) {

}
if(isset($_REQUEST["privado"])){

}
if(isset($_REQUEST["cambia"])){
    header("location:editaPerfil.php");
}
if(isset($_REQUEST["cerrar"])){
    destruir();
    header("location:login.php");
}


?>