<?php
/**
* Unidad 3 Act2 Bucles
* Enunciado:
*     Sumar los 3 primeros numeros pares
* 
* @author Daniel Ayala Cantador
* @date 04/10/2021
*/

$total = 0;
$contador = 0;

for ($i=1; $contador < 3 ; $i++) { 
    if (($i % 2) == 0 ) {
        $total += $i;
        $contador++;
    }
}
echo($total);

?>