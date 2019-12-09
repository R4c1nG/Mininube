<?php
session_start();


include_once ("libs/bGeneral.php");
include_once ("libs/conf.php");
include_once ("libs/bFechas.php");
include_once ("libs/bFicheros.php");
include_once ("libs/bSesiones.php");

$errores = [];
$user=$_SESSION['user'];


if(isset($_REQUEST["subir"])) {
 //subirfichero();
}

if (isset($_REQUEST["crear"])) {    
    $nCarp = recoge("nCarp");
    $ruta = $rutaCarpetaPublica."/".$nomCarp."/";
    if (crearCarpeta($ruta)){
        echo "Carpeta creada con éxito";
    }
    else {
        echo "Carpeta no creada";
    }
}
if(isset($_REQUEST["volver"])){
    header("location:user.php");
}
if(isset($_REQUEST["cerrar"])){
    destruir();
    header("location:login.php");
}

cabecera("Bienvenido");
echo "<img src=\"img_usuarios/$user\" height='50px' width='50px'>";
echo "Hola $user";
$documentos = devuelveDirSubdir("documentos/$user");
foreach ($documentos as $doc) {
    $nom = str_replace("documentos/$user/", "",$doc);
    echo "<br>$nom \t - \t<a href='$doc' download>Descargar</a>\t - \t<a href='$doc'>Ver archivo</a>";
}
require ("forms/formPrivado.php");
?>