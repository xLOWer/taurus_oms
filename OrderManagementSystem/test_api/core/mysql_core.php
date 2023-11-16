<?php
require_once("../conf.php");

class Mysql_core
{
    public ?mysqli $connection;

    public function __construct($sql_ip = null, $sql_login = null, $sql_pwd = null, $sql_db = null)
    {
        $conf = new ConfigLoader("../config.json");
        $this->connection = new mysqli($conf->sql_ip, $conf->sql_login, $conf->sql_pwd, $conf->sql_db);
        if ($this->connection->connect_error)
        {
            throw new Exception("<br><br>Connection failed: " . $this->connection->connect_error);
        }
        mysqli_set_charset($this->connection, "utf8mb4");
    }

    public function GetEntityById(ReflectionClass $reflectionClass, string $id)
    {
        $result = $reflectionClass->newInstance();
        $sql = $this->getSelectSql($reflectionClass, $id);
        print_r($sql);
        /*
        if ($this->connection->connect_error)
        {
            die("<br><br>Connection failed: " . $this->connection->connect_error);
        }
        else
        {
            $sql = $this->getSelectSql($reflectionClass, $id);
            if($result = $this->connection->query($sql))
            {
                $list = $this->constructEntityByQueryResult($result, $reflectionClass);
            }
            else
            {
                echo "<br><br>Ошибка: " . $this->connection->error;
            }
        }
        $this->connection->close();
        */
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
            $sql = $this->getSelectSql($reflectionClass);
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

    public static function getSelectSql(ReflectionClass $ref, ?string $id = null)
    {
        $sql = '';
        $sql_where = '';
        $selectFields = '';
        $tableName = '';
        $refProps = $ref->getProperties();
        $attributes = $ref->getAttributes();

        foreach ($attributes as $attr)
        {
            $inst = $attr->newInstance();
            if(get_class($inst) == 'TableName')
            {
                $tableName = $inst->tableName;
            }
        }
        
        foreach ($refProps as $refProp) 
        {            
            $prop_name = '`'.$refProp->getName().'`,';
            foreach ($refProp->getAttributes() as $attr)
            {
                if(get_class($attr->newInstance()) == 'EntityId' && $id != null)
                {
                    $sql_where = ' WHERE '.substr($prop_name,0,-1).'='.$id;
                }
                if(get_class($attr->newInstance()) == 'LinkedEntity')
                {
                    $prop_name='';
                }
            }
            
            $selectFields .= $prop_name;
            
        }

        $sql = 'select '.substr($selectFields,0,-1).' from `'.$tableName.'`'.$sql_where;
        //print_r($sql);
        return $sql;
    }

}

?>