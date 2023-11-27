<?php
namespace Controllers
{
    use Core\Router;
    use Core\Misc\Pagination;

    class UserController extends BaseController
    {
        public function __construct() 
        {
        }

        public function All() : string // get
        {
            return "User All";
        }

        public function New() : string // post
        {
            $id = random_int(1, 50);
            echo 'User New id='.$id;
            return $id;
        }

        public function Update(string $id) : bool // put
        {
            echo 'User Update id='.$id;
            return false;
        }

        public function Delete(string $id) : bool // delete
        {
            echo 'User Delete id='.$id;
            return false;
        }

        public function Page(int $page, Pagination $p) : string // get
        {            
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
            return "select * from users";
        }
    }
}
?>