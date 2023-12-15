<?php
namespace Controllers
{

    use Core\Database\DatabaseInterface;
    use Core\Misc\Pagination;

    interface IController
    {
        function get() : string;
        function post() : string;
        function put() : bool;
        function delete() : bool;
    }
}
?>