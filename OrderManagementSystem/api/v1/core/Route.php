<?php
namespace Core
{
    class Route
    {
        public string $Route;
        public string $Method;
        public string $Function;
        public string $Controller;

        /**
         * @param string $route
         * @param string $method
         * @param string $function
         * @param string $controller
         */
        public function __construct($route, $method, $function, $controller)
        {
            $this->Route = $route;
            $this->Method = $method;
            $this->Function = $function;
            $this->Controller = $controller;
        }
    }
}
?>