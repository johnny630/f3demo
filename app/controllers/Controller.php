<?php

class Controller {

    protected $f3;
    protected $db_mysql;
    protected $db_mongo;

    function beforeroute() {
        // $this->f3->set('message','');
    }

    function afterroute() {
        // echo Template::instance()->render('layout.htm');    
    }

    function __construct() {

        $f3=Base::instance();

        $db_mysql=new DB\SQL(
            $f3->get('mysql_dns') . $f3->get('mysql_name'),
            $f3->get('mysql_user'),
            $f3->get('mysql_pass')
        );  

        $db_mongo =new DB\Mongo( $f3->get('mongo_dns'), $f3->get('mongo_name') );

        $this->f3=$f3;
        $this->db_mysql=$db_mysql;
        $this->db_mongo=$db_mongo;
    }
}
