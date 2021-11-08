<?php
    session_start();

    if (!isset($_SESSION['agenda'])) {
        header('Location: agendaClase.php');
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
</head>
    <body>
        <h1>Agenda de contactos</h1>
        <a href="agendaClase.php">Inicio</a>
        <h2>Seleccionar destinatarios</h2>
        <?php
            foreach ($_SESSION['agenda'] as $clave => $valor) {
                echo $valor['nombre'].' '.$valor['telefono'].'</br>';
            }
        ?>
    </body>
</html>