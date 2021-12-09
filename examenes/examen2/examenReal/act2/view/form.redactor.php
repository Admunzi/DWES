<form action="" method="post">
    <label>Noticias
        <select name="selectNoticias">
            <?php
                foreach ($_SESSION['noticias'] as $key => $value) {
                    echo ("<option value=\"$key\">$key</option>");
                }
            ?>
        </select>
    </label>
    <br><br>
    <label>Nombre noticia:
        <input type="text" name="noticia">
    </label>  <br><br>
    <input type="submit" value="Enviar" name="enviarRedactor">
</form>