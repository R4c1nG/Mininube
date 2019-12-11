<?php

/*
 * Función que le pasamos la ruta del fichero donde queremos escribir y la cadena que queremos añadir.
 * Escribirá al final del fichero.
 */
function escribeLinea($nombreFichero, $linea)
{
    if ($fichero = fopen($nombreFichero, "a")) {
        $fechaActual = new DateTime('now');
        if (fwrite($fichero, $linea . ';' . $fechaActual->format("d-m-Y") . PHP_EOL)) {
            fclose($fichero);
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

/*
 * Busca un usuario en un fichero
 * Cada usuario está en una línea con el siguiente formato
 * nombreConApellido;usuario;password;fechaAlta;fechaFinSuscripcion;rutaImagenPerfil
 *
 */
function buscaUsuario($usuario, $nombreFichero)
{
    if ($fichero = fopen($nombreFichero, "r")) {
        $resultado = [];

        // Recorrer fichero hasta que llegue al final de este
        while (! feof($fichero)) {
            if ($datos = fgets($fichero)) {
                $datos = explode(";", $datos);
                if ($usuario == $datos[1]) {
                    $resultado = $datos;
                }
            }
        }
        fclose($fichero);
        return $resultado ? $resultado : false;
    } else {
        return false;
    }
}

// Dado un usuario y su contraseña comprueba si es lo tenemos en nuestro fichero
function validaLogin($usuario, $pass, $nombreFichero, &$errores)
{
    if ($resultado = buscaUsuario($usuario, $nombreFichero)) {
        if ($pass === $resultado[2]) {
            $hoy = (new DateTime()) -> format("d-m-Y");
            if ($hoy < $resultado[4]) {
                return true;
            } else {
                $errores[] = "Necesitas ampliar tu suscripción para acceder";
                return 1;
            }
        } else {
            $errores[] = "La contraseña es incorrecta";
            return 0;
        }
    } else {
        $errores[] = "El usuario no existe";
        return 0;
    }
}

/*
 * Función que recorre y muestra el contenido de un directorio Realiza una función
 * muestraDirectorio que recorre un directorio mostrando los nombre de los ficheros que contiene.
 * Devuelve false en caso de que la ruta pasada no sea un directorio
 */

//devuelve ficheros de las carpetas
function devuelveDir($path)
{
    if (is_dir($path)) {
        $arbol = [];
        $dir = opendir($path);
        while ($elemento = readdir($dir)) {
            if (is_file($path.$elemento)) {
                $arbol[] = $elemento;
            }
        }
        closedir($dir);
        return $arbol;
    } else {
        return false;
    }
}

//devuelve carpetas
function devuelveCarpetas($path)
{
    if (is_dir($path)) {
        $arbol = [];
        $dir = opendir($path);
        while ($elemento = readdir($dir)) {
            if (is_dir($path.$elemento) && $elemento != "." && $elemento != "..") {
                $arbol[] = $elemento;
            }
        }
        closedir($dir);
        return $arbol;
    } else {
        return false;
    }
}


function devuelveDirSubdir($dir) {
    if(is_dir($dir)) {
        $directorio = opendir($dir);
        $arbol = [];
        while($elemento = readdir($directorio)) {
            if($elemento != "." && $elemento != "..") {
                if (is_dir("$dir/$elemento")) {
                    $arbol = array_merge($arbol, devuelveDirSubdir("$dir/$elemento"));
                } else {
                    $arbol[] = "$dir/$elemento";
                }
            }
        }
        
        closedir($directorio);
        return $arbol;
           } else {
        return false;
    }
}

//Crear ficheros si no existen (..IN PROGRESS needs fixing and stuff)
function creaFichero($nombre, $ruta, $contenido){
    (file_put_contents($nombre, $ruta, $contenido) !== false) ? true : false;
}

//Crear carpetas si no existen
function crearCarpeta($ruta){
    if (!is_dir(($ruta))){
        mkdir($ruta);
        return true;
    }
    else {
        return false;
    }
}

//Borrar carpetas si existen
function borrarCarpeta($carpeta) {
    foreach(glob($carpeta . "/*") as $archivos_carpeta){             
        if (is_dir($archivos_carpeta)){
            if($archivos_carpeta != "." && $archivos_carpeta != "..") {
                borrarCarpeta($archivos_carpeta);
            }
        } else {
        unlink($archivos_carpeta);
        }
      }
      rmdir($carpeta);
}


?>