<?php
/**
*   Unidad 3 Act 1 Tarea de clase: 6/10
*   Enunciado:
*       Escribe un programa que genere e imprima 20 números 
*       aleatorios (0-100), mostrando también el
*       mayor, el menor y la media.
*
*   @author Daniel Ayala Cantador
*   @date 06/10/2021
*/

$num_min= 100;
$num_max= 0;

for ($i=0; $i < 20; $i++) { 
    $num_aleatorio= rand(0,100);

    if ($num_aleatorio > $num_max) {
        $num_max= $num_aleatorio;
    }
    if ($num_aleatorio < $num_min) {
        $num_min= $num_aleatorio;
    }

    echo("Numero: ".$num_aleatorio."<br>");
}
echo("<br>Mayor: ".$num_max."<br>");
echo("Menor: ".$num_min);

?>