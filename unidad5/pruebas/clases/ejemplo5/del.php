<?php
include("constantes.php");
include("Superheroe.php");

$sh =  new Superheroe();
$sh->setId($_GET["id"]);
$sh->deleteEntity();

header('Location: crud.php');
?>