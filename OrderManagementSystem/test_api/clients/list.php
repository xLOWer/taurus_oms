<?php
namespace TaurusOmsApi
{
    use TaurusOmsApi\Core;

    header('Content-Type: application/json; charset=utf-8');
    // проверка был ли токен и валиден ли он
    $list = [];
    $mysql = new Mysql_core();
    $list = $mysql->GetEntityList(new ReflectionClass("Client"));
    echo json_encode($list, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
?>