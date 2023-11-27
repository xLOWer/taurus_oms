<?php namespace TaurusOmsApi\Core\Attributes
{
	use Attribute;
	use TaurusOmsApi\Relation;

	#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
	class LinkedEntity
	{
		public function __construct(Relation $relation) { }
	}
	
}
?>