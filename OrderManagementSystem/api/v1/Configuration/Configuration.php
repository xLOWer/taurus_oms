<?php
namespace Configuration
{
    use Exception;
    use ReflectionClass;

    class Configuration
    {
        public function __construct($conf_file = "./config.json")
        {        
            if($conf_file != null)
            {
                if(file_exists($conf_file))
                {
                    $conf_text = file_get_contents($conf_file, FILE_USE_INCLUDE_PATH);
                    $conf_json = json_decode($conf_text, JSON_OBJECT_AS_ARRAY);
                    if(empty($conf_json))
                    {
                        throw new Exception("Файл конфигурации ".$conf_file." существует, но имеет некорректные параметры");
                    }
                    $reflectionProperties = (new ReflectionClass(new Configuration(null)))->getProperties();
                    
                    foreach($reflectionProperties as $reflectionProperty)
                    {
                        $fieldName = $reflectionProperty->getName();
                        $this->$fieldName = $conf_json[$fieldName];
                    }
                }
                else{
                    throw new Exception("Файл конфигурации ".$conf_file." не существует или недоступен для чтения");
                }
            }
        }

        public ?string $sql_ip;
        public ?string $sql_login;
        public ?string $sql_pwd;
        public ?string $sql_db;
    }
}
?>