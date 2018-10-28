<?php
$table = 'admin';
function login()
{
    global $db;
    global $table;
    $name = $_POST['user']['name'];
    $pass = $_POST['user']['pass'];
    $query = "select * from $table where name='$name'";
    $result = $db->select_one($query);
    $success = false;
    $msg = "登录成功";
    if ($result['pass'] === $pass) {
        $success = true;
    } else {
        $msg = $result ? "密码错误！" : "没有此用户！";
    }
    return json_encode(array(
        'success' => $success,
        'msg' => $msg,
    ));
}
