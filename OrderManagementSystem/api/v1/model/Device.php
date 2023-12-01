<?php
namespace Model
{
	use Model\Client;
	use Model\DeviceType;
	
	class Device extends BaseEntity
	{
		public string $device_id = '';
		public ?string $owner_client_id = null;
		public string $device_type_id = '';
		public ?string $parent_device_id = null;		
		public string $manufacturer = '';
		public string $model = '';
		public ?string $description = null;
		public ?string $serial_number = null;

		public ?Client $OwnerClient;
		public ?DeviceType $DeviceType;
		public ?Device $ParentDevice;

	}
}
?>