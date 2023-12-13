<?php
namespace Core
{
    use Core\Misc\HttpMethod;
    use Core\Logger;


    class Route
    {
        public string $Route;
        public HttpMethod $Method;
        public string $Function;
        public string $Controller;

        /**
         * @param string $route
         * @param HttpMethod $method
         * @param string $function
         * @param string $controller
         */
        public function __construct($route, $method, $function, $controller)
        {
            Logger::trace($this::class, "new Route(".$route.", ".$method->name.", ".$function.", ".$controller.")");
            $this->Route = $route;
            $this->Method = $method;
            $this->Function = $function;
            $this->Controller = $controller;
        }
    }
}
?>