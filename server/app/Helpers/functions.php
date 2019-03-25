<?php

function numberFormat($num){
    return $num > 9 ? $num : '0' . $num;
}

function timeFormat($time){
    $m = floor($time / 60);
    $s = $time % 60;
    return numberFormat($m) . ':' . numberFormat($s);
}

function merge_spaces( $string ){
    return preg_replace ( "/\s(?=\s)/","\\1", $string );
}