<?php
/**
*   Unidad 3 Act 3 Tarea de clase: 6/10
*   Enunciado:
*       Escribe un programa que genere tres números aleatorios correspondientes a la fecha de
*       nacimiento (día, mes, año) de una persona. Debes garantizar que la fecha generada es válida.
*       El script mostrará en pantalla la fecha y una imagen con el signo del zodiaco de la persona.
*
*   @author Daniel Ayala Cantador
*   @date 06/10/2021
*/

$flag=false;

//Generamos dias, meses y años hasta que nos de uno correcto
do {
    $aleatory_day= rand(1,31);
    $aleatory_month= rand(1,12);
    $aleatory_year= rand(1900,2021);
    
    if (checkdate($aleatory_day, $aleatory_month, $aleatory_year)) {
        $flag=true;
    }
    } while ($flag = false);

//Mostramos la fecha correcta
echo($aleatory_day."-".$aleatory_month."-".$aleatory_year);

//Comprobamos el signo zodiaco
$signo = "";
switch ($aleatory_month) {
    case 1:
        if ($aleatory_day <= 20) {
            $signo = "Capricornio";
        } else {
            $signo = "Acuario";
        }
        break;
    case 2:
        if ($aleatory_day <= 18) {
            $signo = "Acuario";
        } else {
            $signo = "Piscis";
        }
        break;
    case 3:
        if ($aleatory_day <= 20) {
            $signo = "Piscis";
        } else {
            $signo = "Aries";
        }
        break;
    case 4:
        if ($aleatory_day <= 20) {
            $signo = "Aries";
        } else {
            $signo = "Tauro";
        }
        break;
    case 5:
        if ($aleatory_day <= 21) {
            $signo = "Tauro";
        } else {
            $signo = "Geminis";
        }
        break;
    case 6:
        if ($aleatory_day <= 21) {
            $signo = "Geminis";
        } else {
            $signo = "Cancer";
        }
        break;
    case 7:
        if ($aleatory_day <= 22) {
            $signo = "Cancer";
        } else {
            $signo = "Leo";
        }
        break;
    case 8:
        if ($aleatory_day <= 23) {
            $signo = "Leo";
        } else {
            $signo = "Virgo";
        }
        break;
    case 9:
        if ($aleatory_day <= 23) {
            $signo = "Virgo";
        } else {
            $signo = "Libra";
        }
        break;
    case 10:
        if ($aleatory_day <= 23) {
            $signo = "Libra";
        } else {
            $signo = "Escorpio";
        }
        break;
    case 11:
        if ($aleatory_day <= 22) {
            $signo = "Escorpio";
        } else {
            $signo = "Sagitario";
        }
        break;
    case 12:
        if ($aleatory_day <= 21) {
            $signo = "Sagitario";
        } else {
            $signo = "Capricornio";
        }
        break;
}
echo("<br>".$signo."<br>");
echo("<img src=\"img/$signo.jpg\" width=\"200\" height=\"100\">");


?>