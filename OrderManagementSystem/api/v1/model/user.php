<?php
namespace Model
{
	use Model\Client;
	use Model\PrivGroup;

	class User
	{
		public string $user_id = '';
		public string $email = '';
		public string $password_hash = '';
		public string $last_login = '';
		public ?string $description = null;
		public ?string $client_id = null;
		public ?string $priv_group_id = null;
		public string $registred_date = '';

		public ?string $is_deleted = null;

		public ?Client $Client;	
		public ?PrivGroup $PrivGroup;
	}
}
?>