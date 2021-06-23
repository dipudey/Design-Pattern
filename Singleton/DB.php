<?php 

class DB 
{
    private $host = "localhost";
    private $db = 'testing';
    private $user = 'root';
    private $password = 'password';
    private $driver = 'mysql';
    private $charset = 'utf8mb4';
    private $connection = NULL;
    private static $database = NULL;

    
    private function __construct(){
        $this->createConnection();
    }

    private function __clone() {}

    private function createConnection()
    {
        try {
            $this->connection = new PDO("{$this->driver}:host={$this->host};dbname={$this->db}",$this->user,$this->password);
        
        } catch(\Exception $e) {
            throw new Exception("Connection Fail");
        }
    }

    public static function connect()
    {
        if(self::$database == NULL) {
            self::$database = new DB();
        }
        return self::$database;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}