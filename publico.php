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
$documentos = devuelveDirSubdir("documentos/publico");
foreach ($documentos as $doc) {
    $nom = str_replace("documentos/publico/", "",$doc);
    echo "<br>$nom \t - \t<a href='$doc' download>Descargar</a>\t - \t<a href='$doc'>Ver archivo</a>";
}
require ("forms/formPublico.php");
$nCarp = recoge("nCarp");
$ruta = $rutaCarpetaPublica."/".$user."/".$nCarp;

if(isset($_REQUEST["subir"])) {

}
if (isset($_REQUEST["crear"])) {
    if (crearCarpeta($ruta)){
        echo "Carpeta creada con éxito";
    }
    else {
        echo "Carpeta no creada";
    }
}
if (isset($_REQUEST["borrar"])) {
    if (borrarCarpeta($ruta)){
        echo "Carpeta borrada con éxito";
    }
    else {
        echo "Carpeta no borrada (llena)";
    }
}
if(isset($_REQUEST["volver"])){
    header("location:user.php");
}
if(isset($_REQUEST["cerrar"])){
    destruir();
    header("location:login.php");
}

?>