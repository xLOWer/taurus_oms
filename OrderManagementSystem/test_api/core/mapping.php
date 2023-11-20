<?php
require_once('common.php');
require_once('user.php');
require_once('client.php');

class Mapping
{
    public static $map = [];

    public function __construct()
    {
        //$this->Map(Relation::OneToMany, "User", "client_id", "Client", "client_id", "Client");
        $this->OneToMany(RelationType::OneToMany, "User", "client_id", "Client");
    }

    public function OneToMany(RelationType $rel_type,
                        string $rel_parent, 
                        string $rel_parent_link_id,
                        string $rel_parent_link_entity)
    {
        $relation = new Relation();
        $relation->type = $rel_type;
        $relation->parent = $rel_parent;
        $relation->parent_link_entity = $rel_parent_link_entity;
        $relation->parent_link_id = $rel_parent_link_id;
        $ref_parent = new ReflectionClass($rel_parent);
        $props_parent = $ref_parent->getProperties(ReflectionProperty::IS_READONLY);//TODO: оптимизация за счёт ограничения выборки
        foreach ($props_parent as $prop_parent)
        {   
            if($prop_parent->name == $rel_parent_link_entity)
            {                
                $relation->link = $prop_parent->getType()->getName();
                $instance_link = new ReflectionClass($relation->link);
                $props_link = $instance_link->getProperties();

                foreach ($props_link as $prop_link)
                {
                    $attribs_prop_link = $prop_link->getAttributes();
                    
                    foreach ($attribs_prop_link as $attrib_prop_link)
                    {
                        $attrib_link_instance = $attrib_prop_link->newInstance();
                        $name_attrib_class_link = get_class($attrib_link_instance);
                        if($name_attrib_class_link == 'EntityId')
                        {
                            $relation->link_id = $prop_link->name;
                        }
                    }
                }
            }
        }

        Mapping::$map []= $relation;
    }

    
}

class Relation
{
    public RelationType $type;
    public string $parent = '';             // имя класса родителя
    public string $link = '';               // имя класса линка
    public string $parent_link_id = '';     // через что коннектим в линк
    public string $link_id = '';            // id в классе линка
    public string $parent_link_entity = ''; // поле в родителе к которому линкуем
}

enum RelationType
{
    case OneToOne;
    case ManyToOne;
    case OneToMany;
    case ManyToMany;
}

//$map = new Mapping();
//print_r(Mapping::$map);
?>