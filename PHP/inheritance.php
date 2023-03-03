<?php

class Animal{
    public $weight;

    public function eat()
    {
        var_dump('all animals eat');
    }

    public function reproduce()
    {
        var_dump('All animals can reproduce');
    }

}

class Mammals extends Animal{
    public $heartRate;

    public function breathe()
    {
        var_dump('I breath because I am a Mammal');
    }
}

class Dog extends Mammals
{
    public $color;

    public function bark()
    {
        var_dump('I am barking, as I am '. strtolower(get_class()));
    }

    public function chase()
    {
        var_dump('I am chasing a rabbir');
    }
    public function breathe() //override the method from class above
    {
        var_dump('I am breathing fast dog');
    }
}


$brown = new Dog;
$brown->weight = '23kg';
$brown->color = 'bown';
$brown->heartRate = 'okay';

var_dump($brown);
echo "Weight ".$brown->weight, PHP_EOL, "Color ". $brown->color, PHP_EOL, "Heart Rate ".$brown->heartRate;
$brown->bark();
$brown->chase();
$brown->eat();
$brown->reproduce();
$brown->breathe();

