<?php
/**
* Unidad 3 Act2
* Enunciado:
*       Carga en variables mes y año e indica el número de 
*       días del mes. Utiliza la estructura de control switch
* 
* @author Daniel Ayala Cantador
* @date 29/09/2021
*/

$month= "febrero";
$year= 2020;

switch ($month) {
    case 'enero':
    case 'marzo':
    case 'mayo':
    case 'julio':
    case 'agosto':
    case 'octubre':
        echo("Hay 31 días");
        break;
    case 'abril':
    case 'junio':
    case 'septiembre':
    case 'noviembre':
        echo("Hay 30 días");
        break;
    case 'febrero':
        if ( ($year%4 == 0 && $year%100 != 0) || $year%400 == 0 ) {
            echo("Hay 29 días");
        }else {
            echo("Hay 28 días");
        }
        break;
    default:
        echo("No has introducido un valor correcto");
        break;
}
?>