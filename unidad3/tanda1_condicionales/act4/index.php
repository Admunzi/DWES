<?php
/**
* Unidad 3 Act4
* Enunciado:
*       Modifica la página inicial realizada, incluyendo una imagen de cabecera en función de la estación del
*       año en la que nos encontremos y un color de fondo en función de la hora del día.
* 
* @author Daniel Ayala Cantador
* @date 29/09/2021
*/

$today= getdate();
$day= "$today[mday]";
$month= "$today[mon]";
$hour= "$today[hours]";

$invierno="https://png.pngtree.com/thumb_back/fw800/back_pic/00/10/42/0256332a530acc4.jpg";
$primavera="https://previews.123rf.com/images/foodandmore/foodandmore1602/foodandmore160200349/52284729-banner-de-primavera-fresca-panor%C3%A1mica-colorido-con-las-flores-anaranjadas-y-amarillas-y-blancas-en-l.jpg";
$otonio="https://previews.123rf.com/images/foodandmore/foodandmore1602/foodandmore160200349/52284729-banner-de-primavera-fresca-panor%C3%A1mica-colorido-con-las-flores-anaranjadas-y-amarillas-y-blancas-en-l.jpg";
$verano="https://png.pngtree.com/thumb_back/fw800/back_our/20190621/ourmid/pngtree-summer-cool-summer-summer-banner-image_194467.jpg";

//Estaciones del año
//$month= 8;
switch ($month) {
    case 1:
    case 2:
        echo("<img src=\"$invierno\">");
        echo("Invierno");
        break;
    case 3:
        if ($day < 20) {
            echo("<img src=\"$invierno\">");
            echo("Invierno");
        }else{
            echo("<img src=\"$primavera\">");
            echo("Primavera");
        }
        break;
    case 4:
    case 5:
        echo("<img src=\"$primavera\">");
        echo("Primavera");
        break;
    case 6:
        if ($day < 21) {
            echo("<img src=\"$primavera\">");
            echo("Primavera");
        }else{
            echo("<img src=\"$verano\">");
            echo("Verano");
        }
        break;
    case 7:
    case 8:
        echo("<img src=\"$verano\">");
        echo("Verano");
        break;
    case 9:
        if ($day < 22) {
            echo("<img src=\"$verano\">");
            echo("Verano");
        }else{
            echo("<img src=\"$otonio\">");
            echo("Otoño");
        }
        break;
    case 10:
    case 11:
        echo("<img src=\"$otonio\">");
        echo("Otoño");
        break;
    case 12:
        if ($day < 21) {
            echo("<img src=\"$otonio\">");
            echo("Otoño");
        }else{
            echo("<img src=\"$invierno\">");
            echo("Invierno");
        }
        break;

    default:
        echo("La hora está mal");
        break;
}

//Color de fondo segun la hora del dia
//$hour= 21;
if (($hour >= 0) && ($hour < 6)) {
    echo("<body style=\"background-color: #151515;\"></body>");
}elseif (($hour >= 6) && ($hour < 9)) {
    echo("<body style=\"background-color: #FA8258;\"></body>");
}elseif (($hour >= 9) && ($hour < 13)) {
    echo("<body style=\"background-color: #81DAF5;\"></body>");
}elseif (($hour >= 13) && ($hour < 18)) {
    echo("<body style=\"background-color: #08298A;\"></body>");
}elseif (($hour >= 18) && ($hour < 24)) {
    echo("<body style=\"background-color: #0A0A2A;\"></body>");
}


$nombre = "Dani Ayala Cantador";
$img = "patata.jpeg";
    echo("<h1> Nombre: $nombre </h1>");
    echo("<img src=\"$img\"/>");


?>