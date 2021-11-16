<?php
$divisor = 0;
$n = 100;

try {
    echo $n%$divisor;
} catch (ArithmeticError $e) {
    echo $e->getMessage();
    die();
}