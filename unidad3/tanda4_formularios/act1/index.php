<?php
/**
*   Unidad 3 Act1 Formularios
*   Enunciado:
*       Modifica el ejercicio del calendario para que el mes y el año se lean en un formulario. Añade las
*       siguientes especificaciones:
*           a. Por defecto se carga el mes y año actual.
*           b. Definición de días festivos en un array.
*           c. Utilizar colores para diferenciar festivos nacionales, de comunidad y locales.
*           d. Cada día será un enlace a una página que mostrará la fecha seleccionda.
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
.enlaceFecha{
    text-decoration: none;
    color: black;
}
</style>
EOD;

$festivos = array(
    //ENERO
    array(
        "estatal" => array(
            array(         
                "nombre" => "Año Nuevo",
                "dia" => 1,
            ),
            array(
                "nombre" => "Día de Reyes",
                "dia" => 6
            ),
        ),
        "autonomico" => array(
        ),
        "local" => array(

        ),
    ),
    //FEBRERO
    array(
        "estatal" => array(
        ),
        "autonomico" => array(
            array(         
                "nombre" => "Día de Andalucía",
                "dia" => 28
            ),
        ),
        "local" => array(
        ),
    ),
    //MARZO
    array(
        "estatal" => array(
        ),
        "autonomico" => array(
        ),
        "local" => array(
        ),
    ),
    //ABRIL
    array(
        "estatal" => array(
        ),
        "autonomico" => array(
        ),
        "local" => array(
        ),
    ),
    //MAYO
    array(
        "estatal" => array(
            array(         
                "nombre" => "Día del trabajo",
                "dia" => 1
            ),
        ),
        "autonomico" => array(
        ),
        "local" => array(
        ),
    ),
    //JUNIO
    array(
        "estatal" => array(
        ),
        "autonomico" => array(
        ),
        "local" => array(
        ),
    ),
    //JULIO
    array(
        "estatal" => array(
        ),
        "autonomico" => array(
        ),
        "local" => array(
        ),
    ),
    //AGOSTO
    array(
        "estatal" => array(
            array(         
                "nombre" => "Festividad de la Asunción de la Virgen",
                "dia" => 16
            ),
        ),
        "autonomico" => array(
        ),
        "local" => array(
        ),
    ),
    //SEPTIEMBRE
    array(
        "estatal" => array(
        ),
        "autonomico" => array(
        ),
        "local" => array(
            array(         
                "nombre" => "Virgen de Guadalupe",
                "dia" => 8
            ),
        ),
    ),
    //OCTUBRE
    array(
        "estatal" => array(
            array(         
                "nombre" => "Fiesta Nacional Española",
                "dia" => 12
            ),
        ),
        "autonomico" => array(     
        ),
        "local" => array(
            array(         
                "nombre" => "San Rafael",
                "dia" => 24
            ),
        ),
    ),
    //NOVIEMBRE
    array(
        "estatal" => array(
            array(         
                "nombre" => "Día de Todos los Santos",
                "dia" => 12
            ),
        ),
        "autonomico" => array(     
        ),
        "local" => array(
        ),
    ),
    //DICIEMBRE
    array(
        "estatal" => array(
            array(         
                "nombre" => "Día de la Constitución Española",
                "dia" => 6
            ),
            array(         
                "nombre" => "Inmaculada Concepción",
                "dia" => 8
            ),
            array(         
                "nombre" => "Navidad",
                "dia" => 25
            ),
        ),
        "autonomico" => array(     
        ),
        "local" => array(
        ),
    ),
);

$mesSeleccionado = [];
$anioSeleccionado = [];

/**
 * Funcion para que me devuelva la fecha 
 * 
 * MODIFICARLO BIEN
 * 
 * @param array
 * @param return
 */
function sacarSemanaSanta($diaSemana,$anio)
{
    $fecha = new DateTime(date("j-n-Y", easter_date($anio)));
    if ($diaSemana == "viernes") {
        $fecha->sub(new DateInterval('P2D'));
        return $fecha->format('j');
    }else{
        $fecha->sub(new DateInterval('P3D'));
        return $fecha->format('j');
    }
}

/**
 * Funcion que pinta cada celda del calendario
 * 
 * @param String
 * @param Number
 */
function pintarDia($param,$numeroCalendario)
{
    echo("<td style=\"background-color:$param\"><a href=\"mostrarFecha.php?fecha=".$numeroCalendario."/".$GLOBALS['mesFijoNumero']."/".$GLOBALS['anioFijo']." \" class=\"enlaceFecha\">".$numeroCalendario."</a></td>");
}

/**
 * Funcion que limpia todo dato
 * 
 * @param String
 */
