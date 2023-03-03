<?php

use src\Lion;

spl_autoload_register(function ($className){  //autoloading feature
    include $className. '.php';
});

$billy = new \src\Dog();
$santa = new Lion();
$loko = new \src\Rabbit();

$billy->chase($loko);
$billy->kill($loko);

$santa->chaseBy($billy);
$santa->kill($billy);

$loko->chaseBy($billy);
$loko->killedBy($billy);
