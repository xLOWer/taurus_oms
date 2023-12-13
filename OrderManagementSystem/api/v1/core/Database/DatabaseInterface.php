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
		Logger::debug($this::class, "__construct");
		Logger::debug($this::class, $sql_ip);
		
		$this->connection = new mysqli($sql_ip, $sql_login, $sql_pwd, $sql_db);
		if ($this->connection->connect_error)
		{
			$error = "Ошибка подключения к базе данных: " . $this->connection->connect_error;
			Logger::error($this::class, $error);
			throw new Exception($error);
		}
		mysqli_set_charset($this->connection, "utf8mb4");
		return $this->connection;
	}

	public function SelectQuery($select_sql)
	{
		Logger::info($this::class, "SelectQuery");
		Logger::trace($this::class, "SelectQuery(".$select_sql.")");
		$outputData = [];
		if ($this->connection->connect_error)
		{
			$error = "Ошибка подключения к базе данных: " . $this->connection->connect_error;
			Logger::error($this::class, $error);
			throw new Exception($error);
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
			$error = "Ошибка: " . $this->connection->error;
			Logger::error($this::class, $error);
			throw new Exception($error);
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