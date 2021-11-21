<?php

session_start();
echo("<link rel=\"stylesheet\" href=\"css/estilos.css\">");

define('TAMNANIOTABLERO', 10);
define('NUMMINAS', 10);

if (!isset($_SESSION['tablero'])) {
    $_SESSION['tablero'] = array();
    $_SESSION['aVisible'] = array();

    crearTablero();
    ponerMinas();
    crearVisible();
}

if (isset($_GET['x'])) {
    $row = $_GET['x'];
    $col = $_GET['y'];
    clickCampo($row,$col);
}

function clickCampo($row,$col){
    //Si la casilla esta oculta
    if ($_SESSION['aVisible'][$row][$col] == 0) {
        //La ponemos visible
        $_SESSION['aVisible'][$row][$col] = 1;
        //Si es mina se termina lo recursivo
        if ($_SESSION['tablero'][$row][$col]==9) {
            return 0;
        }else{
            //Aquí entra si no es una mina, osea todo lo demás
            if (comprobarGanador()) {
                return 1;
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

function mostrarTableroVisible(){
    for ($i=0; $i < TAMNANIOTABLERO; $i++) { 
        for ($j=0; $j < TAMNANIOTABLERO; $j++) {
            echo ("<a href=\"index.php?x=$i&y=$j\">".$_SESSION['aVisible'][$i][$j]." </a>");
        }
        echo ("<br>");
    }
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
        return true;
    }else {
        return false;
    }
}

echo("<div>");
mostrarTablero();

?>
<a class="botn" href="cierra_sesion.php">Borrar sesion</a>
</div>
<?php
echo("<br><br>");
// var_dump($_SESSION['aVisible']);
mostrarTableroVisible();

