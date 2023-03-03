<?php

namespace src;

use mysqli;

class MySQLClient extends Database
{

    public function __construct($host, $db_name, $db_user, $db_password)
    {
        parent::__construct($host, $db_name, $db_user, $db_password);
    }

    public function connect()
    {
        $this->_handler = new mysqli($this->host, $this->db_user, $this->db_password, $this->db_name);
        return $this;
    }

    public function get() //mysqli does not support fetchAll to get all objects from DB
    {
                                                                         //to have only associated arrays and not additional index based array
        return json_decode(json_encode($this->statement->fetch_all(MYSQLI_ASSOC))); //convert array to string and later string to array to have it as stdClass
    }
}