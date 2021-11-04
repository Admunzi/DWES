<?php
//Cargamos el fichero con las preguntas.
include('config/tests_cnf.php');

//Tests disponibles utilizando array_map. Es posible otras formas.
$testsDisponibles = array_map(function($v){return 'Test: '. $v['idTest'].', '.$v['Permiso'].', '.$v['Categoria'];},$aTests);

//Ejemplo de función anónima que utilizamos para sacar titulo de test.
$tituloTest = function($numeroTest) {
                      $salida = $numeroTest+1;
                  return "Resultado Test: ". $salida;
    };

if (isset($_COOKIE['cookie_NumeroTest'])) {
  $numeroTest = $_COOKIE['cookie_NumeroTest'];
}else {
  $numeroTest = 4;
}

//Variables para procesamiento. No hay validación, aunque si carga de valor por defecto en lista desplegable..
$lprocesaTest=false;
$lprocesaPreguntas=false;

//Detectamos condiciones de procesamiento de test. Hay que mostrar formulario de prguntas.
if (isset($_POST['submitTest'])) {
    $numeroTest = $_POST['numero_test'];
    $testActual = $aTests[$numeroTest]['Preguntas'];
   
    $directorioImagenes = 'dir_img_test'.$aTests[$numeroTest]['idTest'];
   
    $lprocesaTest=true;
}

//Detectamos condiciones de procesamiento de preguntas. Hay que mostrar resultado.
if (isset($_POST['submitRespuestas'])) {
    $numeroTest = $_POST['numero_test']; //Preferible utilizar campo oculto para evitar problemas de cookies.
    $testActual = $aTests[$numeroTest]['Preguntas'];
   
    $soluciones = $aTests[$numeroTest]['Corrector'];
    $indices = array("a","b","c");

    setcookie("cookie_NumeroTest",$numeroTest+1);
    $lprocesaPreguntas=true;
  }
?>
<!-- VISTA HTML -->
<!DOCTYPE HTML>  
<html lang="es">
  <head>
    <meta charset="utf-8"/>  
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
      .pregunta {font-weight: bold;}
      .valida, .acierta, .falla {font-family: FontAwesome;}
      .valida {color:blue;}
      .acierta {color:green;}
      .falla {color:red;}
	    p.valida:after {content: "*CORRECTA*";}
	 	  p.acierta:after {content: '*OK* \f164';}
      p.falla:after {content: '*TU ELECCIÓN * \f165';}
      .resultado {
        position: fixed;
        text-align: center;
        border-style: solid;
        border-width: 1px;
        top: 25px; right: 40%;
        width: 256px;
    }
   .resultado img{
        width: 64px;
        height: auto;
        }
    </style> 
  </head>
<body> 	
  <h1>Tests</h1>
	<h2>Seleccione test</h2>
    <form action="" method="post">
      <select name="numero_test">
    	<?php
          for ($i=0;$i<count($testsDisponibles);$i++) {
             //Cargamos opción seleccionada cuando hemos pulsado enviar en el formulario
             $selected = ($i==$numeroTest)? "selected":"";
    	       echo "<option $selected value=\"$i\"  >" . $testsDisponibles[$i]."</option>" ;
            }
	    ?>
	  </select>
	  <input value = "Enviar" type="submit" name="submitTest">
	</form>
  <br/>
  
  <?php
      //Colocamos el test con las preguntas correspondientes.
    
      if ($lprocesaTest) {
        echo "<h3>Responda Test: ".($numeroTest+1)."</h3>";
        echo "<form method=\"POST\" action=\"\">";
        foreach ($testActual as $clavePregunta=>$pregunta) {
            echo "<p class=\"pregunta\">".$pregunta['Pregunta']."</p>";
            //Mostramos la imagen si existe.
            $fileName = $directorioImagenes. '/img'. $pregunta['idPregunta'].'.jpg'; //Nombre de la imgen
            if (file_exists($fileName)) { 
               echo "<img src=\"$fileName\"/><br/>";
            }
            //Proceso para añadir las respuestas de las preguntas usando radio
            /* Utilizamos la clave de la pregunta para el nombre del RB (0,1,2,...).
               y para el valor la clave de la respuesta (0,1,2)
            */
            foreach($pregunta['respuestas'] as $claveRespuesta=>$respuesta) {
                echo "<input type=\"radio\" name = \"".$clavePregunta. "\" value=\"".$claveRespuesta."\">" . $respuesta . "</br>";
            }
            echo "<br/>";
          } 
        echo "<input type=\"hidden\" name=\"numero_test\" value=\"".$numeroTest."\">";
        echo "<input type=\"submit\" name=\"submitRespuestas\">";
        echo "</form>";
      }

      if ($lprocesaPreguntas) {
        echo '<h3>'. $tituloTest($numeroTest).'</h3>';
        $aciertos = 0;
        foreach ($testActual as $indicePregunta=>$pregunta) {
          /* El radio devuelve un array con los contestados y el valor de estos. 
             Las preguntas sin contestar no se incluye en el array.
          */
          //Mostramos la pregunta.
          echo "<p class=\"pregunta\">".$pregunta['Pregunta']."</p>";
    
          /*Cargamos la respuesta válida. $soluciones[$indicePregunta] contiene la respuesta válida
            de la pregunta en curso. Puede ser a, b, c. Lo busca en $indices y retorna la key. Por tanto
            respValida contendrá 0,1,2
          */
          $respValida=array_search($soluciones[$indicePregunta],$indices);
          /*
          Mostramos var_dump para entender bien las comparaciones.
          var_dump($soluciones);
          var_dump($_POST);
          var_dump($indices);
          */
          //Contabilizamos aciertos
          if (array_key_exists($indicePregunta, $_POST)) { //Podemos hacerlo por la manera en que hemos codificado los nombres en el formulario.
            if ($soluciones[$indicePregunta] == $indices[$_POST[$indicePregunta]]) {
              $aciertos++;
            }
          }
    
          //Establecemos clase de visualización.
          foreach ($pregunta['respuestas'] as $ind=>$resp){
            $clase="";
            //Respuesta válida
            if ($ind==$respValida) {
               $clase = "valida";
            }

            if (array_key_exists($indicePregunta, $_POST)) { //La pregunta se ha contestado
              //Identificamos respuesta  
              if ($_POST[$indicePregunta]==$ind) {
                    //La respuesta es acertada. Modificamos clase valida a la clase de la respuesta
                    if ($ind==$respValida) {
                        $clase = "acierta";
                    }	
                    //La respuesta no es acertada
                     else {
                        $clase = "falla";
                    }
                 } 
                }
            echo "<p class=\"".$clase."\">".$resp."</p>";
          } 
        }
        
        if ($aciertos<8) {
            $mensaje = "Test NO superado";
            $sello = 'img/error.png';
            $clase = 'falla';
        }
        else {
            $mensaje = "Test superado";
            $sello = 'img/ok.png';
            $clase = 'acierta';
        }
        echo '<div class="resultado">';
        echo '<h2>Número de aciertos: '. $aciertos.'</h2>';
        echo '<h3 class= "'.$clase.'">'.$mensaje.'</h3>';
        echo '<img src="'.$sello.'"/>';
        echo '</div>';
      }
  ?>

</body>
</html>