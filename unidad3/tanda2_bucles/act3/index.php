<?php
/**
* Unidad 3 Act3 Bucles
* Enunciado:
*     Tablas de multiplicar del 1 al 10. 
*     Aplicar estilos en filas/columnas
* 
* @author Daniel Ayala Cantador
* @date 04/10/2021
*/

$base = 1;
$estilo = 911;

echo("<table style=\"border: 1px solid black;\">");
    echo("<tr>");
        echo("<th colspan=\"2\">TABLAS DE MULTIPLICAR</th>");
    echo("</tr>");
    for ($i=1; $i <= 10; $i++) { 
        echo("<tr style=\"background-color: #$estilo;\">");
        for ($h=1; $h <= 10; $h++) { 
            echo("<td style=\"border: 1px solid black; background-color: #$estilo;\"> $i*$h = ". $i*$h ." </td>");
        }
        echo("</tr>");
        $estilo += 222;
    }

echo("</table>");
?>