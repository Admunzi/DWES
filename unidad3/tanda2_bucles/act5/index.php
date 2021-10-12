<?php
/**
*   Unidad 3 Act5 Bucles
*   Enunciado:
*       Dado el mes y año almacenados en variables, escribir un programa que muestre el calendario mensual
*       correspondiente. Marcar el día actual en verde y los festivos en rojo.
*
*   @author Daniel Ayala Cantador
*   @date 09/10/2021
*/

echo <<<EOD
<style type="text/css">
table{
    margin: 8px;
}
td {
    border: 1px solid black;
    text-align: center;
    padding: 2px 6px;
}
th {
    border: 1px solid black;
    text-align: center;
    padding: 2px 6px;
}

</style>
EOD;

//DEFINIMOS LA FECHA QUE QUEREMOS, AÑO Y MES
$fechaFija= "2021-10";

//GUARDAMOS EN VARIABLES EL AÑO Y MES PARA QUE LOS PODAMOS USAR MAS FASI
$fechaEntera = strtotime($fechaFija);
$anioFijo = date("Y", $fechaEntera);
$mesFijoLetra = date("F", $fechaEntera);
$mesFijoNumero = date("n", $fechaEntera);

//GUARDAMOS DIA ACTUAL
$anioActual = date("Y");
$mesActual = date("n");
$diaActual = date("j");

$empiezaDia = date("N", $fechaEntera);
$cantidadDiasMes= date("t", $fechaEntera);
//echo $cantidadDiasMes;

echo("<table style=\"border: 1px solid black;\">");
//CABECERA DEL MES
    echo("<tr>");
        echo("<th colspan=\"7\">");
        echo($mesFijoLetra." - ".$anioFijo);
        echo("</th>");
    echo("</tr>");

//DIAS DE LA SEMANAS
    echo("<tr>");
        echo("<th>L</th>");
        echo("<th>M</th>");
        echo("<th>X</th>");
        echo("<th>J</th>");
        echo("<th>V</th>");
        echo("<th>S</th>");
        echo("<th>D</th>");
    echo("</tr>");

//EMPEZAMOS A PONER FECHAS
$numeroCalendario= 1; 
$numeroCajas= 35;

//METER DIAS
for ($i = 1; $i <= $numeroCajas; $i++) {

    //SI EMPIEZA SABADO O DOMINGO AÑADIMOS HASTA 42 CAJAS PARA QUE SE VEA BIEN 
    if ($cantidadDiasMes >= 30 && $empiezaDia == 6 || $empiezaDia == 7) {
        $numeroCajas= 42;
    }

    //COMPLETA LOS DIAS 
    if ($i < $empiezaDia ) {
        echo("<td></td>");

    }elseif ($numeroCalendario <= $cantidadDiasMes) {

        //SI ES LA FECHA ACTUAL SE PINTA VERDE
        if (($anioFijo == $anioActual) && ($mesFijoNumero == $mesActual) && ($numeroCalendario == $diaActual)) {
            echo("<td style=\"background-color:green\">".$numeroCalendario."</td>");
        }elseif ($i%7 == 0) {
            echo("<td style=\"background-color:red\">".$numeroCalendario."</td>");
        }else {
            echo("<td>".$numeroCalendario."</td>");
        }
        $numeroCalendario++;
        //echo($numeroCalendario);

    }

    //SALTA DE FILA POR EL MODULO
    if ($i %7 == 0) {
        echo("</tr>");
        echo("<tr>");
    }
}
echo("</tr>");
echo("</table>");
?>