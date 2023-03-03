<?php

namespace src;


class Lion extends PreyMethods implements Predator
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