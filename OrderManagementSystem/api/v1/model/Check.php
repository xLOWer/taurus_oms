<?php
namespace Model
{
	use Core\Misc\IdAttribute;
	use Core\Misc\TableNameAttribute;
	use Core\Misc\LinkedObjectAttribute;
        
	#[TableNameAttribute('checks')]
	class Check extends BaseEntity
	{
		#[IdAttribute]
        public string $check_id = '';
        public string $check_date = '';
        public string $check_number = '';
        public string $check_summa = '';
        public string $check_inn = '';
        public string $check_creator = '';
        public string $check_link = '';
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