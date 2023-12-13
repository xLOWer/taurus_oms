<?php
namespace Model
{
	use Model\Client;
	use Model\PrivGroup;
	use Core\Misc\IdAttribute;
	use Core\Misc\TableNameAttribute;
	use Core\Misc\LinkedObjectAttribute;

	#[TableNameAttribute('users')]
	class User
	{
		#[IdAttribute]
		public string $user_id = '';
		public string $email = '';
		public string $password_hash = '';
		public string $last_login = '';
		public ?string $description = null;
		public ?string $client_id = null;
		public ?string $priv_group_id = null;
		public string $registred_date = '';

		public ?string $is_deleted = null;

		#[LinkedObjectAttribute]
		public ?Client $Client;	
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
