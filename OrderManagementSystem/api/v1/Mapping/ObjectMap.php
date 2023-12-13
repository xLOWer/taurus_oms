<?php
namespace Mapping
{
	use ReflectionClass;
	use Core\Logger;
    use Core\Misc\IdAttribute;
    use Core\Misc\LinkedObjectAttribute;
    use Core\Misc\TableNameAttribute;
    use Mapping\FieldMap;
	use Mapping\AttributeMap;
    use ReflectionProperty;

	class ObjectMap
	{
		public string $IdFieldName = "";
		public string $TableName = "";

		public string $SelectListTemplate = "";
		public string $SelectItemTemplate = "";
		public string $InsertItemTemplate = "";
		public string $DeleteItemTemplate = "";
		public string $UpdateItemTemplate = "";

		public Array $ObjectClassFields = array();
		public Array $DatabaseTableFields = array();

		private string $_objectType = "";
		private string $_fields = "";

		public function __construct()
		{
			Logger::debug($this::class, " __construct");
		}

		public function GetSelectItemTemplate(int $id)
		{
			Logger::trace($this::class, "GetSelectItemTemplate(".$id.")");
			return $this->SelectItemTemplate." WHERE `".$this->IdFieldName."`=".$id."";
		}

		public function SetMappingByClassName(string $className)
		{
			Logger::trace($this::class, " setMappingByClassName (".$className.")");
			$this->_objectType = $className;
			$this->MapProperties();
			$this->SetTableName();
			$this->SetIdFieldName();
			$this->SetSelectListTemplate();
			$this->SelectItemTemplate = $this->SelectListTemplate;
			$this->SetInsertItemTemplate();
			$this->SetDeleteItemTemplate();
			$this->SetUpdateItemTemplate();
		}

		public function SetSelectListTemplate(string $sql = null)
		{
			Logger::trace($this::class, " SetSelectListTemplate");
			if($sql == null)
			{
				foreach($this->ObjectClassFields as $field)
				{
					
					if(count($field->Attributes) > 0)
						foreach($field->Attributes as $attr)
						{
							if($attr !=LinkedObjectAttribute::class)
								$this->_fields .= "`".$field->Name."`,";
						}
					else
						$this->_fields .= "`".$field->Name."`,";
				}
				$this->SelectListTemplate = "SELECT ".substr($this->_fields, 0, -1)." FROM ".$this->TableName;
				Logger::debug($this::class, $this->SelectListTemplate);
			}
			else
				$this->SelectListTemplate = $sql;
		}

		public function SetInsertItemTemplate(string $sql = null)
		{
			Logger::trace($this::class, " SetInsertItemTemplate");
			if($sql == null)
			{
				
			}
			else
				$this->InsertItemTemplate = $sql;
		}

		public function SetDeleteItemTemplate(string $sql = null)
		{
			Logger::trace($this::class, " SetDeleteItemTemplate");
			if($sql == null)
			{
				
			}
			else
				$this->DeleteItemTemplate = $sql;
		}

		public function SetUpdateItemTemplate(string $sql = null)
		{
			Logger::trace($this::class, " SetUpdateItemTemplate");
			if($sql == null)
			{
				
			}
			else
				$this->UpdateItemTemplate = $sql;
		}

		public function MapProperties()
		{
			Logger::trace($this::class, " MapProperties (".$this->_objectType.")");
			$ref = new ReflectionClass($this->_objectType);
			$props = $ref->getProperties();
			foreach ($props as $prop) 
			{
				$fieldMap = new FieldMap(
					$prop->getName(), 
					$prop->getType()->getName(),
					$this->MapAttributes($prop)
				);
				$this->ObjectClassFields []= $fieldMap;
			}
		}

		private function MapAttributes(ReflectionProperty $refProp)
		{
			Logger::trace($this::class, " MapAttributes");
			$attributesReturn = array();
			$attributes = $refProp->getAttributes();
			if(count($attributes) > 0)
				foreach ($attributes as $attr) 
				{
					$attributesReturn []= $attr->getName();
				}
			return $attributesReturn;
		}

		public function SetIdFieldName(string $name = null)
		{
			Logger::trace($this::class, "SetIdFieldName");
			if($name == null)
			{
				foreach ($this->ObjectClassFields as $field) 
				{
					if(isset($field->Attributes) && in_array(IdAttribute::class, $field->Attributes))
					{
						$this->IdFieldName = $field->Name;
						Logger::trace_json($this::class, $field);
					}
					
				}
			}
			else
				$this->IdFieldName = $name;
		}

		public function SetTableName(string $name = null)
		{
			Logger::trace($this::class, " SetTableName");
			if($name == null)
			{
				$ref = new ReflectionClass($this->_objectType);
				$attributes = $ref->getAttributes();
				foreach ($attributes as $attr) 
				{
					if($attr->getName() == TableNameAttribute::class)
					{						
						$inst = $attr->newInstance();
						$this->TableName = $attr->getArguments()[0];
					}
				}
			}
			else
				$this->TableName = $name;
		}



	}
}
?>