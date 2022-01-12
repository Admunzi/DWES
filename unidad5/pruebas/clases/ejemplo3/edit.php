<?php
include "index.php";

$db = conectaDB();

if(isset($_POST["inputNombre"])){
    $sql = "UPDATE superheroes SET nombre=:nombre, velocidad=:velocidad, updated_at=CURRENT_TIMESTAMP  WHERE id=:id";
    $consulta = $db->prepare($sql);
    $aParametros = array(":nombre"=>$_POST["inputNombre"],":velocidad"=>$_POST["inputVelocidad"],":id"=>$_GET['id']);
    $consulta->execute($aParametros);
    echo "Cambiado";
}

//Para que muestre los valores del seleccionado
$sql = "SELECT nombre,velocidad FROM superheroes WHERE id = :id";
$consulta = $db->prepare($sql);
$aParametros = array(":id"=>$_GET['id']);
$consulta->execute($aParametros);
$resultado = $consulta->fetchAll();

if(!$resultado){
    echo ("Consulta vacía");
}else{
    $nombre = $resultado[0]["nombre"];
    $velocidad = $resultado[0]["velocidad"];
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
    <h1>CRUD Editar</h1>
    <form action="" method="POST">
    <label>Nombre <input type="text" name="inputNombre" value="<?php echo $nombre?>"></label>
    <label>Velocidad <input type="text" name="inputVelocidad" value="<?php echo $velocidad?>"></label>
    <input type="submit" value="Cambiar datos">
    </form>
    <a href="crud.php">Volver</a>

</body>
</html>

