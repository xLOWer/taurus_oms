<?php
namespace Model
{
	use Core\Misc\IdAttribute;
	use Core\Misc\TableNameAttribute;
	use Core\Misc\LinkedObjectAttribute;

	class BaseEntity
	{
		public string $create_date = '';
		public string $create_user_id = '';
		public string $is_deleted = '';
		public string $last_update_user_id = '';
		public string $last_update_date = '';

		#[LinkedObjectAttribute]
		public ?User $CreateUser;
		#[LinkedObjectAttribute]
		public ?User $LastUpdateUser;
	}
}
?>