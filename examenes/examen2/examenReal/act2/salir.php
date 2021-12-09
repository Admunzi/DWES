<?php
    session_start();

    if (isset($_SESSION['perfil'])) {
        $_SESSION['perfil'] = "";
    }
    header('location: index.php');

