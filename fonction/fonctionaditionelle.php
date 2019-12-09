<?php function formatdt($var){
    $dt = new DateTime($var);
    echo $dt->format('d-M-Y');
};?>