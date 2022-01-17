<?php
include("constantes.php");
include("Superheroe.php");

$sh = new Superheroe();

if(isset($_POST["inputNombre"])){
    $sh->setId($_GET['id']);
    $sh->setNombre($_POST["inputNombre"]);
    $sh->setVelocidad($_POST["inputVelocidad"]);

    $sh->editEntity();
    echo "Cambiado";
}

//Para que muestre los valores del seleccionado
$sh->setId($_GET['id']);
$datos = $sh->getEntity();

$nombre = $datos[0]["nombre"];
$velocidad = $datos[0]["velocidad"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>CRUD Editar</h1>
    <form action="" method="POST">
    <label>Nombre <input type="text" name="inputNombre" value="<?php echo $nombre?>"></label>
    <label>Velocidad <input type="text" name="inputVelocidad" value="<?php echo $velocidad?>"></label>
    <input type="submit" value="Cambiar datos">
    </form>
    <a href="crud.php">Volver</a>

</body>
</html>

