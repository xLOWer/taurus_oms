<?php
namespace Controllers
{
    use Core\Router;
    use Core\Misc\Pagination;
    use Controllers\IController;
    use Core\Misc\HttpMethod;
    

    /**
     * @template T
     */
    class BaseController implements IController
    {
        public function __construct() 
        {
            /*
            $this->router = $router;
            switch($this->router->getCurrentMethod())
            {
                case HttpMethod::GET: 
                    $this->All();
                    break;

                case HttpMethod::POST: 
                    $this->New();
                    break;

                case HttpMethod::PUT: 
                    $this->Update($id);
                    break;

                case HttpMethod::DELETE: 
                    $this->Delete();
                    break;
            }
            */
        }

        public function All() : string // get
        {
            return "Base All";
        }

        public function New() : string // post
        {
            $id = random_int(1, 50);
            echo 'Base New id='.$id;
            return $id;
        }

        public function Update(string $id) : bool // put
        {
            echo 'Base Update id='.$id;
            return false;
        }

        public function Delete(string $id) : bool // delete
        {
            echo 'Base Delete id='.$id;
            return false;
        }

        public function Page(int $page, Pagination $p) : string // get
        {            
            $output = 'Base Page '.$page.' (by ';
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