<?php
namespace Core
{
    /*
    example for users:
    GET
    1) /users           - get all users
    2) /users/{id}      - get one user by id
    3) /users/page/50/2 - get 2-nd page by 50 items per page
    POST
    1) /users           - add new user (data in json body of request)
    DELETE
    1) /users/{id}      - delete user by id
    PUT
    1) /users/{id}      - edit user by id (data in json body of request)
    */
    use Core\Misc\HttpMethod;
    use Controllers\UserController;
    use Controllers\IController;

    class Router
    {
        private string $_currentRoute = '';
        private HttpMethod $_currentMethod = HttpMethod::GET;
        private Array $_currentFormData = [];
        private Array $_currentUrlData = [];
        private Array $_routesList = [];

        protected UserController $userController;

        private function RegisterControllers()
        {
            $this->userController = new UserController();
        }
        /**
         * @param Route $route
         * @param HttpMethod $method
         * @param Array|string $formData
         * @param Array|string $urlData
         */
        public function __construct($route, $method, $formData, $urlData)
        {
            
            $this->_currentRoute = $route;
            $this->_currentMethod = $method;
            $this->_currentFormData = $formData;
            $this->_currentUrlData = $urlData;
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

        public function getCurrentMethod()
        {
            return $this->_currentMethod;
        }

        public function getCurrentUrlData()
        {
            return $this->_currentUrlData;
        }

        public function getCurrentRoute()
        {
            return $this->_currentRoute;
        }

        public function getCurrentFormData()
        {
            return $this->_currentFormData;
        }
    }
}
?>