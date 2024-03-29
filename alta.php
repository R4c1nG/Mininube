<?php
include_once ("libs/bGeneral.php");
include_once ("libs/conf.php");
include_once ("libs/bFechas.php");
include_once ("libs/bFicheros.php");

$errores = [];

if(isset($_SESSION['tiempo']) ) { 
    //Tiempo en segundos para dar vida a la sesión. 
    $inactivo = 1200;//20min en este caso. 
    //Calculamos tiempo de vida inactivo. 
    $vida_session = time() - $_SESSION['tiempo']; 
    //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo. 
    if($vida_session > $inactivo) { 
    //Removemos sesión. 
    destruir();
    header("location:login.php"); } } 
    $_SESSION['tiempo'] = time();
    
if (isset($_REQUEST["login"])) {
    header("location:login.php");
    
} else if (isset($_REQUEST["insertar"])) {
    $nombreApellidos = recoge("nombre");
    $usuario = recoge("usuario");
    $fecha = recoge("fecha");
    $pass = recoge("pass");
    $nivel = recoge("nivel");

    cTexto($nombreApellidos, $errores);
    cUsuario($usuario, $errores);
    cPassword($pass, $errores);

    if (! empty($fecha)) {
        if (! vFecha($fecha)) {
            $errores[] = "Formato de fecha no válido.";
        }
    }

    if (! isset($nivel)) {
        $errores[] = "Debes seleccionar un nivel";
    }

    cExtension("imagen", $errores, $extensionesValidas);

    // Comprobamos si el usuario existe
    if (buscaUsuario($usuario, $ficheroUsuarios)) {
        $errores[] = "El usuario ya existe";
    }

    if (empty($errores)) {
        /* Creamos directorio */
        $carpetaUsuario = $documentos . $usuario . "/";
        if (! is_dir($carpetaUsuario)) {

            mkdir($carpetaUsuario);
            // Subo la imagen de perfil
            $imagen = campoImagen("imagen", $dirImagenes, $errores, $extensionesValidas, $usuario);
        } else {
            $errores[] = "El usuario ya existe";
        }
    }

    // Sino hay errores
    if (empty($errores)) {

        $hoy = new DateTime();
        $fechaFinSuscripcion = sumFecha($hoy->format("d-m-Y"), "d-m-Y", 0, $nivel, 0);
        /* Guardamos datos en el fichero de usuarios y vamos a la página de información del usuario */
        $linea = $nombreApellidos . ";" . $usuario . ";" . $pass . ";" . $fecha . ";" . $fechaFinSuscripcion . ";" . $imagen;
        if(!escribeLinea($ficheroUsuarios, $linea)){
            $errores[] = "Ha habido un problema, vuelve a intentarlo";
            require ("forms/formAlta.php");
        } else {
            header("location:login.php");
        }

    } else {
        require("forms/formAlta.php");
    }
} else {
    require ("forms/formAlta.php");
}
 
?>