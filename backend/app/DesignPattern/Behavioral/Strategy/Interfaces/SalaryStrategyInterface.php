<?php

namespace App\DesignPattern\Behavioral\Strategy\Interfaces;

interface SalaryStrategyInterface
{
    /**
     * Расчет зп
     *
     * @param $period
     * @param $user
     *
     * @return int
     */
    public function calc($period, $user): int;

    /**
     * Просто название, меня зовут так то
     * @return string
     */
    public function getName():string;
}
