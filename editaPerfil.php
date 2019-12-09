<?php
session_start();


include_once ("libs/bGeneral.php");
include_once ("libs/conf.php");
include_once ("libs/bFechas.php");
include_once ("libs/bFicheros.php");
include_once ("libs/bSesiones.php");

$errores = [];
$user=$_SESSION['user'];


if (isset($_REQUEST["editar"])) {
   if(campoImagen("imagen",  $dirImagenes, $errores, $extensionesValidas, $user)) {
       echo "Imagen cambiada con éxito.<br>";
   } else {
        require ("forms/formCambiaimg.php");
   }
}
if (isset($_REQUEST["volver"])) {
    header("location:user.php"); 
}
if (isset($_REQUEST["cerrar"])) {
    destruir();
    header("location:login.php");
}


cabecera("Bienvenido");
echo "<img src=\"img_usuarios/$user\" height='50px' width='50px'>";
echo "Hola $user";

require ("forms/formCambiaimg.php");
?>