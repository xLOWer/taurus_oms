<?php
namespace Model
{
	use Model\Client;

	//#[TableName('users')]
	class User
	{
		//#[EntityId]
		public int $user_id = 0;
		public string $email = '';
		public string $password_hash = '';
		public string $last_login = '';
		public ?string $description = null;
		public ?int $client_id = null;
		public ?int $priv_group_id = null;
		public string $registred_date = '';
		public ?string $is_deleted = null;

		//#[LinkedEntity(new Relation())]
		public ?Client $Client;	
		//#[LinkedEntity]
		//public ?PrivGroup $PrivGroup;
	}
}
?>