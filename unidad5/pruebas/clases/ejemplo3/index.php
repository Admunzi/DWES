<?php
function conectaDB()
{
    try {
        //$dsn = "mysql:host=localhost;dbname=bd_superheroes";
        //$db =new PDO($dsn,'root', 'root');

        $db =new PDO("mysql:host=localhost;dbname=db_superheroes", "admin", "admin");
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND , 'SET NAMES utf8');
        return($db);
    } 
    catch (PDOException $e) {
        echo "Error conexión";
        exit();
    }
}
?>