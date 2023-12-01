<?php
namespace Model
{
	use Model\Client;
	
	class Address extends BaseEntity
	{
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

		public ?Client $Client;	
    }
}
?>