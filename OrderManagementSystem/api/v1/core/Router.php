<?php
namespace Core
{
    use ReflectionClass;
    use Controllers\AddressController;
    use Controllers\CashOperationController;
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
    use Core\Route;
    use Core\Logger;
    use Core\Misc\HttpMethod;

    class Router
    {
        private Array $_routesList = [];
        public static bool $DebugMode = true;

        public function __construct()
        {
            Logger::debug(__CLASS__, __FUNCTION__);
            $this->RegisterControllers();
        }

        public function get($route, $formData, $urlData)
        {
            Logger::info(__CLASS__, __FUNCTION__);
            Logger::trace_json(__CLASS__, [$route,$formData,$urlData]);

            $currentRoute = '';
            
            foreach ($this->_routesList as $r) 
            {
                if($r->Route == $route and $r->Method == HttpMethod::GET)
                {
                    $currentRoute = $r;
                }
            }
            $ReflectionClass = new ReflectionClass($currentRoute->Controller);
            $newInstance = $ReflectionClass->newInstance($urlData, $formData);
            $func = $currentRoute->Function; // определить метод который указан в регистрации
            echo $newInstance->$func(); // вызвать метод
        }

        public function post($route, $formData, $urlData)
        {
            Logger::info(__CLASS__, __FUNCTION__);
            return $this;
        }

        public function put($route, $formData, $urlData)
        {
            Logger::info(__CLASS__, __FUNCTION__);
            return $this;
        }

        public function delete($route, $formData, $urlData)
        {
            Logger::info(__CLASS__, __FUNCTION__);
            return $this;
        }

        private function RegisterControllers()
        {
            Logger::trace(__CLASS__, __FUNCTION__);
            $this->_routesList []= new Route('addresses',       HttpMethod::GET, 'get', AddressController::class);
            $this->_routesList []= new Route('cashoperations',  HttpMethod::GET, 'get', CashOperationController::class);
            $this->_routesList []= new Route('checks',          HttpMethod::GET, 'get', CheckController::class);
            $this->_routesList []= new Route('clients',         HttpMethod::GET, 'get', ClientController::class);
            $this->_routesList []= new Route('devices',         HttpMethod::GET, 'get', DeviceController::class);
            $this->_routesList []= new Route('devicetypes',     HttpMethod::GET, 'get', DeviceTypeController::class);
            $this->_routesList []= new Route('orders',          HttpMethod::GET, 'get', OrderController::class);
            $this->_routesList []= new Route('phones',          HttpMethod::GET, 'get', PhoneController::class);
            $this->_routesList []= new Route('privgroups',      HttpMethod::GET, 'get', PrivGroupController::class);
            $this->_routesList []= new Route('privileges',      HttpMethod::GET, 'get', PrivilegesController::class);
            $this->_routesList []= new Route('services',        HttpMethod::GET, 'get', ServiceController::class);
            $this->_routesList []= new Route('servicegroups',   HttpMethod::GET, 'get', ServiceGroupController::class);            
            $this->_routesList []= new Route('users',           HttpMethod::GET, 'get', UserController::class);

            Logger::trace(__CLASS__, 'RegisterControllers registred: '.count($this->_routesList).' route(s)');
        }

        private function getMethod($path)
        {
            Logger::trace(__CLASS__, __FUNCTION__);
            Logger::trace_json(__CLASS__, [$path]);
            foreach ($this->_routesList as $route) 
            {
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
            Logger::trace(__CLASS__, __FUNCTION__);
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