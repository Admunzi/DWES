<?php
require_once 'vendor/autoload.php';

use App\Models\Perro;
use App\Models\Persona;

//Desde php 7 es posible 'use' app\models\(Perro\Persona)

$perro = new Perro('tana','negro');
echo("Dame la pata");
$perro->darPata();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->entrenar();
$perro->darPata();
