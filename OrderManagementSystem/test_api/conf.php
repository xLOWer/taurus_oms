<?php
class ConfigLoader
{
    public function __construct($conf_file = "./config.json")
    {        
        if($conf_file != null)
        {
            $reflectionClass = new ReflectionClass(new ConfigLoader(null));
            if(file_exists($conf_file))
            {
                $conf_text = file_get_contents($conf_file, FILE_USE_INCLUDE_PATH);
                $conf_json = json_decode($conf_text, JSON_OBJECT_AS_ARRAY);
                $reflectionProperties = $reflectionClass->getProperties();
                foreach($reflectionProperties as $reflectionProperty)
                {
                    $fieldName = $reflectionProperty->getName();
                    $this->$fieldName = $conf_json[$fieldName];
                }
                
            }
        }
    }

    public ?string $sql_ip;
    public ?string $sql_login;
    public ?string $sql_pwd;
    public ?string $sql_db;
}
?>