<?php

namespace src;

class Dog extends PreyMethods implements Predator, Prey  //takes 2 methods from prey and allow Dog to be Prey and Predator
{


    public function chase(Prey $prey)
    {
        var_dump('I am chasing a' .get_class($prey));
    }

    public function kill(Prey $prey)
    {
        var_dump('I  killed a' .get_class($prey));
    }
}