<?php

/**
 * Ejercicio de clase con todos los tipos de inputs y controlar los errores
 * Hecho por el profesor
 * Idea principal del ejercicio: 
 * Utilizar dos banderas, una para validar el procesamiento del formulario 
 * y otra para detectar si hay error en la validación del formulario 
 * 
 * Si hay error se recogen los valores enviados y se muestran de nuevo utilizando $_POST
 * Si no hay error se envía el formulario correctamente pero en realidad te quedas
 * en el mismo fichero.
 */

//Como va a ser mas o menos el formulario (no va a ser exactamente así)
$name = $email = $url = $gender = $comment = $website = "";
//nombre, email, url, textArea, radiobutton, checkbox, select, submit 
$nameErr = $emailErr = $websiteErr = $genderErr = $commentErr = "";

$aVehiculos = array('Bike', 'Car', 'Patinete');
//variable que cargue los valores iniciales de estos inputs 

$aVehiculosSeleccionados = [];
$opcionSeleccionada = [];
$carsSeleccionados = [];
$cars = array("Renault", "Mercedes", "Citroen", "Volvo");

$aOpciones = array(
    array(
        "valor" => 1,
        "literal" => "Opcion 1"
    ),
    array(
        "valor" => 2,
        "literal" => "Opcion 2"
    ),
    array(
        "valor" => 3,
        "literal" => "Opcion 3"
    ),
    array(
        "valor" => 4,
        "literal" => "Opcion 4"
    )
);
$aGenero = array("Hombre", "Mujer", "Otro");

$lprocesaFormulario = FALSE;
$lerror = FALSE;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lprocesaFormulario = TRUE;

    if (empty($_POST['name'])) {
        $nameErr = "Name is required";
        $lerror = true;
    } else {
        $name = clearData($_POST['name']);
    }

    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
        $lerror = true;
    } else {
        $email = clearData($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Formato de EMAIL incorrecto";
            $lerror = true;
        };
    }

    $website = clearData($_POST['website']);
    if (!filter_var($website, FILTER_VALIDATE_URL)) {
        $websiteErr = "Formato de URL incorrecto";
        $lerror = true;
    };

    $comment = clearData($_POST['comment']);
    // if (strlen($comment) < 3){
    //     $commentErr = "Comentario debe ser mayor que"
    // };

    if (empty($_POST['gender'])) {
        $genderErr = "Gender is required";
        $lerror = true;
    } else {
        //Aquí el usuario no escribe, es algo predefinido
        $gender = clearData($_POST["gender"]);
    }

    if (isset($_POST['vehicle'])) {
        $aVehiculosSeleccionados = $_POST['vehicle'];
    }

    if (isset($_POST['combo'])) {
        $opcionSeleccionada = $_POST['combo'];
    }

    if (isset($_POST['cars'])) {
        $carsSeleccionados = $_POST['cars'];
    }
};
if ($lerror) {
    $lprocesaFormulario = FALSE;
}

?>
<!DOCTYPE HTML>
<html lang="es">

<head>
    <style>
        .error {
            color: "red";
        }
    </style>
</head>

<body>

</html>

<?php
if (!$lprocesaFormulario) { ?>
    <h1>Validación formulario. PHP</h1>
    <p><span class="error">* Campos requeridos..</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nombre:<input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error">*<?php echo $nameErr; ?></span><br /><br />
        email: <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error">* <?php echo $emailErr; ?></span><br /><br />
        URL: <input type="text" name="website" value="<?php echo $website; ?>">
        <span class="error"><?php echo $websiteErr; ?></span><br /><br />
        Commentario:<br />
        <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea><br /><br />
        Género:
        <?php
        foreach ($aGenero as $clave => $valor) {
            $check = "";
            if ($gender == $valor) {
                $check = "checked";
            }
            echo "<input type=\"radio\" name=\"gender\" value = \"$valor\" $check>$valor";
        }
        echo "<span class=\"error\">* $genderErr</span><br/><br/>";
        ?>
        Transporte:<br />
        <?php
        foreach ($aVehiculos as $valor) {
            $selected = (in_array($valor, $aVehiculosSeleccionados)) ? 'checked' : '';
            echo "<input type =\"checkbox\" name=\"vehicle[]\" value = \"" . $valor . "\" $selected >" . $valor;
        }
        ?>
        <br /><br />
        Selecciona opción:
        <select name="combo">
            <?php
            foreach ($aOpciones as $valor) {
                $selected = ($opcionSeleccionada == $valor['valor']) ? 'selected' : '';
                echo "<option value = \"" . $valor['valor'] . "\" $selected >" . $valor['literal'] . "</option>";
            }
            ?>
        </select><br /><br />
        Selección de vehículos (múltiple):<br />
        <select multiple name="cars[]">
            <?php
            foreach ($cars as $valor) {
                $selected = (in_array($valor, $carsSeleccionados)) ? 'selected' : '';
                echo "<option value = \"" . $valor . "\" $selected >" . $valor . "</option>";
            }
            ?>
        </select><br /><br />
        <input type="submit" name="submit" value="Submit"><br /><br />
    </form>
<?php
} // Procesa Formulario
else {
    echo "<h1>Your Input:</h1>";
    echo $name;
    echo "<br/>";
    echo $email;
    echo "<br/>";
    echo $website;
    echo "<br/>";
    echo $comment;
    echo "<br/>";
    echo $gender;
    echo "<br/>";
    //Bucle para vehículos seleccionados.
    foreach ($aVehiculosSeleccionados as $elemento) {
        echo $elemento . "<br/>";
    }

    echo $opcionSeleccionada;
    echo "<br/>";

    //Bucle para coches seleccionados.
    foreach ($carsSeleccionados as $elemento) {
        echo $elemento . "<br/>";
    }
}

function clearData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};