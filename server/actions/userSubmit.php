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
    $result = $db->insert($data, $table);
    $success = $result;
    return json_encode(array(
        'success' => $success,
    ));
}
