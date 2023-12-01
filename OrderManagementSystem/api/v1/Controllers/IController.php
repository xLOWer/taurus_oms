<?php
namespace Controllers
{

    use Core\Database\DatabaseInterface;
    use Core\Misc\Pagination;

    interface IController
    {
        function get() : string;
        function getById() : string;
        function post() : string;
        function put() : bool;
        function delete() : bool;
        /**
         * @param Array $page
         * @param Pagination $pagination_type
         */
        function getOfPage(int $page, Pagination $pagination_type) : string;
    }
}
?>