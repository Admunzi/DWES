<?php

//Agenda tipo yo

if (isset($_POST['alta'])) {
    // $aAgenda[]= $_POST['listaAgenda'];
    // $aAgenda=array('nombre'=>$_POST['nombre'],'telefono'=>$_POST['telefono']);
    // var_dump($_POST);


    $aAgenda[]=array('nombre' => $_POST['nombre']);
}else{
    $aAgenda = array();
}


?>
<form action="" method="post">

    <input type="text" name="nombre">
    <input type="text" name="telefono">
    <input type="hidden" name="listaAgenda" value="<?php $aAgenda?>">
    <input type="submit" name="alta" value="EnviarContacto">
</form>

<h1>Listado</h1>
<?php 
foreach ($aAgenda as $key => $valor) {
    echo($valor['nombre'].''.$valor['telefono']);
}

var_dump($aAgenda);
?>