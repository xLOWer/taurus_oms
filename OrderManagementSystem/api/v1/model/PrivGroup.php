<?php
namespace Model
{
	use Core\Misc\IdAttribute;
	use Core\Misc\TableNameAttribute;
	use Core\Misc\LinkedObjectAttribute;
	
	#[TableNameAttribute('priv_groups')]
	class PrivGroup extends BaseEntity
	{
		#[IdAttribute]
		public string $priv_group_id = '';
		public string $name = '';
		public ?string $description = null;
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