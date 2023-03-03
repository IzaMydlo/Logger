<?php

use App\Exceptions\ExceptionHandler;

set_error_handler([new ExceptionHandler(), 'convertWarningAndNoticesToException'] );
set_exception_handler([new ExceptionHandler(), 'handle']);
