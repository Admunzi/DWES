<?php
session_start();

if (!isset($_SESSION['noticias'])) {
    $_SESSION['noticias'] = array(
        "Videojuegos" => array("Videojuego1","Videojuego2","Videojuego3"),
        "Literatura" => array("Literatura1","Literatura2","Literatura3"),
        "Cine" => array("Cine1","Cine2","Cine3"),
        "Series" => array("Series1","Series2","Series3"),
    );
    $_SESSION['perfil'] = "";
}

$aUsuarios = array(
    array("usuario" => "editor",
        "psw" => "editor",
        "perfil" => "editor",
    ),
    array("usuario" => "redactor",
        "psw" => "redactor",
        "perfil" => "redactor",
    ),
);

if (isset($_POST['enviarEditor'])) {
    $_SESSION['noticias'][$_POST['categoria']] = array();
}

if (isset($_POST['enviarRedactor'])) {
    array_push($_SESSION['noticias'][$_POST['selectNoticias']], $_POST['noticia']);
}

$errorComentario = "";

if (isset($_POST['enviar'])) {
    $errorLog = false;
    
    if (isset($_POST['usuario']) && isset($_POST['psw'])) {
        foreach ($aUsuarios as $key => $valueUsuarios) {
            if ($valueUsuarios['usuario'] == $_POST['usuario'] && $valueUsuarios['psw'] == $_POST['psw']) {
                $_SESSION['perfil'] = $valueUsuarios['perfil'];
                $errorLog = true;
            }        
        }
        if (!$errorLog) {
            $errorComentario = "Te has equivocado con el logeo";
        }
    }
}

if (!empty($_SESSION['perfil'])) {
    echo ("<h2>Has conectado como: ". $_SESSION['perfil'] ." <a href=\"deslogearse.php\">deslogearse</a></h2>"); //Informacion de cuenta

    if ($_SESSION['perfil'] == "editor") {
        echo("<h3>Formulario para crear categorias</h3>");
        include "view/form.editor.html";        
    }else{
        echo("<h3>Formulario para crear noticias</h3>");
        include "view/form.redactor.php";
    }
}else{
    echo ("<h1>Logeo usuario</h1>");
    include "view/form.view.html";
    echo ("<span>".$errorComentario."<span> <br>");
}
?>
<a href="cierra_sesion.php">Cerrar Sesion</a>

<hr>
<h1>Resumen de noticias</h1>
<?php
    foreach ($_SESSION['noticias'] as $key => $valueNoticia) {
        echo ("<h2>".$key."</h2>");
        foreach ($valueNoticia as $key => $value) {
            echo $value . "<br>";
        }
    }