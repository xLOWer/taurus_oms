<?php
namespace Model
{
	use Model\Order;
	
	class CashOperation extends BaseEntity
	{
		public string $cash_id = '';
		public string $order_id = '';
		public string $summa = '';
		public string $cash_type = '';
		public string $operation_type = '';
		public string $date = '';

		public ?Order $Order;
		
	}
}
?>