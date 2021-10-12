<?php
/**
* Unidad 3 Act1
* Enunciado:
*     Almacena tres números en variables y escribirlos 
*     en pantalla de manera ordenada.
* 
* @author Daniel Ayala Cantador
* @date 29/09/2021
*/

$a = 6;
$b = 6;
$c = 3;

if (($a >= $b) && ($b > $c))  {
    echo("Orden, $a, $b, $c");
}
elseif (($a > $b) && ($c > $b)) {
    echo("Orden, $a, $c, $b");
}
elseif (($b > $a) && ($a > $c)) {
    echo("Orden, $b, $a, $b");
}
elseif (($b > $a) && ($c > $a)) {
    echo("Orden, $b, $c, $a");
}
elseif (($c > $a) && ($a > $b)) {
    echo("Orden, $c, $a, $b");
}
elseif (($c > $a) && ($b > $a)) {
    echo("Orden, $c, $b, $a");
}

// IGUALES
if (($a == $b) && ($b == $c)) {
    echo("Son iguales, $a, $b y $c");
}

?>