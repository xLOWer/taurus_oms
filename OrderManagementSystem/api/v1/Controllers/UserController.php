<?php
namespace TaurusOmsApi
{
    use TaurusOmsApi\Router;

    class UserController
    {
        private Router $_router;

        public function __construct(Router $router) 
        {
            $this->_router = $router;
        }

        public function GetUsers()
        {
            echo 'GetUsers';
        }
        public function PostUsers()
        {
            echo 'PostUsers';
        }
        public function PutUsers()
        {
            echo 'PutUsers';
        }
        public function PatchUsers()
        {
            echo 'PatchUsers';
        }
        public function DeleteUsers()
        {
            echo 'DeleteUsers';
        }
    }
}
?>