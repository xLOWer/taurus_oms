<?php
namespace Model
{
	class Phone extends BaseEntity
	{
		public string $phone_id = '';
		public string $client_id = '';
		public string $number = '';
		public string $type = '';

		public ?Client $Client;
	}
}
?>