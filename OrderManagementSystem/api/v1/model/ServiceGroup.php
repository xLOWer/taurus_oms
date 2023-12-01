<?php
namespace Model
{
	use Model\User;
	
	class ServiceGroup extends BaseEntity
	{
	
		public string $service_group_id = '';
		public string $name = '';
		public string $code = '';
	}
}
?>