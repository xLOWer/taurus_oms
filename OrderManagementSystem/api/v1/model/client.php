<?php
namespace Model
{
	class Client extends BaseEntity
	{
		public string $client_id = '';
		public string $name = '';
		public ?string $who_recommend_me = null;
		public ?string $comment = null;
        }
}
?>