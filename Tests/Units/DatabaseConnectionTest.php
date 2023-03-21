<?php

namespace Units;

use App\Contracts\DatabaseConnectionInterface;
use App\Database\MySQLiConnection;
use App\Exceptions\MissingArgumentException;
use App\Helpers\Config;
use mysqli;
use PHPUnit\Framework\TestCase;
use App\Database\PDOConnection;

class DatabaseConnectionTest extends TestCase
{
    public function testItThrowsMissingArgumentExceptionWithWrongCredentialsKeys()
    {
        $credentials = [];
        self::expectException(MissingArgumentException::class);
        $pdoHandler = (new PDOConnection($credentials))->connect();
    }

    public function testItCanConnectToDatabaseWithPdoApi()
    {
        $credentials = $this->getCredentials('pdo');
        $pdoHandler = (new PDOConnection($credentials))->connect();
        self::assertInstanceOf(DatabaseConnectionInterface::class, $pdoHandler);
        return $pdoHandler;
    }

    /** @depends testItCanConnectToDatabaseWithPdoApi */
    public function testItIsValidPDOConnection(DatabaseConnectionInterface $handler){
         self::assertInstanceOf(\PDO::class, $handler->getConnection());

    }



    public function testItCanConnectToDatabaseWithMysqliApi()
    {
        $credentials = $this->getCredentials('mysqli');
        $handler = (new MySQLiConnection($credentials))->connect();
        self::assertInstanceOf(DatabaseConnectionInterface::class, $handler);
        return $handler;
    }

    /** @depends testItCanConnectToDatabaseWithMysqliApi */
    public function testItIsValidMysqliConnection(DatabaseConnectionInterface $handler){
        self::assertInstanceOf(mysqli::class, $handler->getConnection());

    }

    private function getCredentials(string $type)
    {
        return array_merge(
            Config::get('database', $type),
            ['db_name' =>  'bug_app_testing']
        );
    }
}