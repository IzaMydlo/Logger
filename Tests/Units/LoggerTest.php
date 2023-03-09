<?php

namespace Units;

use App\Helpers\App;
use App\Logger\Logger;
use App\Logger\LogLevel;
use App\Exceptions\InvalidLogLevelArgument;
use PHPUnit\Framework\TestCase;
use App\Contracts\LoggerInterface;


class LoggerTest extends TestCase
{
    /** @var Logger  */
    private  $logger;
    public function setUp(): void
    {
        $this->logger = new Logger();
    }

    public function testIfImplementsTheLoggerInterface(){
        self::assertInstanceOf(LoggerInterface::class, $this->logger);
    }

    public function testItCanCreateDifferentTypesOfLogLevel(){
        $this->logger->info('Testing Info logs');
        $this->logger->error('Testing Error logs');
        $this->logger->log(logLevel::ALERT, 'Testing Alert logs');
        $app = new App;

        $filename = sprintf("%s/%s.log",$app->getLogPath(),'test');

        self::assertFileExists($filename);
        $contentOfFile = file_get_contents($filename);
        self::assertStringContainsString('Testing Info logs', $contentOfFile);
        self::assertStringContainsString('Testing Error logs', $contentOfFile);
        self::assertStringContainsString('Testing Alert logs', $contentOfFile);
        self::assertStringContainsString(logLevel::ALERT, $contentOfFile);
        unlink($filename);
        self::assertFileDoesNotExist($filename);
    }

    public function testItThrowsInvalidLogLevelArgumentExceptionWhenGivenAWrongLogLevel()
    {
        self::expectException(InvalidLogLevelArgument::class);
        $this->logger->log('Invalid', 'Testing invalid log level');
    }


}