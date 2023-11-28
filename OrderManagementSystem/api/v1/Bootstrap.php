<?php
namespace api
{
    spl_autoload_register();

    use Core\Misc\HttpMethod;
    use Core\Router;
    
    $url = (isset($_GET['q'])) ? $_GET['q'] : '';
    $url = rtrim($url, '/');
    $urls = explode('/', $url);
    $method = HttpMethod::GET;
    
    switch($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':     $method = HttpMethod::GET;      break;
        case 'POST':    $method = HttpMethod::POST;     break;
        case 'PUT':     $method = HttpMethod::PUT;      break;
        case 'DELETE':  $method = HttpMethod::DELETE;   break;
    }

    new Router(
        $urls[0],
        $_SERVER['REQUEST_METHOD'],
        Router::getFormData($_SERVER['REQUEST_METHOD']),
        array_slice($urls, 1)
    );
}
?>