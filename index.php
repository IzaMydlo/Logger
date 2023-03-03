<?php
declare(strict_types = 1);


require_once __DIR__.'/vendor/autoload.php';

set_exception_handler([new \App\Exceptions\ExceptionHandler(), 'handle']);
$config = \App\Helpers\Config::getFileContent('file');
var_dump($config);

$application = new \App\Helpers\App();
echo $application->getServerTime()->format('Y-m-d H:i:s'); //format replace the toString iimplementation
echo $application->isDebugMode();
echo $application->isRunningFromConsole();
echo $application->getEnvironment();
echo $application->getLogPath();

