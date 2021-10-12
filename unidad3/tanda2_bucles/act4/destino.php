<?php
/*
*   Unidad 3 Act4 Bucles
*   Enunciado:
*       Mostrar paleta de colores. Utilizar una tabla que muestre el color y el valor hexadecimal que le
*       corresponde. Cada celda será un enlace a una página que mostrará un fondo de pantalla con el color
*       seleccionado. ¿Puedes hacerlo con los conocimientos que tienes?
*
*   @author Daniel Ayala Cantador
*   @date 09/10/2021
*/

echo("<body bgcolor=\"". $_GET["color"] ."\"></body>");
echo("<div style=\"text-align: center; color:white;\">");
    echo("<h1>Estás en una pagina de color</h1>");
    echo("<a href= \"index.php\">Volver</a>");
echo("</div>");
?>