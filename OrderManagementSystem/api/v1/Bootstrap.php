<?php

require_once './core/Router.php';

// Разбираем url
$url = (isset($_GET['q'])) ? $_GET['q'] : '';
$url = rtrim($url, '/');
$urls = explode('/', $url);

new TaurusOmsApi\Router(
    $urls[0],
    $_SERVER['REQUEST_METHOD'],
    TaurusOmsApi\Router::getFormData($_SERVER['REQUEST_METHOD']),
    array_slice($urls, 1)
);
?>