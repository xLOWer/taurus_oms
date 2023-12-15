<?php
namespace Core\Mapping
{
	use Core\Logger;

	class FieldMap
	{
		public string $Name = "";
		public Array $Attributes = array();
		public string $Type = "";

		public function __construct($name, $type, $attributes = null)
		{
            Logger::trace(__CLASS__, __FUNCTION__);
			Logger::trace_json(__CLASS__, [$name,$type]);
            $this->Name = $name;
            $this->Type = $type;
			if($attributes != null)
            	$this->Attributes = $attributes;
		}

	}
}
?>