<?php

namespace Units;

use App\Contracts\DatabaseConnectionInterface;
use App\Exceptions\MissingArgumentException;
use App\Helpers\Config;
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
    }

    /** @depends testItCanConnectToDatabaseWithPdoApi */
    public function testItIsValidPDOConnection(DatabaseConnectionInterface $handler){
        return $this;

    }

    private function getCredentials(string $type)
    {
        return array_merge(
            Config::get('database', $type),
            ['db_name' =>  'bug_app_testing']
        );
    }
}