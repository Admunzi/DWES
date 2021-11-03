<h1>Tests</h1>
    <p><a href="index.php">Inicio</a></p>
      <h2><?php echo $tituloTest($numeroTest)?></h2>
  
    <?php
    $aciertos = 0;
    foreach ($testActual as $indicePregunta=>$pregunta) {

      /* El radio devuelve un array con los contestados y el valor de estos. 
         Las preguntas sin contestar no se incluye en el array.
      */
      //Mostramos la pregunta.
      echo "<p class=\"pregunta\">".$pregunta['Pregunta']."</p>";

      /*Cargamos la respuesta válida. $soluciones[$indicePregunta] contiene la respuesta válida
        de la pregunta en curso. Puede ser a, b, c. Lo busca en $indices y retorna la key. Por tanto
        1respValida contendrá 0,1,2
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
        if ($ind==$respValida) {
          $clase = "valida";
        }
   
        if (array_key_exists($indicePregunta, $_POST)) { //La pregunta se ha contestado
            if ($_POST[$indicePregunta]==$ind) {
                if ($ind==$respValida) {
                    $clase = "acierta";
                }    
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
    
    
    
     
    ?>
    <div class='resultado'>
        <h2>Número de aciertos: <?php echo $aciertos?></h2>
        <h3 class= "<?php echo $clase;?>"><?php echo $mensaje;?></h3>
        <img src="<?php echo $sello;?>"/>
    </div>
 </body>
</html>