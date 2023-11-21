<?php namespace TaurusOmsApi
{
    use ReflectionClass;
    use ReflectionProperty;
    
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
            $relation->Type = $rel_type;
            $relation->Parent = $rel_parent;
            $relation->ParentLinkEntity = $rel_parent_link_entity;
            $relation->ParentLinkId = $rel_parent_link_id;
            $ref_parent = new ReflectionClass($rel_parent);
            $props_parent = $ref_parent->getProperties(ReflectionProperty::IS_READONLY);//TODO: оптимизация за счёт ограничения выборки
            foreach ($props_parent as $prop_parent)
            {   
                if($prop_parent->name == $rel_parent_link_entity)
                {                
                    $relation->Link = $prop_parent->getType()->getName();
                    $instance_link = new ReflectionClass($relation->Link);
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
                                $relation->LinkId = $prop_link->name;
                            }
                        }
                    }
                }
            }
    
            Mapping::$map []= $relation;
        }
    
        
    }
}

?>