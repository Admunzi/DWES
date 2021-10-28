<?php
/**
 * Examen 1 Practico
 * 
 * Ajedrez
 * 
 * @author Daniel Ayala Cantador
 */
?>
<link rel="stylesheet" href="css/estilos.css">
<?php

echo("<h1>Ajedrez EXAMEN 1 Daniel Ayala</h1>");
for ($i=0; $i < 8; $i++) { 
    //Hacemos las 8 columnas
    for ($k=0; $k < 8; $k++) { 
        if (($i+$k) % 2 == 0) {
            echo("<svg width=\"100\" height=\"100\"> <rect class=\"negro\" width=\"100\" height=\"100\"/> </svg>");
        }else{
            echo("<svg width=\"100\" height=\"100\"> <rect class=\"blanco\" width=\"100\" height=\"100\"/> </svg>");
        }
    }
    echo "<br>";

}

