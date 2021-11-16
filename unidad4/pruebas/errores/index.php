<?php

/** 
 * Manejo de excepciones.
 * Script para mostrar el manejo de una excepción. *
 * @author dwes
 */
// Excepciones.
$fileName = "poema.txt";
try {
    if (!file_exists($fileName)) {
        throw new Exception("Fichero no encontrado");
    }
    $file = fopen("poema.txt", "r");
    while (!feof($file)) {
        echo fgets($file) . "<br/>";
    }
    fclose($file);
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}