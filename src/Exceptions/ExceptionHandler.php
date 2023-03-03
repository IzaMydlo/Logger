<?php
declare(strict_types=1);

namespace App\Exceptions;

use App\Helpers\App;
use ErrorException;
use Throwable;

class ExceptionHandler
{

    public function handle(Throwable $exception): void
    {
        $application = new App;
        if($application->isDebugMode()){
            var_dump($exception);
        }
        else{
            echo 'We found an error. Please try again later';
        }
        exit;
    }

    /**
     * @throws ErrorException
     */
    public function convertWarningAndNoticesToException($severity, $message, $file, $line)
    {
        throw new ErrorException($message, $severity, $severity, $file, $line);

    }
}