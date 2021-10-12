<?php
/**
 * 
 * Unidad 3 Act3 Arrays
 * Enunciado:
 *       Define un array que permita almacenar y mostrar la siguiente información.
 *           a. Meses del año.
 *           b. Tablero para jugar al juego de los barcos.
 *           c. Nota de los alumnos de 2º DAW para el módulo DWES.
 *           d. Verbos irregulares en inglés.
 *           e. Información sobre continentes, países, capitales y banderas.
 * 
 * @author Daniel Ayala Cantador
 * @date 10/10/2021
 */

echo <<<EOD
<style type="text/css">
table{
    margin: 8px;
}
td {
    border: 1px solid black;
    text-align: center;
    padding: 2px 6px;
    }
th {
    border: 1px solid black;
    text-align: center;
    padding: 2px 6px;
    }
    
</style>
EOD;

$info = array(
    "meses" => array ("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"),
    "barcos" => array(
        "A" => array (0,0,0,0,0,0,0,0,0,0),
        "B" => array (1,0,0,0,0,0,0,0,0,0),
        "C" => array (0,0,1,0,0,0,1,0,0,0),
        "D" => array (0,0,0,0,0,0,0,0,0,0),
        "E" => array (0,0,0,0,0,0,0,1,0,1),
        "F" => array (0,1,0,0,0,0,0,0,0,0),
        "G" => array (0,0,0,0,0,0,0,0,0,0),
        "H" => array (0,0,0,0,0,0,0,1,0,0),
        "I" => array (1,0,0,0,0,0,1,0,0,0),
        "J" => array (0,1,0,0,0,0,0,0,0,0),
    ),
    "notas" => array(
        "Jesus Díaz Rivas" => 4.9,
        "Manuel Brito Guerrero" => 2,
        "Joaquín Baena Salas" => 2,
        "Laura Hidalgo Rivera" => 1,
        "Tomas Hidalgo Martin " => 4,
        "Carlos Hidalgo Risco" => 4,
        "Daniel Ayala Cantador" => 10,
        "Javier Cebrián Muñoz" => 1,
        "Javier Fernández Rubio" => 2,
        "Rubén Ramírez Rivera" => 2,
        "David Pérez Ruiz" => 2,
        "Alejandro Rabadán Rivas" => 2,
        "David Rosas Alcatraz" => 2,
        "Guillermo Tamajon Hernandez" => 2,
        "Sergio Vera Jurado" => 4,
        "Javier Salazar Almagro" => 1,
        "Manuel Solar Bueno" => 4,
        "Andrea Solís Tejada" => 3,
        "Juan Manuel González Prófumo" => 1,
        "Rafael Yuste Barrera" => 4,
        "Javier Epifanio López" => 2,
        "Carlos Chaves Hernández" => 8,
        "Virginia Ordoño Bernier" => 8,    
    ),
    "verbos" => array(
        "surgir" => array(
            "infinitivo" => "arise",
            "pasado" => "arose",
            "participio" => "arisen"),        
        "ser" => array(
            "infinitivo" => "be",
            "pasado" => "was / were",
            "participio" => "been"),        
        "golpear" => array(
            "infinitivo" => "beat",
            "pasado" => "beat",
            "participio" => "beaten"),        
        "convertirse" => array(
            "infinitivo" => "become",
            "pasado" => "became",
            "participio" => "become"),        
        "comenzar" => array(
            "infinitivo" => "begin",
            "pasado" => "began",
            "participio" => "begun"),        
        "apostar" => array(
            "infinitivo" => "bet",
            "pasado" => "bet/betted",
            "participio" => "bet/betted"),        
        "morder" => array(
            "infinitivo" => "bite",
            "pasado" => "bit",
            "participio" => "bitten"),        
    ),
    "geografia" => array(
        "Europa" => array(
            "España" => array(
                "capital" => "Madrid",
                "bandera" => "espania.png",
            ),
            "Albania" => array(
                "capital" => "Tirana",
                "bandera" => "albania.png",
            ),            
            "Portugal" => array(
                "capital" => "Lisboa",
                "bandera" => "portugal.png",
            ),
        ),
        "America" => array(
            "Argentina" => array(
                "capital" => "Buenos Aires",
                "bandera" => "argentina.png",
            ),
            "Bahamas" => array(
                "capital" => "Nassau",
                "bandera" => "bahamas.png",
            ),
            "Brasil" => array(
                "capital" => "Brasilia",
                "bandera" => "brasil.png",
            ),
        ),
        "Asia" => array(
            "Butan" => array(
                "capital" => "Timbu",
                "bandera" => "butan.png",
            ),
            "China" => array(
                "capital" => "Pekin",
                "bandera" => "china.png",
            ),
            "Corea del sur" => array(
                "capital" => "Seul",
                "bandera" => "corea_sur.png",
            ),
        ),
        "Africa" => array(
            "Mali" => array(
                "capital" => "Bamako",
                "bandera" => "mali.png",
            ),
            "Nigeria" => array(
                "capital" => "Abuya",
                "bandera" => "nigeria.png",
            ),
            "Somalia" => array(
                "capital" => "Mogadisco",
                "bandera" => "somalia.png",
            ),
        ),
    ),
);

