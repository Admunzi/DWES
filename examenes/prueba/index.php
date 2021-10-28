<?php

/**
 * Examen 1 Practico
 * 
 * @author Daniel Ayala Cantador
 */

include 'config/tests_cnf.php';

// var_dump($aTests);

// $selectedExam = 0;
// var_dump($aTests[$selectedExam]);
// echo("Examen - ".$aTests[$selectedExam]['idTest']." - ". $aTests[$selectedExam]['Permiso'].$aTests[$selectedExam]['Categoria'] );
//
// var_dump($aTests);
//  var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);
    $selectedExam = $_POST['examenSeleccionado'];
    // var_dump($aTests[$selectedExam]);

    if (isset($_POST['examenSeleccionado'])) {

        echo("<form action=\"\" method=\"post\">");
        foreach ($aTests[$selectedExam]['Preguntas'] as $key => $aPreguntas) {
            //CREA SELECTS
            echo($aPreguntas['Pregunta']);
            // var_dump($aPreguntas['respuestas']);
            echo("<select name=\"preguntaTest$key\">");

            foreach ($aPreguntas['respuestas'] as $key => $value) {
                echo("<option value=\"$key\">$value</option>");
            }
            echo("</select><br><br>");

        }
        echo("<input type=\"submit\" value=\"Enviar\">");
        
        echo("</form>");
    }

    
}else{
    ?>
    <form action="" method="post">
        <select name="examenSeleccionado" id="">
            <?php
                foreach ($aTests as $key => $value) {
                    echo("<option value=\"$key\">".$value['idTest']."</option>");
                }
            ?>
        </select>
        <input type="submit" value="Enviar">
    </form>
    <?php
}
