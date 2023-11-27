<?php namespace TaurusOmsApi\Core\Attributes
{
	use Attribute;
		
	#[Attribute(Attribute::TARGET_PROPERTY)]
	class EntityId
	{
		public function __construct() { }
	}
	
}
?>