function mostrarArrays($info)
{
    foreach ($info as $key => $value) {
        //PINTAMOS LOS MESES
        if ($key == "meses") {
            echo("<h2>Meses</h1>");
            foreach ($info[$key] as $meses => $value) {
                echo($value. "<br>");
            }
        }

        //PINTAMOS LA TABLA DE BARCOS
        if ($key == "barcos") {
            echo("<h2>Barcos</h1>");
            echo("<table style=\"border: 1px solid black;\">");
            
            //MOSTRAMOS LA FILA PRIMERA DE 0 A 10
            echo("<tr>");
                for ($i=0; $i <= 10; $i++) { 
                    echo("<th>$i</th>");
                }
            echo("</tr>");
            
            //EMPEZAMOS A MOSTRAR EL CONTENIDO
            foreach ($info[$key] as $letras => $barco) {
                echo("<tr>");
                //MUESTRA LAS LETRAS
                    echo("<th>$letras</th>");
                //MUESTRA SI HAY BARCO O NO
                foreach ($barco as $key => $value) {
                    echo ("<td>");
                    echo ($value);
                    echo ("</td>");
                }
                echo("</tr>");


            }
            echo("</table>");
        }

        //PINTAMOS LAS NOTAS
        if ($key == "notas") {
            echo("<h2>Notas</h1>");
            echo("<table style=\"border: 1px solid black;\">");
            foreach ($value as $nombre => $nota) {
                echo("<tr>");
                    echo("<td>$nombre</td>");
                    echo("<td>$nota</td>");
                echo("</tr>");
            }
            echo("</table>");
        }

        //PINTAMOS LOS VERBOS
        if ($key == "verbos") {
            echo("<h2>Verbos</h1>");
            echo("<table style=\"border: 1px solid black;\">");
            
            //MUESTRO TABLA CON TRADUCIDO Y CONJUGADO
            foreach ($value as $traducido => $verbos) {
                echo("<tr>");
                foreach ($verbos as $key => $conjugacion) {
                    echo("<td>$conjugacion</td>");
                }
                echo("<th>$traducido</th>");

                echo("</tr>");
            }
            echo("</table>");

        }

        //PINTAMOS GEOGRAFIA
        if ($key == "geografia") {
            echo("<h2>Geografia</h1>");
            
            //MUESTRO CONTINENTES
            foreach ($value as $continente => $contenido) {
                echo("<ul>");
                    echo("<li>$continente</li>");
                    
                    //MUESTRO LOS PAISES
                    foreach ($contenido as $pais => $infoInterna) {
                        echo("<ul>");
                            echo("<li>$pais</li>");
                            
                            //MUESTRO CAPITAL Y LA BANDERA
                            foreach ($infoInterna as $key => $value) {
                                echo("<ul>");
                                    if ($key == "capital") {
                                        echo("<li>$value</li>");
                                    }else {
                                        echo("<img src=\"img/$value\" width=\"200\" height=\"100\">");
                                    }
                                    
                                echo("</ul>");
                                }
                        echo("</ul>");
                    }
                echo("</ul>");
            }
            echo("</table>");
        }
    }
}

echo("<h1>Tanda.3 Act3 </h1>");

mostrarArrays($info);

//mostarTablero($info);



?>