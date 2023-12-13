<?php
namespace Model
{
	use Model\User;
	use Core\Misc\IdAttribute;
	use Core\Misc\TableNameAttribute;
	use Core\Misc\LinkedObjectAttribute;
	
	#[TableNameAttribute('service_groups')]
	class ServiceGroup extends BaseEntity
	{
		#[IdAttribute]
		public string $service_group_id = '';
		public string $name = '';
		public string $code = '';
	}
}
/*

	use Core\Misc\IdAttribute;
	use Core\Misc\TableNameAttribute;
	use Core\Misc\LinkedObjectAttribute;
#[IdAttribute]
#[TableNameAttribute('users')]
#[LinkedObjectAttribute]
*/
?>