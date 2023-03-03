<?php
declare(strict_types = 1); //No hidden casting!!!


namespace App\Helpers;

use App\Exception\NotFoundException;
use http\Exception\RuntimeException;
use PHPUnit\Logging\Exception;

class Config
{

    public static function get(string $filename, string $key=null)
    {
        $fileContent = self::getFileContent($filename);
        if($key === null)
        {
            return $fileContent;
        }
//        return isset($fileContent[$key]) ? $fileContent[$key] : [];
        return $fileContent[$key] ?? [];
    }

    /**
     * @throws NotFoundException
     */
    public static function getFileContent(string $filename) : array
    {
        $fileContent = [];
        try {
            $path = realpath(sprintf(__DIR__.'/../config/%s.php', $filename));
            if(file_exists($path))
            {
                $fileContent = require $path;
            }
//        }catch (\Exception $exception)
        }catch (\Throwable $exception)  //Throwable implements Exception, so Higher level!!!
        {//It helps to catch Fatat Errors
//            die($exception->getMessage());
//            throw new RuntimeException(
            throw new NotFoundException(
                sprintf('Specified file %s was not found', $filename)
            );
        }
        return $fileContent;
    }

}