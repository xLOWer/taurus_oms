<?php
namespace Model
{
	class PrivGroup extends BaseEntity
	{
		public string $priv_group_id = '';
		public string $name = '';
		public ?string $description = null;
	}
}
?>