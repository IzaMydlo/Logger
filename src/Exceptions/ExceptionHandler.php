<?php

namespace App\Exceptions;

use App\Helpers\App;
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
}