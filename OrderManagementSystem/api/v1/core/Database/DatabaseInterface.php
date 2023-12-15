<?php
namespace Core\Database
{
	use mysqli;
	use Exception;
	use Core\Logger;

	class DatabaseInterface extends mysqli
	{
	private $connection;

	public function __construct($sql_ip, $sql_login, $sql_pwd, $sql_db = null)
	{
		Logger::debug(__CLASS__, __FUNCTION__);
		Logger::debug_json(__CLASS__, $sql_ip);
		
		$this->connection = new mysqli($sql_ip, $sql_login, $sql_pwd, $sql_db);
		if ($this->connection->connect_error)
		{
			Logger::error(__CLASS__, $this->connection->connect_error);
			throw new Exception($this->connection->connect_error);
		}
		mysqli_set_charset($this->connection, "utf8mb4");
		return $this->connection;
	}

	public function SelectQuery(string $select_sql)
	{
		Logger::info(__CLASS__, __FUNCTION__);
		Logger::trace_json(__CLASS__, $select_sql);
		$outputData = [];
		if ($this->connection->connect_error)
		{
			Logger::error(__CLASS__, $this->connection->connect_error);
			throw new Exception($this->connection->connect_error);
		}
		else
		{
		if($result = $this->connection->query($select_sql))
		{
			if ($result->num_rows > 0) 
			{
				// output data of each row
				while($row = $result->fetch_assoc())
				{
					$outputData []= $row;
				}
			}
		}
		else
		{
			Logger::error(__CLASS__, $this->connection->error);
			throw new Exception($this->connection->error);
		}
		}
		$this->connection->close();
		return $outputData;
	}

	public function UpdateQuery(string $select_sql)
	{
		Logger::info(__CLASS__, __FUNCTION__);
		Logger::trace_json(__CLASS__, $select_sql);
	}

	public function DeleteQuery(string $select_sql)
	{
		Logger::info(__CLASS__, __FUNCTION__);
		Logger::trace_json(__CLASS__, $select_sql);
	}        

	}
}
?>