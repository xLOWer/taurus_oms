<?php
header('Content-Type: application/json; charset=utf-8');
// проверка был ли токен и валиден ли он
require_once("../model/user.php");
require_once("../core/mysql_core.php");

$mysql;
$output = [];
$output['data'] = '';
$output['response'] = 'ok';
try
{
    $mysql = new Mysql_core();
    $output['data'] = $mysql->GetEntityList(new ReflectionClass("User"), 0);
}
catch(Exception $ex)
{
    $output['response'] = 'error';
    $output['data'] = ErrorHandler::getError($ex);
}
finally
{
    echo json_encode($output, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
?>