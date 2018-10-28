<?php

$table = "word_book";
$english_table = "english";

function get()
{
    global $db;
    global $table;
    global $english_table;
    $result = $db->select_all("select * from $table");

    foreach ($result as $k => $v) {
        $id = $v['id'];
        $query = "word_book_id='$id'";
        $result[$k]['count'] = $db->get_total_rows($english_table,$query);
    }

    return json_encode(array(
        'result' => $result,
    ));
}

function add()
{
    global $db;
    global $table;
    $data = array(
        'title' => $_POST['title'],
    );
    $result = $db->insert($data, $table);
    $success = $result;
    return json_encode(array(
        'success' => $success,
    ));
}

function delete()
{
    global $db;
    global $table;
    $id = $_POST['id'];
    $query = "id='$id'";
    $db->delete($english_table, "word_book_id='$id'");
    $result = $db->delete($table, $query);
    $success = $result;
    return json_encode(array(
        'success' => $success,
    ));
}

function update()
{
    global $db;
    global $table;
    $id = $_POST['id'];
    $data = array(
        'title' => $_POST['title'],
    );
    $query = "id='$id'";
    $result = $db->update($data, $table, $query);
    $success = $result;
    return json_encode(array(
        'success' => $success,
    ));
}
