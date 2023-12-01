<?php
namespace Model
{
	use Model\User;
	
	class BaseEntity
	{
		public string $create_date = '';
		public string $create_user_id = '';
		public string $is_deleted = '';
		public string $last_update_user_id = '';
		public string $last_update_date = '';

		public ?User $CreateUser;
		public ?User $LastUpdateUser;
	}
}
?>