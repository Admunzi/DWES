<?php
    session_start();
    if (!isset($_SESSION['listaClase'])) {
        $_SESSION['listaClase'] = array();
    }

    if (isset($_POST['alta'])) {
        $_SESSION['listaClase'][] = array('nombre' => $_POST['nombre'],
        'primerTrimestre' => $_POST['primerTrimestre'],
        'segundoTrimestre' => $_POST['segundoTrimestre'],
        'tercerTrimestre' => $_POST['tercerTrimestre'],
        'media' => round((($_POST['primerTrimestre']+$_POST['primerTrimestre']+$_POST['tercerTrimestre'])/3),1),
    );
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
</head>
    <body>
        <h1>Modulo de DWES</h1>
        <a href="cierra_sesion.php">Borrar sesion</a>
        <form action="" method="post">
            <p>Nombre alumno:</p>
            <input type="text" name="nombre" placeholder="Nombre">
            <p>Nota 1º trimestre:</p>
            <input type="number" name="primerTrimestre" placeholder="Nota">
            <p>Nota 2º trimestre:</p>
            <input type="number" name="segundoTrimestre" placeholder="Nota">
            <p>Nota 3º trimestre:</p>
            <input type="number" name="tercerTrimestre" placeholder="Nota">
            <p><input type="submit" name="alta" value="Enviar"></p>
        </form>
        <h2>Listado de alumnos con notas</h2>
        <?php
            foreach ($_SESSION['listaClase'] as $clave => $valor) {
                echo $valor['nombre'].' 1ºTr:'.$valor['primerTrimestre'].' 2ºTr:'.$valor['segundoTrimestre'].' 3ºTr:'.$valor['tercerTrimestre'].' Media:'.$valor['media'].'</br>';
            }
        ?>
    </body>
</html>