<?php 

Class Singleton
{
    private static $instance;

    public function __construct()
    {

    }

    public static function getInstance()
    {
        if(!self::$instance) {
            self::$instance = self;
            echo "Instance Created<br>";
        }
        else {
            echo "Already Instance Created <br>";
        }
    }
}


// $obj = new Singleton();
Singleton::getInstance();
Singleton::getInstance();
Singleton::getInstance();