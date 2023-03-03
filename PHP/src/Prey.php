<?php

namespace src;

interface Prey
{
    public function chaseBy(Predator $predator);
    public function killedBy(Predator $predator);

}