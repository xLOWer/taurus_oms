<?php
namespace api;
spl_autoload_register();
use Core\Router;

// Разбираем url
$url = (isset($_GET['q'])) ? $_GET['q'] : '';
$url = rtrim($url, '/');
$urls = explode('/', $url);

new Router(
    $urls[0],
    $_SERVER['REQUEST_METHOD'],
    Router::getFormData($_SERVER['REQUEST_METHOD']),
    array_slice($urls, 1)
);
?>