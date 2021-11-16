<?php

if (isset($_COOKIE['contador'])) {
    setcookie('contador',$_COOKIE['contador']+1,time()+36000);
}else {
    setcookie('contador',1,time()+36000);
}
echo $_COOKIE['contador'];