<?php

function cleardata($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

$name = $email = $edad = $infoAdicional = "";

$nameErr = $emailErr = $webErr = "";

$aGenero = array("Hombre", "Mujer","Sin definir");
$genderErr = "";

$aVehiculos = array("Bici","Coche","Patinete");

$aVehiculosSeleccionados = array();

