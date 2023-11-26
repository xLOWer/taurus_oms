<?php 
namespace TaurusOmsApi
{
    use ReflectionClass;
    use mysqli;
    use Exception;
    use TaurusOmsApi\Configuration\Configuration;
    use TaurusOmsApi\DatabaseInterface;

    class EntityFramework
    {
        private DatabaseInterface $dbi;

        public function __construct(DatabaseInterface $dbi = null) 
        {            
            $conf = new Configuration("../config.json");
            if($dbi == null)
            {
                $this->dbi = new mysqli($conf->sql_ip, $conf->sql_login, $conf->sql_pwd, $conf->sql_db);
            }
            else
            {
                $this->dbi = $dbi;
            }

        }

        public function Update(ReflectionClass $reflectionClass, string $id){}
        public function Delete(ReflectionClass $reflectionClass, string $id){}

        public function GetSingle(ReflectionClass $reflectionClass, string $id)
        {
            $result = $reflectionClass->newInstance();
            //$sql = $this->dbi->getSelectSql($reflectionClass, $id);
            //print_r($sql);
            return $result;
        }

        public function GetList(ReflectionClass $reflectionClass)
        {
            $entitiyList = [];
            $sql = $this->getListSelectQuery($reflectionClass);
            if($result = $this->dbi->SelectQuery($sql))
            {
                
                $entitiyList = $this->resultConstructor($result, $reflectionClass);
            }
            else
            {
                throw new Exception("Ошибка: " . $this->dbi->error);
            }
            
            $this->dbi->close();
            return $entitiyList;
        }


        private function SelectQueryConstructor(ReflectionClass $ref)
        {

        }

        
        private function getListSelectQuery(ReflectionClass $ref)
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
        
        private function getSingleSelectQuery(ReflectionClass $ref, ?string $id = null)
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

        private function resultConstructor(object $result, ReflectionClass $reflectionClass)
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
                    }
                }
                $list []= $item;
            }
            return $list;
        }

    }
} 
?>