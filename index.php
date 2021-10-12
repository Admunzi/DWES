<?php
/**
 * 
 * Indice "Desarrollo Web Entorno Servidor"
 * 
 * @author Daniel Ayala Cantador
 * @date 12/10/2021
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Ejercicios Servidor</title>
</head>
<body>
<?php
    $info = array(
        $unidad2 = array(
            "descripcion" => "Unidad 2 Tanda 1",
            "carpeta" => "unidad2/tanda1/",
            "ejercicios" => array(
                array(
                    "nombre" => "Actividad 1",
                    "descripcion" => "Script que muestre el mensaje Hola Mundo entrecomillado.",
                    "url" => "act1/index.php"
                ),
                array(
                    "nombre" => "Actividad 2",
                    "descripcion" => "Ficha personal con los datos cargados en variables",
                    "url" => "act2/index.php"
                ),
                array(
                    "nombre" => "Actividad 3",
                    "descripcion" => "Script que, a partir del radio almacenado en una variable y la definición de la constante PI, calcule el área del círculo y la longitud de la circunferencia. ",
                    "url" => "act3/index.php"
                ),
                array(
                    "nombre" => "Actividad 4",
                    "descripcion" => "Prueba el script y modifícalo para las palabras DAW y DWES apararezcan en negrita. Investiga uso de print y printf para salida de texto.",
                    "url" => "act4/index.php"
                ),
                array(
                    "nombre" => "Actividad 5",
                    "descripcion" => "Script que escriba el resultado de la suma de dos números almacenados en dos variables.",
                    "url" => "act5/index.php"
                ),
                array(
                    "nombre" => "Actividad 6",
                    "descripcion" => "Script que cargue x variables",
                    "url" => "act6/index.php"
                ),
                array(
                    "nombre" => "Actividad 7",
                    "descripcion" => "Escribir un script que declare una variable y muestre x información en pantalla:",
                    "url" => "act7/index.php"
                ),
                array(
                    "nombre" => "Actividad 8",
                    "descripcion" => "A veces es necesario conocer exactamente el contenido de una variable. Piensa como puedes hacer esto y escribe un script con la siguiente salida",
                    "url" => "act8/index.php"
                ),
                array(
                    "nombre" => "Actividad 9",
                    "descripcion" => "Escribir un script utilizando variables que permita obtener x resultado",
                    "url" => "act9/index.php"
                ),
                array(
                    "nombre" => "Actividad 10",
                    "descripcion" => "Pon ejemplo de uso de la sintaxis heredoc en el manejo de cadenas.",
                    "url" => "act10/index.php"
                ),
            )
        ),
        $unidad3_tanda1 = array(
            "descripcion" => "Unidad 3 Condicionales",
            "carpeta" => "unidad3/tanda1_condicionales/",
            "ejercicios" => array(
                array(
                    "nombre" => "Actividad 1",
                    "descripcion" => "Almacena tres números en variables y escribirlos en pantalla de manera ordenada.",
                    "url" => "act1/index.php"
                ),
                array(
                    "nombre" => "Actividad 2",
                    "descripcion" => "Carga en variables mes y año e indica el número de días del mes. Utiliza la estructura de control switch",
                    "url" => "act2/index.php"
                ),
                array(
                    "nombre" => "Actividad 3",
                    "descripcion" => "Carga fecha de nacimiento en variables y calcula la edad.",
                    "url" => "act3/index.php"
                ),
                array(
                    "nombre" => "Actividad 4",
                    "descripcion" => "Modifica la página inicial realizada, incluyendo una imagen de cabecera en función de la estación del año en la que nos encontremos y un color de fondo en función de la hora del día.",
                    "url" => "act4/index.php"
                ),
                array(
                    "nombre" => "Actividad 5",
                    "descripcion" => "Script que muestre una lista de enlaces en función del perfil de usuario: Perfil Administrador: Pagina1, Pagina2, Pagina3, Pagina4. Perfil Usuario: Pagina1, Pagina2",
                    "url" => "act5/index.php"
                )
            )
        ),
        $unidad3_tanda2 = array(
            "descripcion" => "Unidad 3 Bucles",
            "carpeta" => "unidad3/tanda2_bucles/",
            "ejercicios" => array(
                array(
                    "nombre" => "Actividad 1",
                    "descripcion" => "Escribir los números 1 al 10",
                    "url" => "act1/index.php"
                ),
                array(
                    "nombre" => "Actividad 2",
                    "descripcion" => "Sumar los 3 primeros numeros pares",
                    "url" => "act2/index.php"
                ),
                array(
                    "nombre" => "Actividad 3",
                    "descripcion" => "Tablas de multiplicar del 1 al 10.",
                    "url" => "act3/index.php"
                ),
                array(
                    "nombre" => "Actividad 4",
                    "descripcion" => "Mostrar paleta de colores. Utilizar una tabla que muestre el color y el valor hexadecimal que le corresponde. Cada celda será un enlace a una página que mostrará un fondo de pantalla con el color seleccionado.",
                    "url" => "act4/index.php"
                ),
                array(
                    "nombre" => "Actividad 5",
                    "descripcion" => "Dado el mes y año almacenados en variables, escribir un programa que muestre el calendario mensual correspondiente. Marcar el día actual en verde y los festivos en rojo.",
                    "url" => "act5/index.php"
                )
            )
        ),
        $unidad3_tanda3 = array(
            "descripcion" => "Unidad 3 Arrays",
            "carpeta" => "unidad3/tanda3_arrays/",
            "ejercicios" => array(
                array(
                    "nombre" => "Actividad 1",
                    "descripcion" => "Indexación de los ejercicios mediante un array.",
                    "url" => "act1/index.php"
                ),
                array(
                    "nombre" => "Actividad 2",
                    "descripcion" => "Crear un array con los alumnos de clase y permitir la selección aleatoria de uno de ellos. El resultado debe mostrar nombre y fotografía.",
                    "url" => "act2/index.php"
                ),
                array(
                    "nombre" => "Actividad 3",
                    "descripcion" => "
                        Define un array que permita almacenar y mostrar la siguiente información.
                            <br>a. Meses del año.
                            <br>b. Tablero para jugar al juego de los barcos.
                            <br>c. Nota de los alumnos de 2º DAW para el módulo DWES.
                            <br>d. Verbos irregulares en inglés.
                            <br>e. Información sobre continentes, países, capitales y banderas.
                    ",
                    "url" => "act3/index.php"
                ),
                array(
                    "nombre" => "Actividad 4",
                    "descripcion" => "Un restaurante dispone de una carta de 3 primeros, 5 segundos y 3 postres. Almacenar información incluyendo foto y mostrar los menús disponibles. Mostrar el precio del menú suponiendo que éste se calcula sumando el precio de cada uno de los platos incluidos y con un descuento del 20 %.",
                    "url" => "act4/index.php"
                ),
                array(
                    "nombre" => "Actividad 5",
                    "descripcion" => "Mejora calendario con un array de los días festivos: colores diferentes, nacionales, comunidad, locales.",
                    "url" => "act5/index.php"
                )
            )
        ),
        $unidad3_6a10= array(
            "descripcion" => "Unidad 3 Actividades(6 a 10)",
            "carpeta" => "unidad3/ejercicios_6-10/",
            "ejercicios" => array(
                array(
                    "nombre" => "Actividad 1",
                    "descripcion" => "Escribe un programa que genere e imprima 20 números aleatorios (0-100), mostrando también el mayor, el menor y la media.",
                    "url" => "act1/index.php"
                ),
                array(
                    "nombre" => "Actividad 2",
                    "descripcion" => "Escribe un programa que genere e imprima un número aleatorio de 4 cifras, mostrando a continuación cada una de sus cifras en un color diferente.",
                    "url" => "act2/index.php"
                ),
                array(
                    "nombre" => "Actividad 3",
                    "descripcion" => "Escribe un programa que genere tres números aleatorios correspondientes a la fecha de nacimiento (día, mes, año) de una persona. Debes garantizar que la fecha generada es válida. El script mostrará en pantalla la fecha y una imagen con el signo del zodiaco de la persona.",
                    "url" => "act3/index.php"
                ),
                array(
                    "nombre" => "Actividad 4",
                    "descripcion" => "Programa que lea un número entero N de 5 cifras y muestre sus cifras 
                    *       igual que en el ejemplo.",
                    "url" => "act4/index.php"
                ),
            )
        )
    );

/**
 * 
 * Esta funcion va a mostrar un container por cada seccion de actividades con sus correspondientes cartas
 * 
 * @param array
 */
