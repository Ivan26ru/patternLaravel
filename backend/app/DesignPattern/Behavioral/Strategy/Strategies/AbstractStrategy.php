<?php

namespace App\DesignPattern\Behavioral\Strategy\Strategies;

use App\DesignPattern\Behavioral\Strategy\Interfaces\SalaryStrategyInterface;

class AbstractStrategy implements SalaryStrategyInterface
{

    /**
     * @inheritDoc
     */
    public function calc($period, $user): int
    {
        return rand(500, 2000);
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return class_basename(static::class);
    }
}
