<?php
    session_start();

    if ($_SESSION['perfil'] != "prof") {
        header('Location: index.php');
    }

?>
<!-- Vista -->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validacion</title>
</head>
<body>
    <h1>Estas en profesor.php</h1>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="public.php">Público</a>
        <a href="profesor.php">Profesor</a>
        <a href="alumno.php">Alumno</a>
        <a href="salir.php">Salir</a>
    </nav>

    <?php
        echo "Informacion de cuenta"; //Informacion de cuenta
    ?>
    <h2>Página de inicio</h2>

</body>
</html>