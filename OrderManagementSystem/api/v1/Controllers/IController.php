<?php
namespace Controllers
{
    use Core\Router;
    use Core\Misc\Pagination;

    interface IController
    {
        //public Router $router;
        public function All() : string;
        public function New() : string;
        public function Update(string $id) : bool;
        public function Delete(string $id) : bool;
        /**
         * @param Array $page
         * @param Pagination $pagination_type
         */
        public function Page(int $page, Pagination $pagination_type) : string;
    }
}
?>