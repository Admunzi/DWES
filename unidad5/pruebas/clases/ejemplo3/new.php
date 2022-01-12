<?php
include "index.php";

$db = conectaDB();

if (isset($_POST['inputValor'])) {
    $sql = "insert superheroes(nombre) values('".$_POST["inputValor"]."')";
    $db->query($sql);
    echo "Añadido";
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
        <input type="text" name="inputValor" ><input type="submit" value="Añadir">
    </form>
    <a href="crud.php">Volver</a>
</body>
</html>

