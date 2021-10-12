<?php
/**
*   Unidad 2 Act 9
*   Enunciado:
*       Escribir un script que utilizando variables permita obtener el siguiente resultado:
*           Valor es string.
*           Valor es double.
*           Valor es boolean.
*           Valor es integer.
*           Valor is NULL.
*       
*   @author Daniel Ayala Cantador
*   @date 29/09/2021
*/

$valor= "hola";
echo("Valor es " . gettype($valor) . "<br>");

$valor= 2.4;
echo("Valor es " . gettype($valor) . "<br>");

$valor= true;
echo("Valor es " . gettype($valor) . "<br>");

$valor= 4;
echo("Valor es " . gettype($valor) . "<br>");

$valor= NULL;
echo("Valor es " . gettype($valor) . "<br>");

?>
