<?php
namespace Model
{
	use Model\Order;
	use Core\Misc\IdAttribute;
	use Core\Misc\TableNameAttribute;
	use Core\Misc\LinkedObjectAttribute;
	
	#[TableNameAttribute('cash_operations')]
	class CashOperation extends BaseEntity
	{
		#[IdAttribute]
		public string $cash_id = '';
		public string $order_id = '';
		public string $summa = '';
		public string $cash_type = '';
		public string $operation_type = '';
		public string $date = '';

		#[LinkedObjectAttribute]
		public ?Order $Order;
		
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