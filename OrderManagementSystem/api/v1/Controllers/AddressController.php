<?php
namespace Controllers
{
    use Core\Router;
    use Core\Misc\Pagination;

    class AddressController extends BaseController
    {
        public function __construct() 
        {
        }

        public function All() : string // get
        {
            return "Address All";
        }

        public function New() : string // post
        {
            $id = random_int(1, 50);
            echo 'Address New id='.$id;
            return $id;
        }

        public function Update(string $id) : bool // put
        {
            echo 'Address Update id='.$id;
            return false;
        }

        public function Delete(string $id) : bool // delete
        {
            echo 'Address Delete id='.$id;
            return false;
        }

        public function Page(int $page, Pagination $p) : string // get
        {            
            $output = 'Address Page '.$page.' (by ';
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
            return "select * from addresses";
        }
    }
}
?>