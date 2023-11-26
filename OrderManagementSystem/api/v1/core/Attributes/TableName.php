<?php namespace TaurusOmsApi
{
	use Attribute;
	
	#[Attribute(Attribute::TARGET_CLASS)]
	class TableName
	{
		public function __construct(public ?string $tableName = null) { }
	}	
}
?>