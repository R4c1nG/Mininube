<?php

function cabecera($titulo)
{
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>
				<?php
    echo $titulo;
    ?>
			
			</title>
<meta charset="utf-8" />
</head>
<body>
<?php
}

function pie()
{
    echo "</body>
	</html>";
}

function sinTildes($frase)
{
    $no_permitidas = array(
        "á",
        "é",
        "í",
        "ó",
        "ú",
        "Á",
        "É",
        "Í",
        "Ó",
        "Ú",
        "à",
        "è",
        "ì",
        "ò",
        "ù",
        "À",
        "È",
        "Ì",
        "Ò",
        "Ù"
    );
    $permitidas = array(
        "a",
        "e",
        "i",
        "o",
        "u",
        "A",
        "E",
        "I",
        "O",
        "U",
        "a",
        "e",
        "i",
        "o",
        "u",
        "A",
        "E",
        "I",
        "O",
        "U"
    );
    $texto = str_replace($no_permitidas, $permitidas, $frase);
    return $texto;
}

function sinEspacios($frase)
{
    $texto = trim(preg_replace('/ +/', ' ', $frase));
    return $texto;
}

function recoge($var)
{
    if (isset($_REQUEST[$var]))
        $tmp = strip_tags(sinEspacios($_REQUEST[$var]));
    else
        $tmp = "";

    return $tmp;
}

function cTexto($text, &$errores)
{
    if (! preg_match("/^[A-Za-zÑñ ]{1,100}$/", sinTildes($text)))
        $errores[] = "El nombre sólo permite letras y un máximo de 100"; // Cambiada la expresión regular para que haya un máximo de 100 caracteres. Además cambio el mensaje de error para que sea dedicado al nombre completo.
    else
        return 0;
}

// Comprueba si la extensión es una extensión válida
function cExtension($nombre, &$errores, $extensionesValidas)
{
    $extension = $_FILES['imagen']['type'];
    if (! in_array($extension, $extensionesValidas)) {
        $errores[$nombre] = "La extensión del archivo no es válida<br>";
        return false;
    } else {
        return true;
    }
}

function cUsuario($text, &$errores)
{
    if (! preg_match("/^[A-Za-z0-9]{7,15}$/", $text))
        $errores[] = "El nombre de usuario debe tener sólo letras y números, sin ñ ni tildes y entre 7 y 15 caracteres"; // Cambiada la expresión regular para que haya un máximo de 100 caracteres
    else
        return 0;
}

/*
 * Valida el password teniendo en cuenta que se permiten entre 8 y 15 caracteres, se permiten letras mayúsculas y minúsculas,
 * números y los siguientes caracteres, _*\/$&#.No se permiten tildes.
 */
function cPassword($text, &$errores)
{
    if (! preg_match("/^[A-Za-z0-9_*\/$&#]{8,15}$/", $text))
        $errores[] = "El password debe tener sólo letras y números, sin ñ ni tildes, entre 8 y 15 caracteres. Se permite _*\/$&#"; // Cambiada la expresión regular para que haya un máximo de 100 caracteres
    else
        return 0;
}

function campoImagen($nombre, $dir, &$errores, $extensionesValidas, $usuario)
{
    if ($_FILES[$nombre]['error'] != 0) {
        switch ($_FILES[$nombre]['error']) {
            case 1:
                $errores[$nombre] = "Fichero demasiado grande";
                break;
            case 2:
                $errores[$nombre] = 'El fichero es demasiado grande';
                break;
            case 3:
                $errores[$nombre] = 'El fichero no se ha podido subir entero';
                break;
            case 4:
                $errores[$nombre] = 'No se ha podido subir el fichero';
                break;
            case 6:
                $errores[$nombre] = "Falta carpeta temporal";
                break;
            case 7:
                $errores[$nombre] = "No se ha podido escribir en el disco";
                break;
            default:
                $errores[$nombre] = 'Error indeterminado.';
        }
        return 0;
    } else {

        $nombreArchivo = $_FILES[$nombre]['name'];
        $directorioTemp = $_FILES[$nombre]['tmp_name'];
        $extension = $_FILES['imagen']['type'];
        if (! in_array($extension, $extensionesValidas)) {
            $errores[$nombre] = "La extensión del archivo no es válida o no se ha subido ningún archivo <br>";
            return 0;
        }

        if (! isset($errores[$nombre])) {
            $nombreArchivo = $dir . $usuario;

            if (is_dir($dir))
                if (move_uploaded_file($directorioTemp, $nombreArchivo)) {
                    return $nombreArchivo;
                } else {
                    $errores[$nombre] = "Error: No se puede mover el fichero a su destino";
                    return 0;
                }
            else
                $errores[] = "Error: No se puede mover el fichero a su destino";
        }
    }
}

?>





