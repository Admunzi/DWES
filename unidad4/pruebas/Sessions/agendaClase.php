<?php
    session_start();
    if (!isset($_SESSION['agenda'])) {
        $_SESSION['agenda'] = array();
    }

    if (isset($_POST['alta'])) {
        $_SESSION['agenda'][] = array('nombre' => $_POST['nombre'],
                          'telefono' => $_POST['telefono']);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
</head>
    <body>
        <h1>Agenda de contactos</h1>
        <a href="enviar_correo.php">Enviar Correo</a>
        <a href="cierra_sesion.php">Borrar sesion</a>
        <form action="" method="post">
            <p>Nombre:</p>
            <input type="text" name="nombre" placeholder="Nombre">
            <p>Teléfono:</p>
            <input type="text" name="telefono" placeholder="Telefono">
            <p><input type="submit" name="alta" value="Enviar"></p>
        </form>
        <h2>Listado de contactos</h2>
        <?php
            foreach ($_SESSION['agenda'] as $clave => $valor) {
                echo $valor['nombre'].' '.$valor['telefono'].'</br>';
            }
        ?>
    </body>
</html>