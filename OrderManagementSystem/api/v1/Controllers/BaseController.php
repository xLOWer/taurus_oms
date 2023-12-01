<?php
namespace Controllers
{
	use Core\Router;
	use Core\Misc\Pagination;
	use Controllers\IController;
	use Core\Misc\HttpMethod;
	use Core\Database\DatabaseInterface;
    use Core\Logger;

	class BaseController implements IController
	{
		public string $id_name;
		public string $select_template;
		public string $where_template;
        public DatabaseInterface $db;

		public function __construct() 
		{
            Logger::debug($this::class.' __construct');
			$db = new DatabaseInterface();
		}

		public function get() : string // get
		{
            Logger::debug($this::class.' get');
			return "Base get";
		}

		public function getById() : string // get
		{
            Logger::debug($this::class.' getById');
			return "Base getById";
		}

		public function post() : string // post
		{
			$id = random_int(1, 50);
            Logger::debug($this::class.' post id='.$id);
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
			$output = 'Base getOfPage '.$page.' (by ';
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