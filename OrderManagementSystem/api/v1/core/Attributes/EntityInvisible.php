<?php namespace TaurusOmsApi
{
	use Attribute;

	#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
	class EntityInvisible
	{
		public function __construct() { }
	}
}
?>