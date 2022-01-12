<?php
include "index.php";
?>
<h1>CRUD</h1>
<form action="" method="POST">
    <input type="text" name="inputValor" ><input type="submit" value="Buscar"> <a href=new.php>Nuevo</a>
</form>


<?php
$db = conectaDB();
if (isset($_POST['inputValor'])) {
    //Si se busca algo
    $sql = "SELECT * FROM superheroes WHERE nombre LIKE CONCAT('%',:nombre,'%')";
    $consulta = $db->prepare($sql);
    $aParametros = array(":nombre"=>$_POST['inputValor']);
    $consulta->execute($aParametros);
    $resultado = $consulta->fetchAll();
    $numeroRegistros = $consulta->rowCount();
    
    echo ("Listado de Superhéroes:$numeroRegistros<br>");
    if(!$resultado){
        echo ("Consulta vacía");
    }else{
        foreach ($resultado as $valor) {
            echo $valor["nombre"] . " <a href=\"del.php?id=".$valor["id"]."\">DEL</a> <a href=\"edit.php?id=".$valor["id"]."\">EDIT</a> <br>";
        }
    }
}else{
    //Si no se ha hecho una busqueda
    $sql = "SELECT * FROM superheroes ORDER BY RAND() LIMIT 5";
    $resultado = $db->query($sql);
        
    echo ("Listado de Superhéroes aleatorios MAX: 5<br>");
    if(!$resultado){
        echo ("Consulta vacía");
    }else{
        foreach ($resultado as $valor) {
            echo $valor["nombre"] . " <a href=\"del.php?id=".$valor["id"]."\">DEL</a> <a href=\"edit.php?id=".$valor["id"]."\">EDIT</a> <br>";
        }
    }

}
?>
