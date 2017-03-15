<?php
/**
 * 物件 Mongo Model
 * 
 */
class House extends DB\Mongo\Mapper {

    public function __construct(DB\Mongo $db) {
        parent::__construct($db,'');
    }


    public function getByHouseNo($id) {   
        //mapper 可使用load  find  select
        //laod 只會抓第一筆
        //find 抓多筆 返回全部欄位值
        //select 抓多筆 可指定返回欄位

        $result = array();
        //// find select 的用法
        // return $this->find( $filter=array('_id'=>array('$in'=> array("",""))   )); //語法一
        // $house_obj = $this->find( array('_id'=>$id   )); //語法二
        //無法直接用cast解，需要foreach轉成一筆筆document再解        
        // foreach($house_obj as $val){
        //     $result[] = $val->cast();
        // }

        //// load 的用法
        // $this->load( array('_id'=>array('$in'=> array("",""))) , NULL , 300); //語法一  ttl 秒
        $this->load( array('_id'=>$id ) , NULL , 300 ); //語法二
        while(!$this->dry()){
            $result[] = $this->cast();
            $this->next();
        }
        return $result;


    }
}