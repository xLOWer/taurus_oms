<?php
namespace Model
{
	use Model\Client;
	use Model\Check;
	
	class Order extends BaseEntity
	{
		public string $order_id = '';
		public string $client_id = '';
		public ?string $check_id = null;
		public ?string $description = null;
		public ?string $summa = null;
		public string $date = '';
		public ?string $where_check_sent = null;

		public ?Client $Client;
		public ?Check $Check;
	}
}
?>