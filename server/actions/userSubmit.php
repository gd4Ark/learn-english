<?php

$table = 'score';

function submit()
{
    global $db;
    global $table;
    $data = array(
        'word_book_id' => $_POST['word_book_id'],
        'name' => $_POST['name'],
        'time' => $_POST['time'],
    );
    if (!$data['time']) {
        return;
    }
    $query = "select * from $table where name = '$data[name]' and word_book_id = $data[word_book_id]";
    $newScore = $db->select_all($query);
    if(!$newScore){
        return json_encode(array(
            'success' => $db->insert($data, $table),
        ));
    }else if($data['time'] < $newScore[0]['time']){
        $query = "name = '$data[name]' and word_book_id = $data[word_book_id]";
        return json_encode(array(
            'success' =>  $db->update($data,$table,$query),
        ));
    }else{
        return json_encode(array(
            'success' =>  1,
        ));
    }
}