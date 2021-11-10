<?php
    session_start();

    if (!isset($_SESSION['tareas'])) {
        $_SESSION['tareas'] = array();
    }

    $lerror = false;
    $tituloErr = $detallesErr = $horaEmpiezaErr = $horaTerminaErr = "";

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
    
            if (empty($_POST['horaTermina'])) {
                $horaTerminaErr = "Hora is required";
                $lerror = true;
            } else {
                $horaTermina = clearData($_POST["horaTermina"]);
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

    echo("<h1>Fecha: ".$_GET['fecha']."</h1>");
    echo("<h2><a href=\"index.php\">Volver al calendario</a> <a href=\"cierra_sesion.php\">Borrar sesion</a></h2>");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
</head>
    <body>
        <h1>Lista de tareas</h1>
        <form action="" method="post">
            <p>Titulo de la tarea:</p>
            <input type="text" name="titulo">
            <span class="error">*<?php echo $tituloErr; ?></span><br /><br />
            <p>Añadir detalles:</p>
            <textarea name="detalles" cols="30" rows="5"></textarea>
            <span class="error">*<?php echo $detallesErr; ?></span><br /><br />
            <p>Hora que empieza:</p>
            <input type="time" name="horaEmpieza">
            <span class="error">*<?php echo $horaEmpiezaErr; ?></span><br /><br />
            <p>Hora que termina:</p>
            <input type="time" name="horaTermina">
            <span class="error">*<?php echo $horaTerminaErr; ?></span><br /><br />

            <p><input type="submit" name="enviarTarea" value="Enviar"></p>
        </form>
        <h2>Listado de tareas del dia <?php echo $_GET['fecha']?></h2>
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
    </body>
</html>