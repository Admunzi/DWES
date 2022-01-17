<?php
include("constantes.php");
include("Superheroe.php");

$sh = Superheroe::getInstancia();

//INSERTO
$datos = array(
    "nombre"=>"Joaq",
    "velocidad"=>10,
);
$sh->set($datos);
$id = $sh->lastInsert();

//SELECCIONO
$datos = $sh->get($id);
foreach ($datos as $elemento){
    foreach ($elemento as $key=>$valor){
        echo "$key: $valor</br>";
    }
}
echo "<br><hr>";

//MODIFICO
$datosModificar = array(
    "nombre"=>"Manolo",
    "velocidad"=>45,
    "id"=>$id,
);
$sh->edit($datosModificar);

//SELECCIONO
$datos = $sh->get($id);
foreach ($datos as $elemento){
    foreach ($elemento as $key=>$valor){
        echo "$key: $valor</br>";
    }
}
echo "<br><hr>";

// BORRO
$sh->delete($id);

// echo $sh->mensaje;

?>