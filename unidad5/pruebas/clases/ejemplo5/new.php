<?php
include("constantes.php");
include("Superheroe.php");

if (isset($_POST['inputNombre'])) {
    $sh = new Superheroe();
    $sh->setNombre($_POST["inputNombre"]);
    $sh->setVelocidad($_POST["inputVelocidad"]);

    $sh->setEntity();
    // echo $sh->getMensaje();
}

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
    <h1>CRUD Nuevo</h1>
    <form action="" method="POST">
        <input type="text" name="inputNombre" placeholder="Nombre">
        <input type="text" name="inputVelocidad" placeholder="Velocidad">
        <input type="submit" value="Añadir">
    </form>
    <a href="crud.php">Volver</a>
</body>
</html>

