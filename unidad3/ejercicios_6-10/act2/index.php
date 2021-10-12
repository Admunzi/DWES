<?php
/**
*   Unidad 3 Act 2 Tarea de clase: 6/10
*   Enunciado:
*       Escribe un programa que genere e imprima un número 
*       aleatorio de 4 cifras, mostrando a continuación cada 
*       una de sus cifras en un color diferente.
*       Por ejemplo:
*
*   @author Daniel Ayala Cantador
*   @date 06/10/2021
*/

$total= "";

for ($i=0; $i < 4; $i++) { 
    $num= rand(0,9);
    $total = $total.$num;

    //Generamos un color aleatorio
    $r = mt_rand( 128, 255 );
    $g = mt_rand( 128, 255 );
    $b = mt_rand( 128, 255 );

    $bgcolor = 'rgba('.$r.','.$g.','.$b.')';
    echo("<p style=\"color:".$bgcolor.";\">".$num."</p>");
}
echo($total);
?>