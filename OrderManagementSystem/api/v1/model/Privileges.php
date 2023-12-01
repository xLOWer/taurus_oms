<?php
namespace Model
{
	use Model\PrivGroup;
	
	class Privileges extends BaseEntity
	{
		public string $priv_id = '';
		public string $priv_group_id = '';
		public string $objects = '';
		public string $is_can_view = '';
		public string $is_can_create = '';
		public string $is_can_edit = '';
		public string $is_can_delete = '';

		public ?PrivGroup $PrivGroup;
	}
}
?>