<?php
namespace Mapping
{
	use Core\Logger;

	class FieldMap
	{
		public string $Name = "";
		public Array $Attributes = array();
		public string $Type = "";

		public function __construct($name, $type, $attributes = null)
		{
			Logger::trace($this::class, " __construct(".$name.", ".$type.")");
            $this->Name = $name;
            $this->Type = $type;
			if($attributes != null)
            	$this->Attributes = $attributes;
		}

	}
}
?>