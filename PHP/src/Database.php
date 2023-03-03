<?php

namespace src;

abstract class Database
{
    protected $_handler;
    protected $statement;
    protected $host, $db_name, $db_user, $db_password;

    public function __construct($host, $db_name, $db_user, $db_password)
    {
        $this->host = $host;
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
    }

    abstract public function connect(); //any subclass must implement that method

    public function select($sql) //fetch date from DB  $sqp is a sql query
    {
        $this->statement = $this->_handler->query($sql); //method chaining get the statement from the sql by handler (statement has records from DB)
        return $this; //handler refers to whichever DB user uses. Instance of PDo or MySQKLi
    }

    public function getConnection() //allows you to have an open connection to create own queries (without using select from above for example)
    {
        return $this->_handler;
    }

    abstract public function get();

}