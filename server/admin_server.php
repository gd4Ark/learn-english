<?php

$dir = dirname(__DIR__) . '/server';
include_once $dir . "/common/common.php";

switch ($act) {
    case "wordBookList":
        include_once $dir . "/actions/wordBookList.php";
        break;
    case "wordBook":
        include_once $dir . "/actions/wordBook.php";
        break;
    case "admin":
        include_once $dir . "/actions/admin.php";
        break;
    case "setting":
        include_once $dir . "/actions/setting.php";
        break;
}

// GET

function act_get()
{
    return get();
}

if (isset($_GET['act'])) {
    echo act_get();
    exit;
}

// POST

function act_post()
{
    $fn = $_POST['api'];
    if ($fn === 'add') {
        return add();
    } else if ($fn === 'delete') {
        return delete();
    } else if ($fn === 'update') {
        return update();
    } else if ($fn === 'login') {
        return login();
    }
}

if (isset($_POST['act'])) {
    echo act_post();
    exit;
}
