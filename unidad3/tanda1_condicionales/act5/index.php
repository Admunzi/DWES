<?php
/**
*   Unidad 3 Act5
*   Enunciado:
*       Script que muestre una lista de enlaces en función del perfil de usuario:
*       Perfil Administrador: Pagina1, Pagina2, Pagina3, Pagina4
*       Perfil Usuario: Pagina1, Pagina2
* 
*   @author Daniel Ayala Cantador
*   @date 09/10/2021
*/

$perfil= "usuario";

if ($perfil == "admin") {
    echo("<h1>Perfil Administrador </h1>");
    for ($i=1; $i < 5; $i++) { 
        echo("<a href=\"#\">Pagina". $i ."</a> <br>");
    }
}elseif ($perfil == "usuario") {
    echo("<h1>Perfil Usuario </h1>");
    for ($i=1; $i <= 2; $i++) { 
        echo("<a href=\"#\">Pagina". $i ."</a> <br>");
    }
}

?>