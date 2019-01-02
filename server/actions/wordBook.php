<?php
$table = "word_book";
$english_table = "english";
function get()
{
    global $db;
    global $table;
    global $english_table;
    $id = $_GET['id'];
    $id = htmlspecialchars($id);
    $query = "select * from $table where id='$id'";
    $result = $db->select_one($query);
    $condition = "word_book_id='$id'";
    $query2 = "select * from $english_table where $condition";
    $result['list'] = $db->select_all($query2);
    $result['count'] = $db->get_total_rows($english_table, $condition);
    return json_encode(array(
        'result' => $result,
    ));
}

function add()
{
    global $db;
    global $english_table;
    $id = $_POST['id'];
    $id = htmlspecialchars($id);
    $arr = explode("\n", $englishs);
    $len = count($arr);
    $count = 0;
    foreach ($arr as $v) {
        $_v = explode("=", $v);
        $data = array(
            'word_book_id' => $id,
            'english' => trim($_v[0]),
            'chinese' => trim($_v[1]),
        );
        $result = $db->insert($data, $english_table);
        $count += $result !== false ? 1 : 0;
    }
    return json_encode(array(
        'len' => $len,
        'count' => $count,
    ));
}

function delete()
{
    global $db;
    global $english_table;
    $ids = $_POST['ids'];
    $len = count($ids);
    $count = 0;
    foreach ($ids as $id) {
        $query = "id='$id'";
        $result = $db->delete($english_table, $query);
        $count += $result !== false ? 1 : 0;
    }
    return json_encode(array(
        'len' => $len,
        'count' => $count,
    ));
}

function update()
{
    global $db;
    global $english_table;
    $id = $_POST['id'];
    $id = htmlspecialchars($id);
    $data = array(
        'english' => $_POST['english'],
        'chinese' => $_POST['chinese'],
    );
    $query = "id='$id'";
    $result = $db->update($data, $english_table, $query);
    $success = $result;
    return json_encode(array(
        'success' => $success,
    ));
}
