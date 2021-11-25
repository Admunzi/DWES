<?php

require_once "Contador.php";
$c1 = new Contador();
$c1->count()->count();
echo "Contador 1: ". $c1 . "<br>";

$c2 = new Contador();
$c2->count();
echo ("Contador 2: ".$c2."<br>");

new Contador();
new Contador();
new Contador();

echo ("Contador de instancias: ". Contador::countInstance()."<br>");
