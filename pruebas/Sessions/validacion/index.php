<?php
    session_start();
    
    if (!isset($_SESSION['auth'])) {
        $_SESSION['auth'] = false;
    }

    if (isset($_POST['enviar'])) {
        if (($_POST['usuario'] == 'usuario') and ($_POST['psw'] == '1234')) {
            $_SESSION['auth'] = true;
        }
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
            if ($_SESSION['auth']) {
                echo ("<a href=\"private.php\">Privado</a>");
                echo ("<a href=\"salir.php\">Salir</a>");
            }
        ?>
    </nav>

    <?php
        if ($_SESSION['auth']) {
            echo "Informacion de cuenta"; //Informacion de cuenta
        }else{
            include "view/form.view.html";
        }
    ?>
    <h2>Página de inicio</h2>


</body>
</html>