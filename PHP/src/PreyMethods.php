<?php

namespace src;

abstract class PreyMethods
{
    public function chaseBy(Predator $predator)
    {
        var_dump('please help, I am being chased by '.get_class($predator));
    }

    public function killedBy(Predator $predator)
    {
//        var_dump(get_class(). 'has beem killed by a '.get_class($predator)); // if it is not an abstract class we see the class name instead of pray name
        var_dump(get_class(new static). ' has beem killed by a '.get_class($predator)); // if it is not an abstract class we see the class name instead of pray name
    }
}