<?php

// Función para validar fecha en cualquier formato y devolverla en cualquier formato dado o false en caso de no ser válida la fecha
function vFecha($fecha,$formatoEntrada = "d-m-Y",$formatoSalida = "d-m-Y")
{
    
    $objetoFecha = DateTime::createFromFormat($formatoEntrada,$fecha);
    
    //Si la ha podido crear y además concuerda con la fecha dada devolverla en el formato dado o por defecto
    if($objetoFecha && ($objetoFecha->format($formatoEntrada) == $fecha)){
        return $objetoFecha->format($formatoSalida);
    }else{
        return false;
    }
}

//Función que valida una echa y añade a el número de 'P'.$años.'Y'.$meses.'M'.$dias.'D', meses y años que le pasamos como parámetro
function sumFecha($fecha,$formato = "d-m-Y",$dias = 0,$meses = 1 ,$años = 0)
{
    $miFecha = vFecha($fecha,$formato,$formato);
    if($miFecha){
        $miFecha = DateTime::createFromFormat($formato,$miFecha);
        $intervalo='P'.$años.'Y'.$meses.'M'.$dias.'D';
        $miFecha->add(new DateInterval($intervalo));
        return $miFecha->format($formato);
    }else{
        return false;
    }
}


?>