<?php
namespace api
{
    spl_autoload_register();

    use Core\Misc\HttpMethod;
    use Core\Router;
    use Core\Logger;

    Api::Run();
    
    class Api
    {
        public static function Run()
        {
            //Logger::offDebug();
            Logger::debug(Api::class.' Run');
            $router = new Router();
            $url = (isset($_GET['q'])) ? $_GET['q'] : '';
            $url = rtrim($url, '/');
            $urls = explode('/', $url);
            
            switch($_SERVER['REQUEST_METHOD'])
            {
                case 'GET':     
                    $router->get($urls[0], Router::getFormData(HttpMethod::GET), array_slice($urls, 1));
                    break;
                case 'POST':
                    $router->post($urls[0], Router::getFormData(HttpMethod::POST), array_slice($urls, 1));
                    break;
                case 'PUT':
                    $router->put($urls[0], Router::getFormData(HttpMethod::PUT), array_slice($urls, 1));
                    break;
                case 'DELETE':  
                    $router->delete($urls[0], Router::getFormData(HttpMethod::DELETE), array_slice($urls, 1));
                    break;
            }
        }
    }
}
?>