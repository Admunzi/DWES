<?php
/**
 * 
 */
if (!isset($_POST["sumar"])) {
    header("location:formulario.html");
}
echo($_POST["num1"]+$_POST["num2"]);
?>