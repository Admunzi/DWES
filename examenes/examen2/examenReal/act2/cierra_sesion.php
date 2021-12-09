<?php
    session_start();
    unset($_SESSION['noticias']);
    unset($_SESSION['perfil']);
    session_destroy();
    header('location: index.php');

