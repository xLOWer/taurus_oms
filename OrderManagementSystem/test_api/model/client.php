<?php
namespace TaurusOmsApi
{
	use TaurusOmsApi\TableName;
	use TaurusOmsApi\EntityId;
	use TaurusOmsApi\LinkedEntity;
	use TaurusOmsApi\EntityInvisible;

	#[TableName('clients')]
	class Client
	{
		#[EntityId]
		public int $client_id = 0;
		public string $name = '';
		public ?string $who_recommend_me = null;
		public ?string $comment = null;
		public string $create_date = '';
		public ?int $create_user_id = null;
		public ?string $is_deleted = null;
		public ?int $last_update_user_id = null;
		public string $last_update_date = '';
	}
}
?>