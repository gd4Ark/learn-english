<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019\1\14 0014
 * Time: 18:13
 */


function numberFormat($num){
    return $num > 9 ? $num : '0' . $num;
}

function timeFormat($time){
    $m = floor($time / 60);
    $s = $time % 60;
    return numberFormat($m) . ':' . numberFormat($s);
}

/**
 * 多个连续空格只保留一个
 *
 * @param string $string 待转换的字符串
 * @return unknown
 */
function merge_spaces( $string ){
    return preg_replace ( "/\s(?=\s)/","\\1", $string );
}