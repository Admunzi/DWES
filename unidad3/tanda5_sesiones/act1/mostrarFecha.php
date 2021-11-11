<?php
    session_start();

    if (!isset($_SESSION['tareas'])) {
        $_SESSION['tareas'] = array();
    }

    $lerror = false;
    $tituloErr = $detallesErr = $horaEmpiezaErr = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //SI RECIBIMOS EL FORM DE CREAR UNA TAREA SE HACE
        if (isset($_POST['enviarTarea'])) {
            if (empty($_POST['titulo'])) {
                $tituloErr = "titulo is required";
                $lerror = true;
            } else {
                $titulo = clearData($_POST["titulo"]);
            }
    
            if (empty($_POST['detalles'])) {
                $detallesErr = "Detalles is required";
                $lerror = true;
            } else {
                $detalles = clearData($_POST["detalles"]);
            }
    
            if (empty($_POST['horaEmpieza'])) {
                $horaEmpiezaErr = "Hora is required";
                $lerror = true;
            } else {
                $horaEmpieza = clearData($_POST["horaEmpieza"]);
            }
    
            if (!empty($_POST['horaTermina'])) {
                $horaTermina = clearData($_POST["horaTermina"]); 
            }else {
                $horaTermina = "-";
            }

            if (!$lerror) {
                if (isset($_POST['enviarTarea'])) {
                    $_SESSION['tareas'][$_GET['fecha']][] = array(
                        'titulo' => $titulo,
                        'detalles' => $detalles,
                        'horaEmpieza' => $horaEmpieza,
                        'horaTermina' => $horaTermina,
                    );
                }    
            }        
        }
        //SI RECIBIMOS EL FORM DE BORRAR UNA TAREA SE HACE 
        if (isset($_POST['enviarBorrarTarea'])) {
            unset($_SESSION['tareas'][$_GET['fecha']][$_POST['borrarTarea']]);
        }

    }

    function clearData($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    };

    echo("<h2></h2>");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
</head>
    <body>
        <h2>Listado de tareas del dia <?php echo $_GET['fecha']?> <a href="index.php">Volver al calendario</a> <a href="cierra_sesion.php">Borrar sesion</a></h2>
        <?php
            if (array_key_exists($_GET['fecha'],$_SESSION['tareas'])) {
                echo("<form action=\"\" method=\"post\">");

                foreach ($_SESSION['tareas'][$_GET['fecha']] as $clave => $valor) {
                    echo("<input type=\"radio\" name=\"borrarTarea\" value=\"$clave\">");
                    echo("<label>".$valor['titulo'].' '.$valor['detalles'].' horaEmpieza: '.$valor['horaEmpieza'].' horaTermina: '.$valor['horaTermina']."</label>");
                    echo("<br>");
                }
                echo("<br>");

                echo("\n<input type=\"submit\" value=\"Borrar Tarea\" name=\"enviarBorrarTarea\">");
                echo("</form>");

            }else{
                echo("<h3>No hay tareas</h3>");
            }
        ?>

        <form action="" method="post">
            <label>Titulo de la tarea: 
                <input type="text" name="titulo">
            </label>
            <span class="error">*<?php echo $tituloErr; ?></span><br /><br />
            <label>Añadir detalles:
                <textarea name="detalles" cols="30" rows="5"></textarea>
            </label>
            <span class="error">*<?php echo $detallesErr; ?></span><br /><br />
            <label>Hora que empieza: 
                <input type="time" name="horaEmpieza">
            </label>
            <span class="error">*<?php echo $horaEmpiezaErr; ?></span><br /><br />
            <label>Hora que termina: 
                <input type="time" name="horaTermina">
            </label>

            <p><input type="submit" name="enviarTarea" value="Enviar"></p>
        </form>
    </body>
</html>