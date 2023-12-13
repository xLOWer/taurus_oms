<?php
namespace Model
{
	use Model\PrivGroup;
	use Core\Misc\IdAttribute;
	use Core\Misc\TableNameAttribute;
	use Core\Misc\LinkedObjectAttribute;
	
	#[TableNameAttribute('privileges')]
	class Privileges extends BaseEntity
	{
		#[IdAttribute]
		public string $priv_id = '';
		public string $priv_group_id = '';
		public string $objects = '';
		public string $is_can_view = '';
		public string $is_can_create = '';
		public string $is_can_edit = '';
		public string $is_can_delete = '';

		#[LinkedObjectAttribute]
		public ?PrivGroup $PrivGroup;
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