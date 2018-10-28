<?php
header("Content-type:text/html;charset=utf-8");
// header('content-type:application:json;charset=utf8');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:*');
header('Access-Control-Allow-Headers:x-requested-with,content-type');
// 没有请求具体 输出404状态码

if (!isset($_GET['act']) && !isset($_POST['act'])) {
    header('HTTP/1.1 404 Not Found');
    echo '404';
    exit;
}

include_once $dir . "/common/Mysql.php";
$config = include_once $dir . "/config/config.inc.php";
$db = new Mysql(
    $config['host'],
    $config['user'],
    $config['pass'],
    $config['charset'],
    $config['db']
);

$act = isset($_GET['act']) ? $_GET['act'] : $_POST['act'];
