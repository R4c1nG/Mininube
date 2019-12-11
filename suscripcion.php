<!-- Pagina para ampliar los meses de suscripción -->
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
$_SESSION["clicks"]++;

if ($_SESSION["clicks"] >= 10) {
    $_SESSION["clicks"] = 0;
    session_regenerate_id();
}

$errores = [];
$user=$_SESSION['user'];


?>