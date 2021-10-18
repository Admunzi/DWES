<?php
/**
 * 
 * @autor Daniel Ayala Cantador
 */
$covid = array("Cordoba" => 50,
                    "Sevilla" => 100,
                    "Huelva" => 30,
                    "Jaen" => 150,
                    "Malaga" => 20,
                    "Almeria" => 10,
                    "Cadiz" => 60,
                    "Granada" => 80);
var_dump($covid);

foreach ($covid as $clave =>$value) {
    echo($clave.":".$value."<br>");
}



$families = array (

    "Griffin"=>array ("Peter", "Lois", "Megan"),
    "Quagmire"=>array("Glenn"),
    "Brown"=>array("Cleveland", "Loretta", "Junior")
    );

echo("<br><br><br>");

//Ejercicio 2
foreach ($families as $key => $value) {
    echo($key.": ");
    foreach ($families[$key] as $miembros) {
        echo($miembros. " ");
    }
    echo("<br>");
}

//Ejercicio 3

$frutas = array(

    "manzana" => array(
    
    "color" => "rojo",
    "sabor" => "dulce",
    "forma" => "redondeada"),
    
    "naranja" => array(
    
    "color" => "naranja",
    "sabor" => "ácido",
    "forma" => "redondeada"),

    "plátano" => array(
    
    "color" =>"amarillo",
    "sabor" => "paste-y",
    "forma" => "aplatanada")
    
    );

    echo("<br><br><br>");

    print("<table>");
    foreach ($frutas as $fruta => $caracts) {
        print("<tr>");
        printf("<td>%s</td>",$fruta);
        foreach ($caracts as $caract) {
            
            printf("<td>%s</td>",$caract);
        }
        print "</tr>";   
    }

    
?>