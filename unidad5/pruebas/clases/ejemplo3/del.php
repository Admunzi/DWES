<?php
include "index.php";

$db = conectaDB();

$sql = "DELETE FROM superheroes WHERE id='".$_GET["id"]."';";
$db->query($sql);

header('Location: crud.php');
?>