<?php
$array="Moscow";
$hash="M";
if (strrpos($array, $hash)!==false)
{
    echo "ключ найден";
}
else {
    echo "ключ не найден";
}
//echo stristr($array, 'o');
//var_dump($array);