<?php

define("MAXSIZE",2000000);

$allowedExtension = array("gif","jpg","png");

$allowedFormat = array("image/gif","image/jpeg","image/jpg","image/x-png","image/png");

define("DIRUPLOAD", "upload/");

var_dump($_FILES);

//path.info es una funcion que devuelve info de la ruta
$a_Nombre = explode(".",$_FILES['file']['name']);
$ext = end($a_Nombre);

if (($_FILES['file']['size'] < MAXSIZE) &&
    (in_array($ext,$allowedExtension))&& 
    (in_array($_FILES['file']['type'],$allowedFormat)));

    
// }else {
//     echo ("NO");
// }