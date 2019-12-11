<?php
session_start();

include_once ("libs/bGeneral.php");
include_once ("libs/conf.php");
include_once ("libs/bFechas.php");
include_once ("libs/bFicheros.php");
include_once ("libs/bSesiones.php");

if(isset($_SESSION['tiempo']) ) { 
    //Tiempo en segundos para dar vida a la sesión. 
    $inactivo = 900;//20min en este caso. 
    //Calculamos tiempo de vida inactivo. 
    $vida_session = time() - $_SESSION['tiempo']; 
    //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo. 
    if($vida_session > $inactivo) { 
    //Removemos sesión. 
        destruir();
        header("location:login.php"); 
    } 
} 
if (! isset($_SESSION["navegador"]) || $_SESSION["navegador"] != $_SERVER["HTTP_USER_AGENT"]) {
    destruir();
    header("location:login.php"); 
}

$_SESSION['tiempo'] = time();
$_SESSION["clicks"] = $_SESSION["clicks"] + 1;

if ($_SESSION["clicks"] >= 10) {
    $_SESSION["clicks"] = 0;
    session_regenerate_id();
}


$errores = [];
$user=$_SESSION['user'];
$ruta = $rutaCarpetaPublica."/";
    
if(isset($_REQUEST["subir"])) {
    $_SESSION["clicks"]++;
    $path = recoge("carpeta");
    if ($path != ""){
        $ruta = $rutaCarpetaPublica."/".$path."/";
    }
    if (campoFichero("publico",$ruta,$errores,$extensionesFicheros,$user)) {
        echo "Documento subido con éxito";
    } else {
        echo "Ha ocurrido un error";
    }
}
if (isset($_REQUEST["crear"])) {    
    $_SESSION["clicks"]++;
    $nCarp = recoge("nomCarp");
    $ruta = $rutaCarpetaPublica."/".$nCarp."/";
    if (crearCarpeta($ruta)){
        echo "Carpeta creada con éxito";
    }
    else {
        echo "Carpeta no creada";
    }
}
if(isset($_REQUEST["volver"])){
    $_SESSION["clicks"]++;
    header("location:user.php");
}
if(isset($_REQUEST["cerrar"])){
    destruir();
    header("location:login.php");
}

cabecera("Bienvenido");
echo "<img src=\"img_usuarios/$user\" height='50px' width='50px'>";
echo "Hola $user <br><br>";
$documentos = devuelveDirSubdir("documentos/publico");
if (!empty($documentos)){
    foreach ($documentos as $doc) {
        $nom = str_replace("documentos/publico/", "",$doc);
        echo "<br>$nom \t - \t<a href='$doc' download>Descargar</a>\t - \t<a href='$doc' target='_blank'>Ver archivo</a>";
    }
}
else {
    echo "La carpeta está vacia";
}
require ("forms/formPublico.php");


?>