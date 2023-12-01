<?php
namespace Core\Database
{
	use mysqli;
	use Exception;

	class DatabaseInterface extends mysqli
	{
	private $connection;

	public function __construct($sql_ip = null, $sql_login = null, $sql_pwd = null, $sql_db = null)
	{
		$this->connection = new mysqli($sql_ip, $sql_login, $sql_pwd, $sql_db);
		if ($this->connection->connect_error)
		{
			throw new Exception("Ошибка подключения к базе данных: " . $this->connection->connect_error);
		}
		mysqli_set_charset($this->connection, "utf8mb4");
		return $this->connection;
	}

	public function SelectQuery($select_sql)
	{
		$outputData = [];
		if ($this->connection->connect_error)
		{
			throw new Exception("Ошибка подключения к базе данных: " . $this->connection->connect_error);
		}
		else
		{
		if($result = $this->connection->query($select_sql))
		{
			$outputData = $result;
		}
		else
		{
			throw new Exception("Ошибка: " . $this->connection->error);
		}
		}
		$this->connection->close();
		return $outputData;
	}

	public function UpdateQuery()
	{

	}

	public function DeleteQuery()
	{

	}        

	}
}
?>