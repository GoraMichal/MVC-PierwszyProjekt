<?php

final class Config {

    public static $instance;

    private $_cnf;

    private function __construct()
    {
        $this->_cnf = array
        (
            /**
             * main config
             */
            'DOC_ROOT' => getcwd(),
            'APP_DIR' => getcwd() . '/../application/',
            'LAYOUT' => getcwd() . '/../application/views/layouts/layout.php',
            'BASE_URL' => 'http://mvc.pl/',
            'IMG_DIR' => getcwd(). '/images/',

            /**
             * database config
             */
            'DB_NAME' => 'samochody',
            'DB_USER' => 'root',
            'DB_PASS' => 'root',
            'DB_HOST' => 'localhost'
        );
    }

    public function getConfig() {
        return $this->_cnf;
    }


    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}