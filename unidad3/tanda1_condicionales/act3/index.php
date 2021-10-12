<?php
/**
* Unidad 3 Act3
* Enunciado:
*       Carga fecha de nacimiento en variables y calcula la edad.
* 
* @author Daniel Ayala Cantador
* @date 29/09/2021
*/

date_default_timezone_set('Europe/Madrid');

$born_date= ("2000-10-9");
$year = date('Y', strtotime($born_date));
$month = date('n', strtotime($born_date));

$today = getdate();

$diferencia= "$today[year]" - $year + 1;

if (("$today[mon]" > $month)) {
    $diferencia -= 1;
}
echo("La diferencia de años son: ". $diferencia);
?>