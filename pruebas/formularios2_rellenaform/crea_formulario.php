<?php
/**
 * 
 */

$datosPersonales = array(
    0 => array(
        "label" => "Nombre",
        "tipo" => "text",
        "valor" => "Daniel",
    ),
    1 => array(
        "label" => "Apellidos",
        "tipo" => "text",
        "valor" => "Ayala Cantador",
    ),
    2 => array(
        "label" => "Direccion",
        "tipo" => "text",
        "valor" => "Fuensanta",
    ),
    3 => array(
        "label" => "cursos",
        "tipo" => "radiobuttom",
        "opciones" => array(
            "1DAW",
            "1ASIR",
            "2DAW",
            "2ASIR",
        )
    ),
);

echo ("<form action=\"mostrar_formulario.php\" method=\"post\">");
foreach ($datosPersonales as $campo => $arrayInterno) {
    echo("<label>".$arrayInterno["label"]);
    if ($arrayInterno["tipo"] == "radiobuttom") {
        foreach ($arrayInterno["opciones"] as $key => $value) {
            echo("<input type=\"radio\" name=\"opciones\" value=\"" . $value . "\" >");
            echo($value); 
        }
    }else {
        echo("<input type=\"text\" name=\"".$arrayInterno["label"]."\" value=\" ".$arrayInterno["valor"]."\" placeholder=\"Nombre\">");
    }

    echo("</label><br>");
}
echo("<input type=\"submit\" value=\"Enviar\">");
echo ("</form>");
?>
