<?php

use App\Student;

//NOT OK to Load classes in a big project
//spl_autoload_register(function ($className){  //autoloading feature
//    $class_name_array = explode('\\', $className);
//    var_dump($class_name_array);exit;
//    include 'src/' .end($class_name_array). '.php';
//});

new Student();