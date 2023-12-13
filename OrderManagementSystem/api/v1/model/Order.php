<?php
namespace Model
{
	use Model\Client;
	use Model\Check;
	use Core\Misc\IdAttribute;
	use Core\Misc\TableNameAttribute;
	use Core\Misc\LinkedObjectAttribute;
	
	#[TableNameAttribute('orders')]
	class Order extends BaseEntity
	{
		#[IdAttribute]
		public string $order_id = '';
		public string $client_id = '';
		public ?string $check_id = null;
		public ?string $description = null;
		public ?string $summa = null;
		public string $date = '';
		public ?string $where_check_sent = null;

		#[LinkedObjectAttribute]
		public ?Client $Client;
		#[LinkedObjectAttribute]
		public ?Check $Check;
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