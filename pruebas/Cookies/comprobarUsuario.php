<?php

$usuario="";
$contrasenia = "";

$errUsuario = "";
$errContrasenia = ""; 

$lprocesadoFormulario = true;
$lerror = false;

function clearData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};
var_dump($_COOKIE['user&contra']);

if (isset($_COOKIE['user&contra'])) {
    $partes = explode("/",$_COOKIE['user&contra']);
    $usuario = $partes[0];
    $contrasenia = $partes[1];
}

if (isset($_POST['enviar'])) {
    if (empty($_POST['usuario'])) {
        $errUsuario = "El nombre de usuario es necesario";
        $lerror = true; 
    }else{
        $usuario = clearData($_POST['usuario']);
    }

    if (empty($_POST['contrasenia'])) {
        $errContrasenia = "La contraseña es necesario";
        $lerror = true; 
    }else{
        $contrasenia = clearData($_POST['contrasenia']);
    }

    if ($lerror) {
        $lprocesadoFormulario = true;
    }else{
        if ($usuario == "admin" && $contrasenia = "admin123") {
            $lprocesadoFormulario = false;
            echo("<h1>Hola Admin</h1>");
    
            if ((isset($_POST['guardarLogeo']) == "on")) {
                $partesLog = $usuario."/".$contrasenia;
                echo $partesLog;
                if (!isset($_COOKIE['user&contra'])) {
                    setcookie('user&contra',$partesLog,time()+36000);
                }
            }else{
                if (isset($_COOKIE['user&contra'])) {
                    setcookie('user&contra',"",time()-36000);
                }            
            }
        }else{
            echo("<h1>Usuario no encontrado</h1>");
        }
    }
}
var_dump($_POST);

if ($lprocesadoFormulario) {
    ?>
    <form action="" method="post">
        <label >Usuario 
            <input type="text" name="usuario" value="<?php echo $usuario?>">
        </label><span class="error"><?php echo $errUsuario?></span><br><br>
        <label >Contraseña 
            <input type="password" name="contrasenia" value="<?php echo $contrasenia?>">
        </label><span class="error"><?php echo $errContrasenia?></span><br><br>
    
        <label>Guardar Contraseña 
            <input type="checkbox" name="guardarLogeo" >
        </label>
        <input type="submit" name="enviar" value="Enviar">
    
    </form>
    <?php
}