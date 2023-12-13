<?php
namespace Controllers
{
    use Api\Api;
    use Configuration\Configuration;
    use Core\Router;
	use Core\Misc\Pagination;
	use Controllers\IController;
	use Core\Misc\HttpMethod;
	use Core\Database\DatabaseInterface;
    use Core\Logger;
    use Mapping\ObjectMap;

	class BaseController implements IController
	{
        protected DatabaseInterface $db;
		protected ObjectMap $Map;
		protected $_class;
		protected $Parameters;
		protected $Data;

		public function __construct() 
		{
            Logger::debug($this::class, 'Base __construct');
			$this->db = new DatabaseInterface(Api::$Configuration->sql_ip,
										Api::$Configuration->sql_login,
										Api::$Configuration->sql_pwd,
										Api::$Configuration->sql_db);
		}

		public function get() : string // get
		{
			Logger::info($this::class, 'Base get');            
            Logger::trace_json($this::class, $this->Parameters);
            if(isset($this->Parameters) && count($this->Parameters) >= 1)
            {
                Logger::trace($this::class, "get(item)");
				$sql = $this->Map->GetSelectItemTemplate($this->Parameters[0]);
                Logger::trace($this::class, $sql);
            }
            else
            {
                Logger::trace($this::class, "get(list)");
				$sql = $this->Map->SelectListTemplate;
                Logger::trace($this::class, $sql);
            }
			$data = $this->db->SelectQuery($sql);
			echo json_encode($data,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
			return "Base get";
		}

		public function getById() : string // get
		{
            Logger::info($this::class, 'Base getById');
			return "Base getById";
		}

		public function post() : string // post
		{
			$id = random_int(1, 50);
            Logger::info($this::class, 'Base post id='.$id);
			return $id;
		}

		public function put() : bool // put
		{
            Logger::info($this::class, 'Base put');
			return false;
		}

		public function delete() : bool // delete
		{
            Logger::info($this::class, 'Base delete');
			return false;
		}

		public function getOfPage(int $page, Pagination $p) : string // get
		{
            Logger::info($this::class, 'Base getOfPage');
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