<?php

class Database{
    static private $pdo;
    static public $operators = ['=', '<>', 'and', 'or'];
    private $table; //not static property

    public static function connect(string $method)
    {
        static::$pdo = $method; // the same to self
        return new static; // returns the entire object of Database
    }

    public function table(string $name){
        $this->table = $name;
        return $this; //returning the current object that gas been used
    }
    public function insert(array $data)
    {
        var_dump("Connected to DB using ".self::$pdo);
        var_dump("Inserted into {$this->table} VALUES(".json_encode($data).")"); //look how strings are insertet into "";
        //json_encode allows to print array as a string
    }


}

Database::connect('pdo')->table('users')->insert(['username' => 'Test', 'Password' => 'secret']);