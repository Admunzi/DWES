<?php
/**
*   Unidad 3 Act2 Formularios
*   Enunciado:
*       Formulario para crear un currículum que incluya: Campos de texto, grupo de botones de opción, casilla
*       de verificación, lista de selección única, lista de selección múltiple, botón de validación, botón de
*       imagen, botón de reset, etc.
*
*   @author Daniel Ayala Cantador
*   @date 25/10/2021
*/

var_dump($_POST);
?>

<form action="" method="post">

    <label>Nombre <input type="text" name="nombre"></label><br>

    <label>Apellidos <input type="text" name="apelllidos"></label><br>

    <label>Idiomas<br>
        <select multiple name="idiomas">
            <option value="Ingles">Ingles</option>
            <option value="Castellano">Castellano</option>
        </select>   
    </label><br>

    Masculino<input type="radio" name="genero" value="Masculino"><br>
    Femenino<input type="radio" name="genero" value="Femenino"><br>

    Lenguajes<br>
    CSS<input type="checkbox" name="css"><br>
    PHP<input type="checkbox" name="php"><br>


    Experiencia Profesional
    <textarea name="experiencia" rows="5" cols="40"></textarea>

    <input type="submit" value="Enviar">
    <input type="reset" value="Resetear">

</form>