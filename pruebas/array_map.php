<?php

$aNumeros = array(2,4,8);

$cuadrado= array_map(function ($valor){
    return $valor**2;
},$aNumeros);

var_dump($cuadrado);