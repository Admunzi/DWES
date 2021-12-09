<?php

$aList = array();
$checkVideojuego = $checkLiteratura = $checkCine = $checkSeries = false; 

if (isset($_POST['mandarPreferencias'])) {
    if (isset($_POST['videojuegos'])) {
        array_push($aList,"videojuegos");
        $checkVideojuego = true;
    }
    if (isset($_POST['literatura'])) {
        array_push($aList,"literatura");
        $checkLiteratura = true;
    }
    if (isset($_POST['cine'])) {
        array_push($aList,"cine");
        $checkCine = true;
    }
    if (isset($_POST['series'])) {
        array_push($aList,"series");
        $checkSeries = true;
    }

    echo("<h2>Preferencias Cambiadas</h2>");
    $result = implode("-",$aList);
    setcookie('pref',$result,time()+36000);
}

?>
<h1>Preferencias <a href="index.php">Volver</a></h1>
<hr>
<form action="" method="post">
    <input type="checkbox" name="videojuegos">Videojuegos  <br>
    <input type="checkbox" name="literatura">Literatura  <br>
    <input type="checkbox" name="cine">Cine <br>
    <input type="checkbox" name="series">Series <br>
    <input type="submit" value="Enviar" name="mandarPreferencias">
</form>