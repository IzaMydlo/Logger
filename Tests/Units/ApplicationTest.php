<?php

namespace Units;

use App\Helpers\App;
use PHPUnit\Framework\TestCase;

class ApplicationTest extends TestCase
{
    public function testItCanGetInstanceOfApplication()
    {
        self::assertInstanceOf(App::class, new App);
    }

    public function testItCanGetBasicApplicationDatasetFromAppClass()
    {
        $application = new App;//with option --testdox we can see what test passed with description
        self::assertTrue($application->isRunningFromConsole());
        self::assertSame('test', $application->getEnvironment());
        self::assertNotNull($application->getLogPath());
        self::assertInstanceOf(\DateTime::class, $application->getServerTime());
    }
}
