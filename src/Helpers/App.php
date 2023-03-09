<?php

declare(strict_types = 1);

namespace App\Helpers;

use DateTimeInterface, DateTime, DateTimeZone;
use Exception;

class App
{
    private mixed $config = [];

    public function __construct()
    {
        $this->config = Config::get('app');
    }

    public function isDebugMode():bool
    {
        if(!isset($this->config['debug']))
            return false;
        return $this->config['debug'];
    }

    public function getEnvironment(): string
    {
        if(!isset($this->config['env']))
            return 'production';
        return $this->isTestMode() ? 'test' : $this->config['env'];
    }

    /**
     * @throws Exception
     */
    public function getLogPath(): string
    {
        if(!isset($this->config['log_path']))
            throw new Exception('Log path is not defined');
        return $this->config['log_path'];
    }

    public function isRunningFromConsole(): bool{
        return php_sapi_name() == 'cli' || php_sapi_name() == 'phpbg';
    }

    /**
     * @throws Exception
     */
    public function getServerTime(): DateTimeInterface
    {
        return new DateTime('now', new DateTimeZone('Europe/Berlin'));
    }

    public function isTestMode() :bool{
        if($this->isRunningFromConsole() && defined('PHPUNIT_RUNNING') && PHPUNIT_RUNNING)
            return true;
    return false;
    }

}