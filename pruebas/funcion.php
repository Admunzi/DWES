<?php
/**
 * 
 * Funcion que cambia los valores de las variables
 */
function intercambia(&$x, &$y)
{
    $aux = $x;
    $x = $y;
    $y = $aux;
}

$x = 0;
$y = 10;
echo($x."<br>");
echo($y."<br>");
intercambia($x,$y);
echo($x."<br>");
echo($y."<br>");
?>