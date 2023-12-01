<?php
namespace Controllers
{
    use Core\Misc\Pagination;
    use Core\Logger;

    class UserController extends BaseController
    {
        public function __construct() 
        {            
            Logger::debug($this::class.' __construct');
        }

        public function get() : string // get
        {
            Logger::debug($this::class.' Delete');
            return "";
        }

        public function post() : string // post
        {
            $id = random_int(1, 50);
            Logger::debug( $this::class.' post'.$id);
            return $id;
        }

        public function put() : bool // put
        {
            Logger::debug($this::class.' put');
            return false;
        }

        public function delete() : bool // delete
        {
            Logger::debug($this::class.' delete');
            return false;
        }

        public function getOfPage(int $page, Pagination $p) : string // get
        {            
            Logger::debug($this::class.' getOfPage');
            $output = 'User Page '.$page.' (by ';
            switch($p)
            {
                case Pagination::By10PerPage: $output .= '10'; break;
                case Pagination::By50PerPage: $output .= '50'; break;
                case Pagination::By100PerPage: $output .= '100'; break;
            }
            return $output.' per page)';
        }

        /**
         * @param Array $exclude_fields
         */
        private  function getSelectAll($exclude_fields = null)
        {
            Logger::debug(UserController::class.' getSelectAll');
            return "select * from users";
        }
    }
}
?>