<?php
include("constantes.php");
include("Superheroe.php");

//INSERTO
$sh =  new Superheroe();
$sh->setNombre('Invisible Woman');
$sh->setVelocidad('2');

$sh->setEntity();
$id = $sh->lastInsert();
$sh->setId($id);

//SELECCIONO
$sh->setId($id);
$datos = $sh->getEntity();
foreach ($datos as $elemento){
    foreach ($elemento as $key=>$valor){
        echo "$key: $valor</br>";
    }
}
echo "<br><hr>";

//MODIFICO
$sh->setNombre('Invisible Men');
$sh->setVelocidad('10');
$sh->setId($id);
$sh->editEntity();

//SELECCIONO
$sh->setId($id);
$datos = $sh->getEntity();
foreach ($datos as $elemento){
    foreach ($elemento as $key=>$valor){
        echo "$key: $valor</br>";
    }
}
echo "<br><hr>";

// BORRO
$sh->setId($id);
$sh->deleteEntity();

?>