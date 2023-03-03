<?php
declare(strict_types = 1);


use App\Exceptions\ExceptionHandler;
use App\Helpers\Config;

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/src/Exceptions/exception.php';


$db = new mysqli('qwe', 'qwe', 'qwe,', 'qwe');
$config = Config::getFileContent('file');
var_dump($config);

$application = new \App\Helpers\App();
echo $application->getServerTime()->format('Y-m-d H:i:s'); //format replace the toString iimplementation
echo $application->isDebugMode();
echo $application->isRunningFromConsole();
echo $application->getEnvironment();
echo $application->getLogPath();

