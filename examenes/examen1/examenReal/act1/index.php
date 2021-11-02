<?php

/**
 * Examen 1 Practico
 * 
 * @author Daniel Ayala Cantador
 */
?>
<link rel="stylesheet" href="css/estilos.css">
<?php
include 'config/tests_cnf.php';

$selectedTypeExam = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    //SI RECIBE POR POST EL FORMULARIO PARA SELECCIONAR EL TIPO DE EXAMEN
    if (isset($_POST['seleccionarExamen'])) {
        $selectedTypeExam = $_POST['seleccionarExamen'];
    }else{
        //SI RECIBE POR POST EL FORMULARIO CON LAS RESPUESTAS
        $errores = 0;

        foreach ($_POST as $key => $value) {
            //Respuesta correcta
            $correcta = convertirLetraNumero($aTests[$selectedTypeExam]['Corrector'][$key]);

            //Mostramos la pregunta
            echo($aTests[$selectedTypeExam]['Preguntas'][$key]['Pregunta']."<br><br>");
            //Si la respuesta es erronea la sacamos en rojo
            if (convertirNumeroLetra($value) != $aTests[$selectedTypeExam]['Corrector'][$key]) {
                echo("<p class=\"rojo\">".$aTests[$selectedTypeExam]['Preguntas'][$key]['respuestas'][$value]."</p>");
                echo("<p class=\"verde\">".$aTests[$selectedTypeExam]['Preguntas'][$key]['respuestas'][$correcta]."</p>");
                $errores++;

            }else{
                echo("<p class=\"verde\">".$aTests[$selectedTypeExam]['Preguntas'][$key]['respuestas'][$correcta]."</p>");
            }
        }
        if ($errores > 2) {
            echo("<h1>No has superado el examen - Has tenido $errores fallos</h1>");
        }else{
            echo("<h1>Has superado el examen</h1>");
        }

        /**
         * Funcion para pasar de numero a letra
         * @param Number
         */
        function convertirNumeroLetra($param){
            switch ($param) {
                case 0:
                    return "a";
                    break;
                case 1:
                    return "b";
                    break;
                case 2:
                    return "c";
                    break;
                            
                default:
                    break;
            }
        }

        /**
         * Funcion para pasar de letra a numero
         * @param String
         */
        function convertirLetraNumero($param){
            switch ($param) {
                case "a":
                    return 0;
                    break;
                case "b":
                    return 1;
                    break;
                case "c":
                    return 2;
                    break;
                            
                default:
                    break;
            }
        }
    }
    
    //SI RECIBE EL PRIMER FORMULARIO DE ELEGIR EL TIPO DE EXAMEN
    //CREAMOS EL APARTADO PARA LA CREACION DEL TEST
    if ($selectedTypeExam != 0) {
        foreach ($aTests as $key => $aTest) {
            if ($aTest['idTest'] == $selectedTypeExam) { 
                echo("<h1>Examen Tipo $selectedTypeExam</h1>");
                $i=0;
                $iFoto=1;

                //GENERAMOS EL FORMULARIO PARA SACAR LAS RESPUESTAS
                echo("<form action=\"\" method=\"post\">");
                foreach ($aTest['Preguntas'] as $key => $aPreguntas) {
                    echo($aPreguntas['Pregunta']);

                    echo("<select name=\"$i\">");
                        foreach ($aPreguntas['respuestas'] as $indiceRespuesta => $value) {
                            echo("<option value=\"$indiceRespuesta\">".$value."</option>");
                        }

                    echo("</select>");

                    //COMPROBAMOS SI EXISTE LA IMAGEN
                    if (file_exists("dir_img_test$selectedTypeExam/img$iFoto.jpg")) {
                        echo("<img src=\"dir_img_test$selectedTypeExam/img$iFoto.jpg\" weight=\"50\" height=\"50\">");
                    }
                    echo("<br><br>");
                    $iFoto++;
                    $i++;
                }
                echo("<input type=\"submit\" value=\"Enviar\">");
                echo("</form>");
            }
        }   
          
    }
}else {
    //Generamos el formulario para seleccionar el tipo de examen
    ?>
    <h1>Examen Conducir Daniel Ayala</h1>
    <form action="" method="post">
        <label>Seleccionar examen: 
            <select name="seleccionarExamen">
                <?php
                    //Creamos un option por cada tipo de examen
                    foreach ($aTests as $key => $value) {
                        echo("<option value=\"".$value['idTest']."\">".$value['idTest']." - ".$value['Permiso']." - ".$value['Categoria']."</option>");
                    }
                ?>
            </select>
        </label><br>
        <input type="submit" value="Enviar">
    </form>
    <?php
}