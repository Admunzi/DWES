<?php
/**
* Unidad 2 Act 3
* Enunciado:
*     Script que, a partir del radio almacenado en una variable 
*     y la definición de la constante PI, calcule el área del 
*     círculo y la longitud de la circunferencia. 
*     El debe mostrar valor de radio, longitud de la 
*     circunferencia, área del círculo y dibujará un círculo 
*     utilizando gráficos vectoriales.
* 
* @author Daniel Ayala Cantador
* @date 29/09/2021
*/

$radio = 40;
    echo("Radio: $radio <br>");
    echo("Longitud circunferencia: ".$radio * 2 * pi()."<br>");
    echo("Area: ".$radio * pi())."<br>";

    echo("<svg width=\".$radio *2. \" height=\".$radio *2. \" >");
        echo("<circle cx=\"50\" cy=\"50\" r=\"$radio\" />");
    echo("</svg>");

?>
