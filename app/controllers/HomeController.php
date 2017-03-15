<?php

class HomeController extends Controller{

    public function index()
    {
        $json_data = array('title'=>'hello sinyi test' , 'name'=>'johnny' , 'script'=>'F3功能測試' , 'CACHE'=>$this->f3->get('CACHE') );

        header('Content-Type: application/json');
        echo json_encode($json_data);
    }

    /**
     * 多語系範例
     */
    public function duolingoDemo($f3 , $args)
    {
        $this->f3->set('userName', $args['userName'] );

        $this->f3->set('content','duolingoDemo.htm');
        echo \Template::instance()->render('layout.htm');
    }

    public function captcha()
    {
        $img = new Image();
        $img->captcha('../../ui/fonts/OpenSans-Bold.ttf',16,5,'SESSION.captcha_code');
        $img->render();
    }

    public function captchaValid()
    {
        echo $this->f3->get('SESSION.captcha_code');
        // not work ?
        // echo $_SESSION['captcha_code'];
    }

    function help()
    {
        $classes=array(
            'Base'=>
                array(
                    'hash',
                    'json',
                    'session'
                ),
            'Cache'=>
                array(
                    'apc',
                    'memcache',
                    'wincache',
                    'xcache'
                ),
            'DB\SQL'=>
                array(
                    'pdo',
                    'pdo_dblib',
                    'pdo_mssql',
                    'pdo_mysql',
                    'pdo_odbc',
                    'pdo_pgsql',
                    'pdo_sqlite',
                    'pdo_sqlsrv'
                ),
            'DB\Jig'=>
                array('json'),
            'DB\Mongo'=>
                array(
                    'json',
                    'mongo'
                ),
            'Auth'=>
                array('ldap','pdo'),
            'Bcrypt'=>
                array(
                    'mcrypt',
                    'openssl'
                ),
            'Image'=>
                array('gd'),
            'Lexicon'=>
                array('iconv'),
            'SMTP'=>
                array('openssl'),
            'Web'=>
                array('curl','openssl','simplexml'),
            'Web\Geo'=>
                array('geoip','json'),
            'Web\OpenID'=>
                array('json','simplexml'),
            'Web\Pingback'=>
                array('dom','xmlrpc')
        );
        $this->f3->set('classes',$classes);
        $this->f3->set('content','welcome.htm');
        echo View::instance()->render('layout.htm');

    }
}