<?php

$table = "config";

function get()
{
    global $db;
    global $table;
    $result = $db->select_one("select * from $table");
    return json_encode(array(
        'result' => $result,
    ));
}

function update(){
    global $db;
    global $table;
    $id = $_POST['id'];
    $data = array(
        'day_rank_count' => $_POST['day_rank_count'],
        'total_rank_count' => $_POST['total_rank_count'],
        'part_spell_proportion' => $_POST['part_spell_proportion'],
    );
    $query = "id='$id'";
    $result = $db->update($data, $table, $query);
    $success = $result;
    return json_encode(array(
        'success' => $success,
    ));
}