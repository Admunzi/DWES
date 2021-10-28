<?php

/**
 * Examen 1 Practico
 * 
 * @author Daniel Ayala Cantador
 */
include 'config/tests_cnf.php';

$selectedTypeExam = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    //SI RECIBE POR POST EL FORMULARIO PARA SELECCIONAR EL TIPO DE EXAMEN
    if (isset($_POST['seleccionarExamen'])) {
        $selectedTypeExam = $_POST['seleccionarExamen'];
    }else{
        //SI RECIBE POR POST EL FORMULARIO CON LAS RESPUESTAS
        function convertirNumeroLetra($param){
            switch ($param) {
                case 1:
                    return "a";
                    break;
                case 2:
                    return "b";
                    break;
                case 3:
                    return "c";
                    break;
                            
                default:
                    break;
            }
        }
        var_dump($_POST);
        $errores = 0;
        
        //COMPROBAMOS CADA RESPUESTA MANDADA CON EL ARRAY DE RESPUESTAS CORRECTAS
        foreach ($_POST as $key => $value) {
            if (convertirNumeroLetra($value) != $aTests[$selectedTypeExam]['Corrector'][$key]) {
                $errores++;
            }
        }
        if ($errores > 2) {
            echo("<h1>No has superado el examen</h1>");
        }
    }
    
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

                    //Comprobamos si existe el las imagenes
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
    <form action="" method="post">
        <label>Seleccionar examen: 
            <select name="seleccionarExamen">
                <?php
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