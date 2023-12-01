<?php
namespace Core
{
    use Core\Misc\HttpMethod;
    use Controllers\AddressController;
    use Controllers\CachOperationController;
    use Controllers\CheckController;
    use Controllers\ClientController;
    use Controllers\DeviceController;
    use Controllers\DeviceTypeController;
    use Controllers\OrderController;
    use Controllers\PhoneController;
    use Controllers\PrivGroupController;
    use Controllers\PrivilegesController;
    use Controllers\ServiceController;
    use Controllers\ServiceGroupController;
    use Controllers\UserController;
    use ReflectionClass;
    use Core\Route;
    use Core\Logger;

    class Router
    {
        private Array $_routesList = [];
        public static bool $DebugMode = true;

        public function __construct()
        {
            Logger::debug($this::class.' __construct');
            $this->RegisterControllers();
        }

        function notFound() 
        {
            Logger::debug($this::class.' notFound');
            header("HTTP/1.0 404 Not Found");
            return 'Нет такой страницы';
        }

        public function get($route, $formData, $urlData)
        {
            Logger::debug($this::class.' get('.$route.')');
            $method = $this->getMethod($route);
            Logger::dump($method);
            $ReflectionClass = new ReflectionClass(UserController::class);
            Logger::dump($ReflectionClass);
            $newInstance = $ReflectionClass->newInstance();
            Logger::dump($newInstance);
            $initInstance = $newInstance();
            Logger::dump($initInstance);
            //$newInstance->$method();
            return $this;
        }

        public function post($route, $formData, $urlData)
        {
            Logger::debug($this::class.' post('.$route.')');
            return $this;
        }

        public function put($route, $formData, $urlData)
        {
            Logger::debug($this::class.' put('.$route.')');
            return $this;
        }

        public function delete($route, $formData, $urlData)
        {
            Logger::debug($this::class.' delete('.$route.')');
            return $this;
        }

        private function RegisterControllers()
        {
            Logger::debug($this::class.' RegisterControllers');
            $this->_routesList []= new Route('users','get','get', UserController::class);
            $this->_routesList []= new Route('users','get','getById', UserController::class);
            Logger::debug($this::class.' RegisterControllers registred: '.count($this->_routesList).' route(s)');
        }

        private function getMethod($path)
        {
            foreach ($this->_routesList as $route) 
            {
                Logger::debug($this::class.' getMethod('.$path.')');
                // если маршрут сопадает с путем, возвращаем функцию
                if ($path === $route) 
                {                    
                    return $route->Method;
                }
            }
            return http_response_code(404);
        }
        
        /**
         * @param HttpMethod $method
        */
        static function getFormData($method) 
        {
            Logger::debug(Router::class.' getFormData');
            switch($method)
            {
                case HttpMethod::GET: return $_GET; break;
                case HttpMethod::POST: return $_POST; break;
            }
        
            // PUT, PATCH или DELETE
            $data = array();
            $exploded = explode('&', file_get_contents('php://input'));
        
            foreach($exploded as $pair) {
                $item = explode('=', $pair);
                if (count($item) == 2) {
                    $data[urldecode($item[0])] = urldecode($item[1]);
                }
            }
        
            return $data;
        }
    }
}
?>