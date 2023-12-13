<?php
namespace Model
{
	use Model\Client;
	use Model\DeviceType;
	use Core\Misc\IdAttribute;
	use Core\Misc\TableNameAttribute;
	use Core\Misc\LinkedObjectAttribute;
	
	#[TableNameAttribute('devices')]
	class Device extends BaseEntity
	{
		#[IdAttribute]
		public string $device_id = '';
		public ?string $owner_client_id = null;
		public string $device_type_id = '';
		public ?string $parent_device_id = null;		
		public string $manufacturer = '';
		public string $model = '';
		public ?string $description = null;
		public ?string $serial_number = null;

		#[LinkedObjectAttribute]
		public ?Client $OwnerClient;
		#[LinkedObjectAttribute]
		public ?DeviceType $DeviceType;
		#[LinkedObjectAttribute]
		public ?Device $ParentDevice;

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