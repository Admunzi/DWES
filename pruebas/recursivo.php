<?php

function fibonacci($n){
    if ($n == 1 || $n == 2) {
        return 1;
    }else{
        return fibonacci($n-1)+ fibonacci($n-2);
    }
}

$sacarPrimeros= 10;
for ($i=1; $i < $sacarPrimeros+1; $i++) { 
    echo (fibonacci($i)."<br>");
}
echo ("<br>".fibonacci(10));