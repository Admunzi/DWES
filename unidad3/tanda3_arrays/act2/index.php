<?php
/**
* Unidad 3 Act2 Arrays
* Enunciado:
*     Crear un array con los alumnos de clase y permitir la selección aleatoria de uno de ellos. El resultado
*     debe mostrar nombre y fotografía.
* 
* @author Daniel Ayala Cantador
* @date 10/10/2021
*/

echo <<<EOD
<style type="text/css">
.center {
    background:linear-gradient(30deg, crimson,sienna, royalblue, indianred, purple);
    text-align: center;
    margin: auto;
    width: 60%;
    border: 3px solid black;
    padding: 20px;
    margin-top: 100px;
}
</style>
EOD;


$clase = array(
    "Jesus Díaz Rivas" => "JesusDiazRivas.jpg",
    "Manuel Brito Guerrero" => "ManuelBrito.jpg",
    "Joaquín Baena Salas" => "JoaquinBaenaSalas.jpg",
    "Laura Hidalgo Rivera" => "LauraHidalgoRivera.jpg",
    "Tomas Hidalgo Martin " => "TomasHidalgoMartin.jpg",
    "Carlos Hidalgo Risco" => "CarlosHidalgoRisco.PNG",
    "Daniel Ayala Cantador" => "DanielAyalaCantador.png",
    "Javier Cebrián Muñoz" => "javierCebrianMuñoz.jpeg",
    "Javier Fernández Rubio" => "javierfernandezrubio.jpeg",
    "Rubén Ramírez Rivera" => "RubenRamirezRivera.jpeg",
    "David Pérez Ruiz" => "DavidPerezRuiz.png",
    "Alejandro Rabadán Rivas" => "AlejandroRabadanRivas.jpg",
    "David Rosas Alcatraz" => "DavidRosasAlcaraz.jpg",
    "Guillermo Tamajon Hernandez" => "GuillermoTamajonHernandez.jpg",
    "Sergio Vera Jurado" => "sergiovera.png",
    "Javier Salazar Almagro" => "JavierSalazarAlmagro.jpg",
    "Manuel Solar Bueno" => "ManuelSolarBueno.jpg",
    "Andrea Solís Tejada" => "AndreaSolisTejada.jpeg",
    "Juan Manuel González Prófumo" => "JuanManuelGonzalezProfumo.jpg",
    "Rafael Yuste Barrera" => "RafaelYuste.png",
    "Javier Epifanio López" => "JavierEpifanioLópez.jpeg",
    "Carlos Chaves Hernández" => "CarlosChaves.jpg",
    "Virginia Ordoño Bernier" => "VirginiaOrdoño.jpg",
);

$aleatorio = rand(1,count($clase));
$contador = 1;

echo("<div class=\"center\">");
foreach ($clase as $x => $x_value) {
    if ($contador == $aleatorio) {
        echo("<h1>$x</h1>");
        echo("<img src=\"img/$x_value\" height=50%>");
    }
    $contador++;
}
echo("</div>");

?>