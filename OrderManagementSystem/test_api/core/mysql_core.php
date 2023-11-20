<?php
namespace TaurusOmsApi\Core{
    
    use ReflectionClass;
    use mysqli;
    use Exception;
    use TaurusOmsApi\Core;
    

    class Mysql_core
    {
        private ?mysqli $connection;

        public function __construct($sql_ip = null, $sql_login = null, $sql_pwd = null, $sql_db = null)
        {
            $this->connection = new mysqli($sql_ip, $sql_login, $sql_pwd, $sql_db);
            if ($this->connection->connect_error)
            {
                throw new Exception("<br><br>Connection failed: " . $this->connection->connect_error);
            }
            mysqli_set_charset($this->connection, "utf8mb4");
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
}
?>