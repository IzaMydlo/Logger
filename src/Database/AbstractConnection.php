<?php

namespace App\Database;

use App\Exceptions\MissingArgumentException;

abstract class AbstractConnection
{

    protected $connection;
    protected $credentials;
    const REQUIRED_CONNECTION_KEYS = [];

    /**
     * @throws MissingArgumentException
     */
    public function __construct(array $credentials)
    {
        $this->credentials = $credentials;
        if(!$this->credentialsHaveRequiredKeys($this->credentials))
        {
            throw new MissingArgumentException(
                sprintf(
                    'Database connection credentials are not mapped correctly, required key: %s',
                    implode(',', static::REQUIRED_CONNECTION_KEYS)
                )
            );
        }

    }

    private function credentialsHaveRequiredKeys(array $credentials) :bool{
//        $arr1 = ['key', 'two'];  returns new array witch matching values from both arrays
//        $arr2 = ['key', 'long'];
//        $matches = array_intersect($arr1, $arr2);
        $matches = array_intersect(static::REQUIRED_CONNECTION_KEYS, array_keys($credentials));
        return count($matches) === count(static::REQUIRED_CONNECTION_KEYS);
    }

    abstract protected function parseCredentials(array $credentials): array;
}