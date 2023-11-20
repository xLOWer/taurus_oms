<?php namespace TaurusOmsApi\Core
{
	use Attribute;
	use Exception;
	
	#[Attribute(Attribute::TARGET_CLASS)]
	class TableName
	{
		public function __construct(public ?string $tableName = null) { }
	}
	
	#[Attribute(Attribute::TARGET_PROPERTY)]
	class EntityId
	{
		public function __construct() { }
	}
	
	#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
	class LinkedEntity
	{
		public function __construct() { }
	}
	
	#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
	class EntityInvisible
	{
		public function __construct() { }
	}
	
	class ErrorHandler
	{
		private $_msg = '';
		private $_code = '';
		private $_file = '';
		private $_line = '';
		private $_tace = '';
		private Exception $_ex;
		private $_err = [];
	
		function __construct(Exception $exception)
		{
			$this->_ex = $exception;
			
			$this->_msg = $this->_ex->getMessage();
			$this->_code = $this->_ex->getCode();
			$this->_file = $this->_ex->getFile();
			$this->_line = $this->_ex->getLine();
			$this->_tace = $this->_ex->getTrace();
		}
	
		public function getMessage()
		{
			$this->_err['msg'] = $this->_msg;
			$this->_err['code'] = $this->_code;
			$this->_err['file'] = $this->_file;
			$this->_err['line'] = $this->_line;
			$this->_err['trace'] = $this->_tace;
			
			return $this->_err;
		}
	
		public static function getError(Exception $exception)
		{
			$hndl = new ErrorHandler($exception);
			return $hndl->getMessage();
		}
	}
}
?>