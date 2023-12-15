<?php
namespace Api
{
    spl_autoload_register();
    use Core\Misc\HttpMethod;
    use Core\Router;
    use Core\Logger;
    use Core\Misc\HttpHeaderCode;
    use Core\Misc\LoggerLevel;
    use Exception;
    use Configuration\Configuration;
    
    //
    //MAIN ENTER POINT
    //
    Api::Run();
    
    class Api
    {
        public static Configuration $Configuration;

        public static function Run()
        { 
            try
            {
                Api::$Configuration = new Configuration();
                if(isset(Api::$Configuration->log_level) && isset(Api::$Configuration))
                    switch(Api::$Configuration->log_level)
                    {
                        case 'trace': Logger::changeMode(LoggerLevel::TRACE);break;
                        case 'debug': Logger::changeMode(LoggerLevel::DEBUG);break;
                        case 'fatal': Logger::changeMode(LoggerLevel::FATAL);break;
                        case 'error': Logger::changeMode(LoggerLevel::ERROR);break;
                        case 'warn': Logger::changeMode(LoggerLevel::WARN);break;
                        case 'info': Logger::changeMode(LoggerLevel::INFO);break;
                    }
                else Logger::changeMode(LoggerLevel::TRACE);
                Logger::info(__CLASS__, __FUNCTION__);
                HttpHeaderCode::registerData();
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
            catch(Exception $ex)
            {
                Logger::fatal(__CLASS__, $ex->getMessage());
                header(HttpHeaderCode::getHeader(500));
            }
        }
    }
}
?>