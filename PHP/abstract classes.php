<?php


use src\MySQLClient;

spl_autoload_register(function ($className){  //autoloading feature
    include $className. '.php';
});


//$pdo = (new PDOClient('mysql', 'localhost', 'store', 'store', 'secret'))->connect();
$mysqlid = (new MySQLClient('localhost', 'store', 'store', 'secret'))->connect();

//$products = $pdo->select("select * from products")->get();
$products = $mysqlid->select("select * from products")->get();

$handler = $mysqlid->getConnection();
$p = $handler->query("select * from products")->fetch_all();
//var_dump($products);

foreach ($products as $product)
{
    var_dump($product -> name); //because it is stdClass we can call via properties
}