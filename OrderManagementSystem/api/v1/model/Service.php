<?php
namespace Model
{
	use Model\ServiceGroup;
	
	class Service extends BaseEntity
	{
		public string $service_id = '';
		public string $service_group_id = '';
		public string $name = '';
		public string $price = '';
		public ?string $code = null;

		public ?ServiceGroup $ServiceGroup;
	}
}
?>