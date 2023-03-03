<?php

class Database{
    static private $pdo;
    static public $operators = ['=', '<>', 'and', 'or'];
    private $table; //not static property

    public static function connect(string $method)
    {
//        $this->table; Will not work. table is not static
        $obj = new static();
        $obj->table; //indirectly creating instance of Database class and later accessing table property Late Static Binding
        self::$pdo = $method; // in static classes we refer to the class (self) not object (this)
        static::$pdo = $method; // the same to self
    }

    public static function create(array $data)
    {
        var_dump("creating a new DB with ".self::$pdo);
    }

    public function getMethod() //it is legal to create a not static method inside static class
    {
        return self::$pdo;
    }
}

var_dump(Database::$operators);
Database::connect('pdo');
Database::create([]);

$db = new Database();
echo ($db->getMethod());