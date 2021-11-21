<?php
echo ('<a href="closeSession.php">Salir</a> <br>');

session_start();
if (!isset($_SESSION['tablero'])) {
    $_SESSION['tablero'] = array ();
}

DEFINE("TABLEROLENGTH", 10);

function crearTablero(){
    for ($i=0; $i < TABLEROLENGTH; $i++) { 
        for ($j=0; $j < TABLEROLENGTH; $j++) { 
            $_SESSION['tablero'][$i][$j] = 0;
        }
    }
    
};

function mostrarTablero(){
    for ($i=0; $i < TABLEROLENGTH; $i++) { 
        echo('<br>');
        for ($j=0; $j < TABLEROLENGTH; $j++) {
            echo $_SESSION['tablero'][$i][$j] = 0;
        }
    }
    
};

mostrarTablero();

//Creación aleatoria de números para colocar las minas
$rowNumber;
$columnNumber;
define('BOMBNUMBER', 10);
$cont = BOMBNUMBER;

// do {
//     $rowNumber = rand(0,9);
//     $columnNumber = rand(0,9);
    
//     //SI no está, vuelve al bucle
//     if ($_SESSION['tablero'][$rowNumber][$columnNumber] == !9) {
//         $_SESSION['tablero'][$rowNumber][$columnNumber] = 9;
//         $cont--;
//     }
// } while ($cont > 0);

do {
    $rowNumber = rand(0,9);
    $columnNumber = rand(0,9);
    
    //SI no está, vuelve al bucle
    if ($_SESSION['tablero'][$rowNumber][$columnNumber] == !9) {
        $_SESSION['tablero'][$rowNumber][$columnNumber] = 9;
        $cont--;

        //Colocamos números alrededor
        for ($i=0; $i < MAXSIZE; $i++) { 
            
        }
    }
} while ($cont > 0);

function mostrarTableroBombas(){
    for ($i=0; $i < TABLEROLENGTH; $i++) { 
        echo('<br>');
        for ($j=0; $j < TABLEROLENGTH; $j++) {
            echo $_SESSION['tablero'][$i][$j];
        }
    }
    
};
echo('<br>');
mostrarTableroBombas();
?>

