<?php
namespace TaurusOmsApi
{
    use TaurusOmsApi\UserController;
    
    class Router
    {
        public string $_currentRoute = '';
        public string $_currentMethod = '';
        public Array $_currentFormData = [];
        public Array $_currentUrlData = [];

        private Array $_routesList = [];

        /**
         * @param Route $route
         * @param string $method
         * @param Array|string $formData
         * @param Array|string $urlData
         */
        public function __construct($route, $method, $formData, $urlData)
        {        
            $this->_currentRoute = $route;
            $this->_currentMethod = $method;
            $this->_currentFormData = $formData;
            $this->_currentUrlData = $urlData;
            $this
                ->Add('users', new UserController($this));
            return $this;
        }  
        
        public function Add($route, $callback): self
        {            
            //$this->_routesList['route'] = $route;
            $this->_routesList[$route]['callback'] = $callback;
            return $this;
        }
        
        static function getFormData($method) 
        {
            // GET или POST: данные возвращаем как есть
            if ($method === 'GET') return $_GET;
            if ($method === 'POST') return $_POST;
        
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