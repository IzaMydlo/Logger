<?php

namespace src;

use PDO;

class PDOClient extends Database
{

    protected $dsn; //connection string - data source name. Contains driver and name of DB
    public function __construct($driver, $host, $db_name, $db_user, $db_password) //driver will allow to choose mysql, postgres MiscrosoftSQL...
    {
        parent::__construct($host, $db_name, $db_user, $db_password); //pass to parent constructor
        $this->dsn = "{$driver}:host={$this->host};dbname={$this->db_name}";  //this-> host is legal here because is was given to parent constructor

    }

    public function connect()
    {
        try {
            $this->_handler = new PDO($this->dsn, $this->db_user, $this->db_password);
        }
        catch (\PDOException $ex)
        {
            die($ex->getMessage());
        }
        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll(PDO::FETCH_OBJ); //fetch_all ia PDO method to get all data from DB and have it as a object
    }
}