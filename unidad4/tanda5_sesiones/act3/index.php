<?php

session_start();
echo("<link rel=\"stylesheet\" href=\"css/estilos.css\">");
echo("<link rel=\"stylesheet\" href=\"css/normalize.css\">");

define('TAMNANIOTABLERO', 10);
define('NUMMINAS', 10);

if (!isset($_SESSION['tablero'])) {
    $_SESSION['tablero'] = array();
    $_SESSION['aVisible'] = array();
    $_SESSION['aFlags'] = array();

    crearTablero();
    ponerMinas();
    crearVisible();
    crearFlags();
}

$desactivate = 0;
if (isset($_GET['desactivar'])) {
    $desactivate = 1;
}

function crearFlags(){
    for ($i=0; $i < TAMNANIOTABLERO; $i++) { 
        for ($j=0; $j < TAMNANIOTABLERO; $j++) {
            $_SESSION['aFlags'][$i][$j] = 0 ;
        }
    }
}

$result = "";

function clickCampo($row,$col){
    //Si la casilla esta oculta
    if ($_SESSION['aVisible'][$row][$col] == 0) {

        //La ponemos visible
        $_SESSION['aVisible'][$row][$col] = 1;
        //Si es mina se termina lo recursivo
        if ($_SESSION['tablero'][$row][$col]==9) {
            //Pierdes
            return 1;
        }else{
            //Aquí entra si no es una mina, osea todo lo demás
            if (comprobarGanador()) {
                //Ganas
                return 2;
            }else{
                if ($_SESSION['tablero'][$row][$col] == 0) {
                    // //Recorremos de arriba izq a abajo derech
                    for ($irow = max($row - 1, 0); $irow <= min($row + 1, 9); $irow++) {
                        for ($jcol = max($col - 1, 0); $jcol <= min($col + 1, 9); $jcol++) {
                            clickCampo($irow,$jcol);
                        }
                    }
                }
            }
        }
    }
}

function crearTablero(){
    for ($i=0; $i < TAMNANIOTABLERO; $i++) { 
        for ($j=0; $j < TAMNANIOTABLERO; $j++) {
            $_SESSION['tablero'][$i][$j] = 0 ;
        }
    }
}
function ponerMinas(){
    for ($m=0; $m <= NUMMINAS; $m++) {
        do {
            $row = rand(0,TAMNANIOTABLERO-1);
            $col = rand(0,TAMNANIOTABLERO-1);
        } while ($_SESSION['tablero'][$row][$col] = 0);
        $_SESSION['tablero'][$row][$col] = 9;

        for ($i = max($row - 1, 0); $i <= min($row + 1, 9); $i++) {
            for ($j = max($col - 1, 0); $j <= min($col + 1, 9); $j++) {
                if ($_SESSION['tablero'][$i][$j] != 9) {
                    $_SESSION['tablero'][$i][$j]++;
                }
            }
        }
    }
}

function mostrarTablero(){
    for ($i=0; $i < TAMNANIOTABLERO; $i++) {
        for ($j=0; $j < TAMNANIOTABLERO; $j++) {
            echo ("<a href=\"index.php?x=$i&y=$j\">".$_SESSION['tablero'][$i][$j]." </a>");
        }
        echo ("<br>");
    }
}

function mostrarTableroVisible($desactivate){
    echo("<table>");
    for ($i=0; $i < TAMNANIOTABLERO; $i++) {
        echo("<tr>");
        for ($j=0; $j < TAMNANIOTABLERO; $j++) {
            //Si hay una bandera lo maracamos
            if ($_SESSION['aFlags'][$i][$j] == 1) {
                echo ("<td><img src=\"img/bandera.jpg\"></td>");
            }else{
                //Si está visible ponemos lo que vale
                if ($_SESSION['aVisible'][$i][$j] == 1) {
                    //Si es 0 ponemos "*" para diferenciarlos
                    if ($_SESSION['tablero'][$i][$j] == 0) {
                        echo ("<td>*</td>");
                    }elseif ($_SESSION['tablero'][$i][$j] == 9) {
                        echo ("<td><img src=\"img/mina.png\"></td>");
                    }else{
                        echo ("<td>".$_SESSION['tablero'][$i][$j]."</td>");
                    }
                }else{
                    echo ("<td><a href=\"index.php?x=$i&y=$j&des=$desactivate\">&nbsp;</a></td>");
                }
            }
        }
        echo("</tr>");
        }
    echo("</table>");
}

function crearVisible(){
    for ($i=0; $i < TAMNANIOTABLERO; $i++) { 
        for ($j=0; $j < TAMNANIOTABLERO; $j++) {
            $_SESSION['aVisible'][$i][$j] = 0 ;
        }
    }
}

function comprobarVisibles(){
    $contador = 0;
    for ($i=0; $i < TAMNANIOTABLERO; $i++) { 
        for ($j=0; $j < TAMNANIOTABLERO; $j++) {
            if ($_SESSION['aVisible'][$i][$j] == 1) {
                $contador++;
            }
        }
    }
    return $contador;
}

function comprobarGanador(){
    if (comprobarVisibles() == ((TAMNANIOTABLERO**2) - NUMMINAS)) {
        //Ganas
        return true;
    }else {
        //Aun no has ganado
        return false;
    }
}

// var_dump($_SESSION['aFlags']);

echo("<div class=\"principal\">");

    //Aquí entra cuando le hemos dado click
    if (isset($_GET['x'])) {
        $row = $_GET['x'];
        $col = $_GET['y'];
        if ($_GET['des'] == 0) {
            $result = clickCampo($row,$col,$desactivate);
        }else{
            $_SESSION['aFlags'][$row][$col] = 1;
        }

        if ($result == 1) {
            echo("<h1 class=\"titulo\" >Has perdido</h1>");
        }
        if ($result == 2) {
            echo ("<h1 class=\"titulo\">Has ganado</h1>");
        }
    }

    // mostrarTablero();

    echo("<div class=\"tablero\">");
        mostrarTableroVisible($desactivate);
        echo("<a class=\"botn\" href=\"cierra_sesion.php\">Borrar sesion</a>");

        echo("<form action=\"\" method=\"get\">");
            echo("<input type=\"submit\" name=\"desactivar\" value=\"Desactivate\">");
        echo("</form>");
    echo("</div>");

echo("</div>");
