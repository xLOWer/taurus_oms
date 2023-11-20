<?php 
namespace TaurusOmsApi\Core\EntityFramework
{
    use ReflectionClass;
    use mysqli;
    use Exception;
    use TaurusOmsApi\Core\Configuration;
    

    class EntityFramework
    {
        private mysqli $connection;

        public function __construct(mysqli $connection = null) 
        {            
            $conf = new Configuration("../config.json");
            if($connection == null)
            {
                $this->connection = new mysqli($conf->sql_ip, $conf->sql_login, $conf->sql_pwd, $conf->sql_db);
            }
            else
            {
                $this->connection = $connection;
            }

        }

        public function UpdateEntityById(ReflectionClass $reflectionClass, string $id){}
        public function DeleteEntityById(ReflectionClass $reflectionClass, string $id){}
        public function EntityById(ReflectionClass $reflectionClass, string $id){}

        public function GetEntityById(ReflectionClass $reflectionClass, string $id)
        {
            $result = $reflectionClass->newInstance();
            $sql = $this->connection->getSelectSql($reflectionClass, $id);
            print_r($sql);
            return $result;
        }

        public function GetEntityList(ReflectionClass $reflectionClass)
        {
            $list = [];
            if ($this->connection->connect_error)
            {
                throw new Exception("<br><br>Connection failed: " . $this->connection->connect_error);
            }
            else
            {
                $sql = $this->connection->getSelectSql($reflectionClass);
                //print_r($sql."\r\n");
                if($result = $this->connection->query($sql))
                {
                    $list = $this->constructEntityByQueryResult($result, $reflectionClass);
                }
                else
                {
                    throw new Exception("<br><br>Ошибка: " . $this->connection->error);
                }
            }
            $this->connection->close();
            return $list;
        }

        public static function constructEntityByQueryResult(object $result, ReflectionClass $reflectionClass)
        {
            $list = [];
            $reflectionProperties = $reflectionClass->getProperties();
            $reset_flag = false;
            while($row = $result->fetch_array())
            {
                $item = $reflectionClass->newInstance();
                foreach ($reflectionProperties as $refProp) 
                {
                    $reset_flag = false;
                    foreach ($refProp->getAttributes() as $attr)
                    {
                        if(get_class($attr->newInstance()) == 'LinkedEntity')
                        {
                            $reset_flag = true;
                        }
                    }
                    if(!$reset_flag)
                    {
                        $fieldName = $refProp->getName();
                        $item->$fieldName = $row[$fieldName];
                        //print_r($refProp->getName()."\r\n");
                    }
                }
                $list []= $item;
            }
            return $list;
        }

    }
} 
?>