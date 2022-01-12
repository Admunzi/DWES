<?php
include("constantes.php");
include("Superheroe.php");

//INSERTO
$datos = array(
    "nombre"=>"Joaq",
    "velocidad"=>10,
);

$sh = Superheroe::getInstancia();
$sh->set($datos);
$id = $sh->lastInsert();


//MODIFICO
$datosModificar = array(
    "nombre"=>"Manolo",
    "velocidad"=>45,
    "id"=>$id,
);

$sh = Superheroe::getInstancia();
$sh->edit($datosModificar);

// //BORRO
// $datosBorrar = array(
//     "id"=>$id,
// );

// $sh = Superheroe::getInstancia();
// $sh->delete($datosBorrar);

// //SELECCIONO
// $sh = Superheroe::getInstancia();
// $sh->get();


?>