<?php 

class ConexaoDB {
    
    private static $instance;
    private $mysqli;

    private function __construct()
    {       
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'agenda_api';
        
        $this->mysqli = new MySQLI($hostname, $username, $password, $database);
    }

    public static function getInstance()
    {
        if (!self::$instance instanceof self) 
            self::$instance = new self;
        return self::$instance;
    }

    public function getHandler()
    {
        return $this->mysqli;
    }

}

?> 