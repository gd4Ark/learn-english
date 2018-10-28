<?php

$table = "score";

function get()
{
    return $_GET['api'] === 'day' ? getDayRank() : getTotalRank();
}

function getTotalRank()
{
    global $db;
    global $table;
    $id = $_GET['word_book_id'];
    $query = "select * from $table where word_book_id = '$id' order by time";
    $result = $db->select_all($query);
    return json_encode(array(
        'result' => $result,
    ));
}

function getDayRank()
{
    global $db;
    global $table;
    $id = $_GET['word_book_id'];
    $query = "select * from $table where word_book_id = '$id' and date(date) = curdate() order by time";
    $result = $db->select_all($query);
    return json_encode(array(
        'result' => $result,
    ));
}
