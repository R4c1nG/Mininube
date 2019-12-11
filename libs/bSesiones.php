<?php
function destruir(){
    unset($_SESSION);
    session_destroy();
}

//Comprobamos si esta definida la sesión 'tiempo'. 
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
?>