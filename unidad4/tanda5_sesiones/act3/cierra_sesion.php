<?php
    session_start();
    unset($_SESSION['tareas']);
    session_destroy();
    header('location: index.php');

