<?php
namespace Model
{
	use Model\Client;
	use Core\Misc\IdAttribute;
	use Core\Misc\TableNameAttribute;
	use Core\Misc\LinkedObjectAttribute;
	
	#[TableNameAttribute('addresses')]
	class Address extends BaseEntity
	{
		#[IdAttribute]
		public string $address_id = '';
		public ?string $city = '';
		public ?string $street = '';
		public ?string $building = '';
		public ?string $entrance = '';
		public ?string $floor = '';
		public ?string $room = '';
		public ?string $comment = '';
		public ?string $type = '';
		public string $client_id = '';

		#[LinkedObjectAttribute]
		public ?Client $Client;	
    }
}
/*

	use Core\Misc\IdAttribute;
	use Core\Misc\TableNameAttribute;
	use Core\Misc\LinkedObjectAttribute;
	#[TableNameAttribute('users')]
		#[IdAttribute]
		#[LinkedObjectAttribute]
*/
?>