<?php
namespace Controllers
{
    use Core\Misc\Pagination;
    use Core\Mapping\ObjectMap;
    use Core\Logger;
    use Model\Address;

    class AddressController extends BaseController
    {
        public function __construct($parameters, $data) 
        {
            Logger::debug(__CLASS__, __FUNCTION__);
            parent::__construct();
            $this->_class = Address::class;
            $this->Parameters = $parameters;
            $this->Data = $data;
            $this->Map = new ObjectMap();
            $this->Map->SetMappingByClassName($this->_class);
        }

        public function get() : string { return parent::get(); }
        public function post() : string { return parent::post(); }
        public function put() : bool { return parent::put(); }
        public function delete() : bool { return parent::delete(); }
    }
}
?>