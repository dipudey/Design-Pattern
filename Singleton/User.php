<?php 

class User 
{
    private $db;

    public function __construct()
    {
        $database = DB::connect();
        $this->db = $database->getConnection();
    }


    public function getUser() 
    {
        $query = "SELECT * FROM users";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }
}