<?php
header('Content-Type: application/json; charset=utf-8');
// проверка был ли токен и валиден ли он
require_once("../model/client.php");
require_once("../core/mysql_core.php");
$list = [];
$mysql = new Mysql_core();
$list = $mysql->GetEntityList(new ReflectionClass("Client"));
echo json_encode($list, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
?>