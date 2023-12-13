<?php
namespace Model
{
	use Core\Misc\IdAttribute;
	use Core\Misc\TableNameAttribute;
	use Core\Misc\LinkedObjectAttribute;

	#[TableNameAttribute('clients')]
	class Client extends BaseEntity
	{
		#[IdAttribute]
		public string $client_id = '';
		public string $name = '';
		public ?string $who_recommend_me = null;
		public ?string $comment = null;
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