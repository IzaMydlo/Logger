<?php

namespace src;

interface Predator
{
    public function chase(Prey $prey); //ensuring that only Pray are chased
    public function kill(Prey $prey);
}