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
    <h1>Ejemplo Aut. Básico</h1>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="public.php">Público</a>
        <?php 
            if ($_SESSION['perfil'] == "prof") {
                echo ("<a href=\"profesor.php\">profesor</a>");
                echo ("<a href=\"salir.php\">Salir</a>");
            }
            if ($_SESSION['perfil'] == "alum") {
                echo ("<a href=\"alumno.php\">Alumno</a>");
                echo ("<a href=\"salir.php\">Salir</a>");
            }
        ?>
    </nav>

    <?php
        if ($_SESSION['perfil'] != "inv") {
            echo "Informacion de cuenta"; //Informacion de cuenta
        }else{
            include "view/form.view.html";
        }
    ?>
    <h2>Página public.php</h2>


</body>
</html>