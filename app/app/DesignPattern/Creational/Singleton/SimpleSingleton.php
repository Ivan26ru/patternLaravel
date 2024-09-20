<?php

namespace App\DesignPattern\Creational\Singleton;

class SimpleSingleton
{
    private static $instance;

    private $test;

    /**
     * @return mixed
     */
    public static function getInstance()
    {
        return static::$instance ?? (static::$instance = new static());
    }

    public function setTest($val)
    {
        $this->test = $val;
    }

    static function getDescription() {}
}
