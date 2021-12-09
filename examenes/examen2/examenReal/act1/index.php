<?php

$noticias = array(
    "videojuegos" => array("Videojuego1","Videojuego2","Videojuego3"),
    "literatura" => array("Literatura1","Literatura2","Literatura3"),
    "cine" => array("Cine1","Cine2","Cine3"),
    "series" => array("Series1","Series2","Series3"),
);

?>

<h1>Resumen de noticias <a href="preferencias.php">Settings</a></h1>
<hr>
<?php
if (isset($_COOKIE['pref'])) {
    $preferencias = explode("-",$_COOKIE['pref']);
    foreach ($preferencias as $key => $valuePreferencia) {
        if (!empty($valuePreferencia)) {
            foreach ($noticias[$valuePreferencia] as $key => $valueNoticia) {
                echo $valueNoticia . "<br>";
            }
        }
    }
}