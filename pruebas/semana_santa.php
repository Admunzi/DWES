<?php

// echo (date("j-n-Y", easter_date(2001))."<br>");
// echo easter_days(2021);
// $fecha = "1-6-2019";

$fecha = new DateTime(date("j-n-Y", easter_date(2019)));
$fecha->sub(new DateInterval('P4D'));
echo $fecha->format('Y-m-d') . "\n";
?>