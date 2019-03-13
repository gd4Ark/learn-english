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

function sortRank($data){
    $position = 0;
    foreach($data as $key=>$value){
        $time = $data[$key]['time'];
        $data[$key]['time'] = timeFormat($time);
        if ($key === 0){
            $data[$key]['position'] = ++$position;
        }else{
            $before = $data[$key - 1];
            if ($before['time'] === $data[$key]['time']){
                $data[$key]['position'] = $position;
            }else{
                $data[$key]['position'] = ++$position;
            }
        }
        $data[$key]['position'] = numberFormat($data[$key]['position']);
    }
    return $data;
}