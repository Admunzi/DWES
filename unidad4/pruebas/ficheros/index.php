<?php 

$file = fopen("poema.txt","r") or exit("No se puede abrir el fichero");

// //SACA LINE A LINEA
// while (!feof($file)) {
//     echo fgets($file)."<br>";
// }

// //SACA CARACTER A CARACTER
// while (!feof($file)) {
//     $char = fgetc($file);

//     ord($char) == 10 ? print("<br>") : print $char;
// }

//LEEMOS EL FICHERO CON BITES
$buffer = fread($file,filesize("poema.txt"));
// echo $buffer;

$lista = explode("\n",$buffer);
// var_dump($lista);
foreach ($lista as $key => $value) {
    echo $value."<br>";
}

fclose($file);