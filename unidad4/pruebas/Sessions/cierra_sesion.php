<?php
    session_start();
    unset($_SESSION['agenda']);
    session_destroy();
    header('location: enviar_correo.php');