function cleardata($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

/**
 * Funcion para que devuelva el numero del mes segun el mes que sea
 * 
 * @param String
 * @return
 */
function pasarMesANumero($param,$aMesesLista){
    for ($i=0; $i < count($aMesesLista); $i++) { 
        if ($param == $aMesesLista[$i]) {
            return $i+1;
        }
    }
}

$aMesesLista = array('enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre');
$aAniosLista = array(); 

for ($i=2000; $i < 2037; $i++) { 
    array_push($aAniosLista,$i);
}

//DEFINIMOS LA FECHA QUE QUEREMOS, AÑO Y MES
if (!isset($_POST["fecha"]) || $_POST["mesSelect"] == "" || $_POST["anioSelect"] == "") {
    $fechaFija= "2021-1";

}else{
    $anio = cleardata($_POST["anioSelect"]);
    $mes = pasarMesANumero(cleardata($_POST["mesSelect"]),$aMesesLista);
    $mesSeleccionado = cleardata($_POST["mesSelect"]);
    $anioSeleccionado = $anio;
    
    $fechaFija = $anio . "-" . $mes;
}

//CREAMOS FORMULARIO
?>
<form action="" method="POST">
<label >Elige mes:
        <select name="mesSelect">
            <?php
                foreach ($aMesesLista as $valor) {
                    $selected = ($mesSeleccionado == $valor) ? 'selected' : '';
                    echo "<option value = \"" . $valor . "\" $selected >" . $valor . "</option>";
                }
            ?>
        </select>
    </label><br><br>
    <label >Elige año:
        <select name="anioSelect">
            <?php
                foreach ($aAniosLista as $valor) {
                    $selected = ($anioSeleccionado == $valor) ? 'selected' : '';
                    echo "<option value = \"" . $valor . "\" $selected >" . $valor . "</option>";
                }
            ?>
        </select>
    </label><br><br>

    <input type="submit" value="Enviar" name="fecha">
</form>

<?php
//GUARDAMOS EN VARIABLES EL AÑO Y MES PARA QUE LOS PODAMOS USAR MAS FASI
$fechaEntera = strtotime($fechaFija);
$GLOBALS['anioFijo'] = date("Y", $fechaEntera);
$mesFijoLetra = date("F", $fechaEntera);
$GLOBALS['mesFijoNumero'] = date("n", $fechaEntera);

//Sacar viernes o jueves fiesta
$fechaViernesSemanaSanta = sacarSemanaSanta("viernes",$anioFijo);
$fechaJuevesSemanaSanta= sacarSemanaSanta("jueves",$anioFijo);

$mesPascua = date("n", easter_date($anioFijo));

//GUARDAMOS DIA ACTUAL
$anioActual = date("Y");
$mesActual = date("n");
$diaActual = date("j");

$empiezaDia = date("N", $fechaEntera);
$cantidadDiasMes= date("t", $fechaEntera);

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

    //COMPLETA LOS DIAS VACIOS
    if ($i < $empiezaDia ) {
        echo("<td></td>");

    }elseif ($numeroCalendario <= $cantidadDiasMes) {
        //CREAMOS UNA BANDERA PARA QUE PINTE DIA NORMAL Y NO PINTE SI ES FESTIVO
        $dia_normal= true;
        //SI ES LA FECHA ACTUAL SE PINTA VERDE
        if (($anioFijo == $anioActual) && ($mesFijoNumero == $mesActual) && ($numeroCalendario == $diaActual)) {
            pintarDia("green",$numeroCalendario);//PINTA DIA ACUTUAL
        }elseif (($mesFijoNumero == $mesPascua) && (($numeroCalendario == $fechaJuevesSemanaSanta) || ($numeroCalendario == $fechaViernesSemanaSanta))) {
            pintarDia("yellow",$numeroCalendario);//PINTA SEMANA SANTA
        }elseif ($i%7 == 0) {
            pintarDia("red",$numeroCalendario);//PINTA DOMINGOS
        }else {//MOSTRAMOS DIAS NORMALES Y FECHAS FESTIVAS
            foreach ($festivos[$mesFijoNumero-1] as $key => $value) {
                if ($key == "estatal") {
                    for ($l=0; $l < count($value); $l++) { 
                        if ($numeroCalendario == $value[$l]["dia"]) {
                            pintarDia("yellow",$numeroCalendario);//PINTA ESTATAL
                            $dia_normal = false;
                        }
                    }
                }elseif ($key == "autonomico") {
                    for ($o=0; $o < count($value); $o++) { 
                        if ($numeroCalendario == $value[$o]["dia"]) {
                            pintarDia("blue",$numeroCalendario);//PINTA AUTONOMICO
                            $dia_normal = false;
                        }
                    }
                }else {
                    for ($u=0; $u < count($value); $u++) { 
                        if ($numeroCalendario == $value[$u]["dia"]) {
                            pintarDia("orange",$numeroCalendario);//PINTA LOCAL
                            $dia_normal = false;
                        }
                    }
                }
            }//TERMINA FOREACH
            if ($dia_normal) {
                pintarDia("white",$numeroCalendario);//PINTA DIAS NORMALES
            }
        }
        $numeroCalendario++;
    }

    //SALTA DE FILA POR EL MODULO
    if ($i %7 == 0) {
        echo("</tr>");
        echo("<tr>");
    }
}
echo("</tr>");
echo("</table>");

//DIBUJAMOS LEYENDA
echo("<h2>LEYENDA</h2>");
echo("<table style=\"border: 1px solid black;\">");
    echo("<tr>");
        echo("<td style=\"background-color:red\">DOMINGOS</td>");
        echo("<td style=\"background-color:yellow\">ESTATAL</td>");
        echo("<td style=\"background-color:blue\">AUTONOMICO</td>");
        echo("<td style=\"background-color:orange\">LOCAL</td>");
        echo("<td style=\"background-color:green\">ACTUAL</td>");
    echo("</tr>");
echo("</table>");

?>