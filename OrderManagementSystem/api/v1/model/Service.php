<?php
namespace Model
{
	use Model\ServiceGroup;
	use Core\Misc\IdAttribute;
	use Core\Misc\TableNameAttribute;
	use Core\Misc\LinkedObjectAttribute;
	
	#[TableNameAttribute('services')]
	class Service extends BaseEntity
	{
		#[IdAttribute]
		public string $service_id = '';
		public string $service_group_id = '';
		public string $name = '';
		public string $price = '';
		public ?string $code = null;

		#[LinkedObjectAttribute]
		public ?ServiceGroup $ServiceGroup;
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