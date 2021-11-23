<?php
define("MAXSIZE", 2000000);
define("DIRUPLOAD", "files/");

$curso = $grupo = $patron = $opcion = "";

$errorFile = $errorOption = "";

$lprocesaFormulario = FALSE;
$lerror = FALSE;


function clearData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};

if (isset($_POST['mandar'])) {
    if (isset($_POST['curso'])) {
        $curso = clearData($_POST['curso']);
    }
    if (isset($_POST['grupo'])) {
        $grupo = clearData($_POST['grupo']);
    }
    if (isset($_POST['patron'])) {
        $patron = clearData($_POST['patron']);
    }

    if (empty($_FILES['file'])) {
        $errorFile = "Se tiene que mandar un archivo obligatoriamente";
        $lerror = true;
    }else{
        moverArchivo();
    }

    if (empty($_POST['opcion'])) {
        $errorOption = "Se tiene que seleccionar uno obligatoriamente";
        $lerror = true;
    }else{
        $opcion = clearData($_POST['opcion']);
    }

    //Empezamos el codigo para hacer los patrones
    if (!$lerror) {
        $aAlumnos = leerFichero();
        // var_dump($aAlumnos);
        $aFormateados = generarAlumnosFormateados($aAlumnos,$curso,$grupo,$patron);
        switch ($opcion) {
            case 'mysql':
                generarMysql($aFormateados);
                break;
            case 'linux':
                generarLinux($aFormateados);
                break;
            case 'oracle':
                # code...
                break;
            default:
                break;
        }
        devolvemosElArchivo();
        // echo("<a href=\"download.php?file=fichero.png\">Descargar fichero</a>");

    }
}

function moverArchivo(){
    $allowedExts = array("txt");
    $allowedFormat = array("text/plain");

    // pathinfo();
    $aNombre = explode(".", $_FILES["file"]["name"]);
    $ext = end($aNombre);

    var_dump($_FILES);
    if (($_FILES["file"]["size"] < MAXSIZE) && (in_array($ext, $allowedExts)) && (in_array($_FILES["file"]["type"], $allowedFormat))) {
        if ($_FILES["file"]["error"] > 0)    {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br/>";
    } else {
            $filename = $_FILES["file"]["name"];

            move_uploaded_file($_FILES["file"]["tmp_name"], DIRUPLOAD . $filename);
        }

    }
}

function devolvemosElArchivo(){
    header('Location: backFile.php');
}

function generarLinux($aFormateados){
    $fh = fopen("files/output.txt", "w");

    foreach ($aFormateados as $key => $value) {
        fputs($fh, "useradd ".$value." -p ".$value."\n");
    }
    fclose ($fh);
}

function generarMysql($aFormateados){
    $fh = fopen("files/output.txt", "w");

    foreach ($aFormateados as $key => $value) {
        fputs($fh, "GRANT ALL PRIVILEGES ON bdejemplo.* TO ".$value."@'localhost' IDENTIFIED BY 'clave';\n");
    }
    fclose ($fh);
}

function leerFichero(){
    $file = fopen("files/RelAluProMatUni.txt","r") or exit("No se puede abrir el fichero");

    $i = 0;
    $cantidadLineaLarga = 2;
    while (!feof($file)) {
        //Quitamos espacios al final
        $linea = rtrim(fgets($file));

        if ($cantidadLineaLarga == 0) {
            //Separamos cada alumno, primero separamos el nombre por todo lo que esté detrás de la coma
            if (!empty($linea)) {
                $partesPrincipales = explode(", ",$linea);
                $partesNombreYApellido = explode(" ",$partesPrincipales[0]);
    
                //Guardamos el nombre, apellido1 y apellido2
                $aAlumnos[$i]['nombre'] = strtolower(eliminarAcentos($partesPrincipales[1]));
                $aAlumnos[$i]['apellido1'] = strtolower(eliminarAcentos($partesNombreYApellido[0]));
                $aAlumnos[$i++]['apellido2'] = strtolower(eliminarAcentos($partesNombreYApellido[1]));    
            }
        }

        if ($linea == "----------------------------------") {
            $cantidadLineaLarga--;
        }
    }
    fclose($file);
    return $aAlumnos;
}

function eliminarAcentos($cadena){
		
    //Reemplazamos la A y a
    $cadena = str_replace(
    array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
    array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
    $cadena
    );

    //Reemplazamos la E y e
    $cadena = str_replace(
    array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
    array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
    $cadena );

    //Reemplazamos la I y i
    $cadena = str_replace(
    array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
    array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
    $cadena );

    //Reemplazamos la O y o
    $cadena = str_replace(
    array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
    array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
    $cadena );

    //Reemplazamos la U y u
    $cadena = str_replace(
    array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
    array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
    $cadena );

    //Reemplazamos la N, n, C y c
    $cadena = str_replace(
    array('Ñ', 'ñ', 'Ç', 'ç'),
    array('N', 'n', 'C', 'c'),
    $cadena
    );
    
    return $cadena;
}

function generarAlumnosFormateados($aAlumnos,$curso,$grupo,$patron){
    $aLista = array();
    foreach ($aAlumnos as $key => $alumno) {
        $contPrimApell = $contSegApell = $contNombre = 0;
        $usuarioFinal = "";
            for ($i=0; $i < strlen($patron); $i++) { 
                switch ($patron[$i]) {
                    case 'A':
                        $usuarioFinal .= $alumno['apellido1'][$contPrimApell++];
                        break;
                    case 'a':
                        $usuarioFinal .= $alumno['apellido2'][$contSegApell++];
                        break;
                    case 'n':
                        $usuarioFinal .= $alumno['nombre'][$contNombre++];
                        break;
                    case 'c':
                        $usuarioFinal .= $curso;
                        break;
                    case 'g':
                        $usuarioFinal .= $grupo;
                        break;
                    default:
                        $usuarioFinal .= $patron[$i];
                        break;
                }
            }
        array_push($aLista,$usuarioFinal); 
    }
    return $aLista;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="css/style.css">
</head>
    <body>
        <h1>Modulo de DWES</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <p>
                <b>De izquierda a derecha</b> <br><br>
                <b>A</b> (letra primer apellido) <br>
                <b>a</b> (letra segundo apellido) <br>
                <b>n</b> (letra nombre) <br>
                <b>c</b> (curso) <br>
                <b>g</b> (grupo) <br><br>
                Ej: aanAA_cg <br>
                Ej: gc_aAnnA <br>
                Ej: AA_cg_nnn <br>
            </p>
            <p>Curso:</p>
            <input type="text" name="curso" placeholder="Ej: DAW, 1, 4">
            <p>Grupo:</p>
            <input type="text" name="grupo" placeholder="Ej: 2, 2B">

            <p>Patrón</p>
            <input type="text" name="patron" placeholder="Ej: AAaann_cg">

            <p>Archivo</p>
            <input type="file" name="file" id="file">
            <span><?php echo ("*".$errorFile)?></span><br/>

            <p>Opcion:</p> 
            <input type="radio" name="opcion" value="mysql">Mysql
            <input type="radio" name="opcion" value="linux">Linux 
            <input type="radio" name="opcion" value="oracle">Oracle
            <span><?php echo ("*".$errorOption)?></span>

            <p><input type="submit" name="mandar" value="Enviar"></p>
        </form>
    </body>
</html>