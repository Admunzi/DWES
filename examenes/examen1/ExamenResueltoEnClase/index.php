<?php

include 'config/tests_cnf.php';

$testsDisponibles = array_map(function($v)
{
    return 'Test: '.
        $v['idTest'].',
        '.$v['Permiso'].',
        '.$v['Categoria'];
        },$aTests);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
</head>
<body>
    <h1>Examen de conducir</h1>
    <h2>Seleccione el test:</h2>
    <form action="mostrar_test.php" method="post">
        <select name="numero_test">
            <?php
            foreach ($testsDisponibles as $key => $value) {
                echo("<option value=\"$key\">".$testsDisponibles[$key]."</option>");
            }
            ?>
        </select>
        <br>
        <br>
        <input type="submit" name ="submitForm" value="Enviar">
    </form>
</body>
</html>