<?php

namespace App\DesignPattern\Creational\Singleton;

class LaravelSingleton implements AnotherConnection
{
    private $test;

    public function setTest($val)
    {
        $this->test = $val;
    }
}
