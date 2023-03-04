<?php
declare(strict_types = 1);


use App\Logger\Logger;

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/src/Exceptions/exception.php';

$logger = new Logger();
//$logger->log(LogLevel::EMERGENCY, 'test no level');
$logger->info('User logged in!');

