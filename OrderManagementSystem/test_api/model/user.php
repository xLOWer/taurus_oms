<?php
namespace TaurusOmsApi\Core\Model
{
	use TaurusOmsApi\Core\TableName;
	use TaurusOmsApi\Core\EntityId;
	use TaurusOmsApi\Core\LinkedEntity;

	#[TableName('users')]
	class User
	{
		#[EntityId]
		public int $user_id = 0;
		public string $email = '';
		public string $password_hash = '';
		public string $last_login = '';
		public ?string $description = null;
		public ?int $client_id = null;
		public ?int $priv_group_id = null;
		public string $registred_date = '';
		public ?string $is_deleted = null;

		#[LinkedEntity]
		public ?Client $Client;	
		//#[LinkedEntity]
		//public ?PrivGroup $PrivGroup;
	}
}
?>