<?php
/**
 * 
 * Unidad 3 Act4 Arrays
 * Enunciado:
 *       Un restaurante dispone de una carta de 3 primeros, 5 segundos y 3 postres. Almacenar información
 *       incluyendo foto y mostrar los menús disponibles. Mostrar el precio del menú suponiendo que éste se
 *       calcula sumando el precio de cada uno de los platos incluidos y con un descuento del 20 %.
 * 
 * @author Daniel Ayala Cantador
 * @date 11/10/2021
 */

$carta= array(
    "primero" => array(
        array(
            "comida" => "Bowl beef",
            "precio" => 9,
            "imagen" => "bowl-beef.jpg"
        ),
        array(
            "comida" => "Bowl salmon",
            "precio" => 12,
            "imagen" => "bowl-salmon.jpg"
        ),
        array(
            "comida" => "Nachos",
            "precio" => 8,
            "imagen" => "nachos.jpg"
        ),
    ),
    "segundo" => array(
        array(
            "comida" => "Chicken Nuggets",
            "precio" => 7,
            "imagen" => "chicken-nuggets.jpg"
        ),
        array(
            "comida" => "Chili",
            "precio" => 8.9,
            "imagen" => "chili.jpg"
        ),
        array(
            "comida" => "Ensalada Santorini",
            "precio" => 8.90,
            "imagen" => "ensalada_santorini.jpg"
        ),
        array(
            "comida" => "Ensalada Waikiki",
            "precio" => 8.90,
            "imagen" => "ensalada_waikiki.jpg"
        ),
        array(
            "comida" => "Ensalada 5 quesos",
            "precio" => 8.90,
            "imagen" => "ensalada-5.jpg"
        ),
    ),
    "postre" => array(
        array(
            "comida" => "Tarta de chocolate",
            "precio" => 4.50,
            "imagen" => "tarta_choco.jpg"
        ),
        array(
            "comida" => "Tortitas",
            "precio" => 4.50,
            "imagen" => "tortitas.jpg"
        ),
        array(
            "comida" => "Brownie",
            "precio" => 6.80,
            "imagen" => "brownie.jpg"
        ),
    ),
);

$primerplato= $carta["primero"];
$segundoplato= $carta["segundo"];
$postre= $carta["postre"];

echo("<h1>Menús. Casa Dani, tu casa y la de todos</h1>");

foreach ($primerplato as $comida1) {
    foreach ($segundoplato as $comida2) {
        foreach ($postre as $comida3) {
            echo("<img src=\"./img/".$comida1["imagen"] ." \" width=\"200\" height=\"100\">");
            echo($comida1["comida"]);
            echo("<img src=\"./img/".$comida2["imagen"] ." \" width=\"200\" height=\"100\">");
            echo($comida2["comida"]);
            echo("<img src=\"./img/".$comida3["imagen"] ." \" width=\"200\" height=\"100\">");
            echo($comida3["comida"]."  ");

            $totalmenu = $comida1["precio"]+$comida2["precio"]+$comida3["precio"];
            $totalfinal = $totalmenu - ($totalmenu *0.20);
            echo("<b>El precio total es:  ".$totalfinal." euros</b><br>");
        }
    }
}
?>