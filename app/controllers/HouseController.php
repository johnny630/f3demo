<?php
/**
 * 物件相關功能
 */
class HouseController extends Controller{

    /**
     * Gets the by house no.
     */
    public function getByHouseNo()
    {
        $house = new TblHouseSellLan($this->db_mysql);
        // $house_obj = array();
        $house_obj = $house->getByHouseNo( $this->f3->get('PARAMS.id') );
        // $house_obj = $house->all();
        // $house_obj['idd'] = 'xxxx';

        header('Content-Type: application/json');
        echo json_encode( $house_obj->cast());
    }

    /**
     * Gets the by mongo house no.
     */
    public function getByMongoHouseNo()
    {
        $house = new House($this->db_mongo);
        // $house_obj = array();
        $result = $house->getByHouseNo( $this->f3->get('PARAMS.id') );
        // $house_obj = $house->all();
        // $house_obj['idd'] = 'xxxx';

        
        header('Content-Type: application/json');
        echo json_encode($result);
        // print_r($house_obj)   ;
    }
}