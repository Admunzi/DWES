<?php
    session_start();
    
    if (!isset($_SESSION['perfil'])) {
        $_SESSION['perfil'] = "inv";
    }

    $aListaLogeo = array(
        array(         
            "id" => 1,
            "usuario" => "dani",
            "password" => "1234",
            "perfil" => "prof",
        ),
        array(
            "id" => 2,
            "usuario" => "manolo",
            "password" => "1234",
            "perfil" => "alum",
        ),
        array(
            "id" => 3,
            "usuario" => "rosa",
            "password" => "1234",
            "perfil" => "prof",
        ),
    );

    if (isset($_POST['enviar'])) {
        foreach ($aListaLogeo as $key => $value) {
            if ($value['usuario'] == $_POST['usuario'] && $value['password'] == $_POST['psw']) {
                $_SESSION['perfil'] = $value['perfil'];
            }
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
            if ($_SESSION['perfil'] != "inv") {
                echo ("<a href=\"private.php\">Privado</a>");
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
    <h2>Página de inicio</h2>

</body>
</html>