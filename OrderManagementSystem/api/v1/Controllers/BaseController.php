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
    use Core\Mapping\ObjectMap;

	class BaseController implements IController
	{
        protected DatabaseInterface $db;
		protected ObjectMap $Map;
		protected $_class;
		protected $Parameters;
		protected $Data;

		public function __construct() 
		{
            Logger::debug(__CLASS__, __FUNCTION__);
			$this->db = new DatabaseInterface(Api::$Configuration->sql_ip,
										Api::$Configuration->sql_login,
										Api::$Configuration->sql_pwd,
										Api::$Configuration->sql_db);
		}

		public function get() : string // get
		{
            Logger::trace_json(__CLASS__, $this->Parameters);
			$sql = '';
            if(isset($this->Parameters) && count($this->Parameters) >= 1)
            {
				$sql = $this->Map->GetSelectItemRequest($this->Parameters[0]);
            }
            else
            {
				$sql = $this->Map->SelectListTemplate;
            }
			Logger::trace(__CLASS__, $sql);
			$data = $this->db->SelectQuery($sql);
			return json_encode($data,JSON_UNESCAPED_UNICODE);
		}

		public function post() : string // post
		{
			return json_encode('',JSON_UNESCAPED_UNICODE);
		}

		public function put() : bool // put
		{
			return false;
		}

		public function delete() : bool // delete
		{
			return false;
		}

		public function getOfPage(int $page, Pagination $p) : string // get
		{
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