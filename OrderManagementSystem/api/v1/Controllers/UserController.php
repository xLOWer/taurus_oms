<?php
namespace Controllers
{
    use Core\Misc\Pagination;
    use Mapping\ObjectMap;
    use Core\Logger;
    use Model\User;

    class UserController extends BaseController
    {
        public function __construct($parameters, $data) 
        {            
            Logger::debug($this::class, '__construct');
            parent::__construct();
            $this->_class = User::class;
            $this->Parameters = $parameters;
            $this->Data = $data;
            $this->Map = new ObjectMap();
            $this->Map->SetMappingByClassName($this->_class);
        }

        public function get() : string // get
        {
            Logger::debug($this::class, 'get');
            parent::get();
            return "";
        }

        public function post() : string // post
        {
            $id = random_int(1, 50);
            Logger::debug( $this::class, 'post'.$id);
            return $id;
        }

        public function put() : bool // put
        {
            Logger::debug($this::class, 'put');
            return false;
        }

        public function delete() : bool // delete
        {
            Logger::debug($this::class, 'delete');
            return false;
        }

        public function getOfPage(int $page, Pagination $p) : string // get
        {            
            Logger::debug($this::class, 'getOfPage');
            $output = 'User Page '.$page.' (by ';
            switch($p)
            {
                case Pagination::By10PerPage: $output .= '10'; break;
                case Pagination::By50PerPage: $output .= '50'; break;
                case Pagination::By100PerPage: $output .= '100'; break;
            }
            return $output.' per page)';
        }
    }
}
?>