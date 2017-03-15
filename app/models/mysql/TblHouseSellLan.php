<?php

class TblHouseSellLan extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db,'');
    }

    public function all() {
        $this->load();
        return $this->query;
    }

    public function getByHouseNo($id) {   
        return $this->load(array('',$id));
    }
}