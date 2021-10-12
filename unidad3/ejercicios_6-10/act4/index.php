<?php
/**
*   Unidad 3 Act 4 Tarea de clase: 6/10
*   Enunciado:
*       Programa que lea un número entero N de 5 cifras y muestre sus cifras 
*       igual que en el ejemplo.
*       Ejemplo.
*           5
*           45
*           345
*           2345
*           12345
*
*   @author Daniel Ayala Cantador
*   @date 06/10/2021
*/

//$number= rand(10000,99999);
$number = 12345;

$divid= str_split($number);
print_r($divid);


//for ($i=0; $i < 5; $i++) {
//    $divid= str_split($number,$i);
//    echo($divid)."<br>");
//}

?>