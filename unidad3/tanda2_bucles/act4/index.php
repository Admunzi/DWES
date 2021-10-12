<?php
/**
*   Unidad 3 Act4 Bucles
*   Enunciado:
*       Mostrar paleta de colores. Utilizar una tabla que muestre el color y el valor hexadecimal que le
*       corresponde. Cada celda será un enlace a una página que mostrará un fondo de pantalla con el color
*       seleccionado. ¿Puedes hacerlo con los conocimientos que tienes?
*
*   @author Daniel Ayala Cantador
*   @date 04/10/2021
*/

//Iniciamos tabla
echo("<table style=\"border: 1px solid black; width: 100%; height: 60%;\">");

//Bucles para los colores, imprime lineas
echo("<tr>");

$red = 0;
$green = 0;
$blue = 0;    

for ($i = 0; $i <= 10 ; $i ++) { 
    echo("<tr>"); 
    echo("<td style=\"background-color:". sprintf("#%02X%02X%02X", $red , $green , $blue) ." ;border: 1px solid black; \">");
    echo("<a href=\"destino.php?color=" . sprintf("%02X%02X%02X", $red , $green , $blue) . "\" style = \"text-decoration:none; color:white\">" . sprintf("#%02X%02X%02X", $red , $green , $blue) . "<a/>");
    echo("</td>");

    $red += 2;
    $green += 7;
    $blue += 7;
    for ($x = 0; $x <= 10 ; $x ++) { 
        echo("<td style=\"background-color:". sprintf("#%02X%02X%02X", $red , $green , $blue) ." ;border: 1px solid black; \">");
        echo("<a href=\"destino.php?color=" . sprintf("%02X%02X%02X", $red , $green , $blue) . "\" style = \"text-decoration:none; color:white\">" . sprintf("#%02X%02X%02X", $red , $green , $blue) . "<a/>");
        echo("</td>");
        
        $red += 1;
        $green += 1;
        $blue += 1;
        }
}

echo("</tr>");
echo("</table>");
?>