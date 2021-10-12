<?php
/**
*   Unidad 2 Act 7
*   Enunciado:
*       Escribir un script que declare una variable y muestre la siguiente información en pantalla:*   
*
*   @author Daniel Ayala Cantador
*   @date 29/09/2021
*/

$x=8;

echo("Valor actual $x <br>");
echo("Suma 2. Valor ahora ". $x+2 ."<br>");
$x += 2;
echo("Resta 4. Valor ahora ". $x-4 ."<br>");
$x -= 4;
echo("Multiplica por 5. Valor ahora ". $x*5 ."<br>");
$x *= 5;
echo("Divide por 3. Valor ahora ". $x/3 ."<br>");
$x /= 3;
echo("Incrementa el valor en 1. Valor ahora ". ++$x ."<br>");
echo("Decrementa el valor en 1. Valor ahora ". --$x ."<br>");
echo("Final ". $x);

?>
