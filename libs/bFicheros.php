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
function validaLogin($usuario, $pass, $nombreFichero)
{
    if ($resultado = buscaUsuario($usuario, $nombreFichero)) {
        if ($pass === $resultado[2]) {
            $resultado = true;
        } else {
            $resultado = false;
        }
    } else {
        return false;
    }
}

/*
 * Función que recorre y muestra el contenido de un directorio Realiza una función
 * muestraDirectorio que recorre un directorio mostrando los nombre de los ficheros que contiene.
 * Devuelve false en caso de que la ruta pasada no sea un directorio
 */
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

function validaLogin($usuario, $pass, $nombreFichero)
{
    if ($resultado = buscaUsuario($usuario, $nombreFichero)) {
        if ($pass === $resultado[2]) {
            $resultado = true;
        } else {
            $resultado = false;
        }
        return $resultado;
    } else {
        return false;
    }
}

?>
