<?php

namespace App\DesignPattern\Creational\Singleton;

trait SingletonTrait
{
    private static $instance = null;

    /**
     * Запрещаем прямое создание
     */
    private function __construct() {}

    /**
     * Запрещаем клонирование
     * @return void
     */
    private function __clone() {}

    /**
     * Запрещаем десериализацию
     * @return void
     */
    public function __wakeup() {}

    public static function getInstance()
    {
        return static::$instance ?? (static::$instance = new static());
    }
}
