<?php

namespace App\DesignPattern\Creational\Singleton;

class AdvancedSingleton
{
    use SingletonTrait;

    private $test;

    public function setTest($val): void
    {
        $this->test = $val;
    }

}
