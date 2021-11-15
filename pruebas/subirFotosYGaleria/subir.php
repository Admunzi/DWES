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
// var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <?php
            if (!$_SESSION['auth']) {
                ?>
                    <h1>Logueo de usuario</h1>
                    <form action="" method="post">
                        <label>Usuario:
                            <input type="text" name="usuario">
                        </label>  <br><br>
                        <label>Contraseña: 
                            <input type="password" name="psw">
                        </label>
                        <input type="submit" value="Enviar" name="enviar">

                    </form>

                <?php
            }else {
                ?>
                    <h1>Buenas, Admin <a href="salir.php">Salir</a></h1>
                    <h1>Form Subida de archivos.</h1>
                    <form action="upload_file.php" method="post" enctype="multipart/form-data">
                        <label for="file">Filename:</label>
                        <input type="file" name="file" id="file"><br/>
                        <input type="submit" name="submit" value="Submit">
                    </form>
                <?php
            }
        ?>

        <h1>Galeria fotos</h1>
        <?php
            // Abre un gestor de directorios para la ruta indicada
            $gestor = opendir("img");

            // Recorre todos los archivos del directorio
            while (($archivo = readdir($gestor)) !== false)  {
                // Solo buscamos archivos sin entrar en subdirectorios
                if (is_file("img/".$archivo)) {
                    echo "<img src='img/".$archivo."' width='200px' alt='".$archivo."' title='".$archivo."'>";
                }            
            }

        ?>
    </body>
</html>