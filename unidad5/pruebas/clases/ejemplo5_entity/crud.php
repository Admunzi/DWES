<?php
    include("constantes.php");
    include("Superheroe.php");

    $sh =  new Superheroe();

    $valorInput = "";
    if (isset($_POST['inputValor'])) {
        $valorInput = $_POST['inputValor'];
    }
?>

<h1>CRUD</h1>
<form action="" method="POST">
    <input type="text" name="inputValor" value="<?php echo $valorInput?>">
    <input type="submit" value="Buscar"> <a href=new.php>Nuevo</a>
</form>

<?php
    if (isset($_POST['inputValor'])) {
        echo ("Listado de Superhéroes:<br>");
        //Si se busca algo
        $sh->setNombre($_POST['inputValor']);
        $datos = $sh->getAll();

        $valorInput = $_POST['inputValor'];
        if(!$datos){
            echo ("Consulta vacía"); 
        }else{
            foreach ($datos as $elemento){
                echo $elemento["nombre"] . " <a href=\"del.php?id=".$elemento["id"]."\">DEL</a> <a href=\"edit.php?id=".$elemento["id"]."\">EDIT</a> <br>";
            }    
        }
    }else{
        echo ("Listado de Superhéroes aleatorios:<br>");
        $datos = $sh->getAleatory();            
        foreach ($datos as $valor) {
            echo $valor["nombre"] . " <a href=\"del.php?id=".$valor["id"]."\">DEL</a> <a href=\"edit.php?id=".$valor["id"]."\">EDIT</a> <br>";
        }
        
    }
?>