function showContainers($info)
{
    //Para cada seccion de actividades crea un container
    for ($i=0; $i < count($info); $i++) {
        echo("<div class=\"container\">");
        foreach ($info[$i] as $key => $arrayUnidad) {
            //Ponemos el nombre de la seccion
            if ($key == "descripcion") {
                echo("<h2>".$arrayUnidad."</h2>");
            }//Direccion de la carpeta de la unidad  
            if ($key == "carpeta") {
                $direccionCarpeta= $arrayUnidad;
            }
            if ($key == "ejercicios") {
                foreach ($arrayUnidad as $key => $arrayEjercicios) {
                    echo("<div class=\"card\">");
                    echo("<div class=\"title\">".$arrayEjercicios["nombre"]."</div>");
                    echo("
                        <div class=\"content\">
                            <p>
                                ".$arrayEjercicios["descripcion"]."
                            </p>
                        </div>
                    ");
                    echo("<a href=\" ". $direccionCarpeta.$arrayEjercicios["url"] ." \" class=\"btn\">Ir a la actividad</a>");
                    echo("</div>");//<!--/card-->
                }
            }
        }
        echo("</div>");
    }
}

echo("<h1>Indice \"Desarrollo Web Entorno Servidor\"</h1>");
showContainers($info);
?>
 
</body>
</html>