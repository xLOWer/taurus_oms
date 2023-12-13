<?php
namespace Model
{
	use Model\Client;
	use Core\Misc\IdAttribute;
	use Core\Misc\TableNameAttribute;
	use Core\Misc\LinkedObjectAttribute;

	#[TableNameAttribute('phones')]
	class Phone extends BaseEntity
	{
		#[IdAttribute]
		public string $phone_id = '';
		public string $client_id = '';
		public string $number = '';
		public string $type = '';

		#[LinkedObjectAttribute]
		public ?Client $Client;
	}
}
?>