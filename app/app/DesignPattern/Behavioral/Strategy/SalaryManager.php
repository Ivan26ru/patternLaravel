<?php

namespace App\DesignPattern\Behavioral\Strategy;

use App\DesignPattern\Behavioral\Strategy\Interfaces\SalaryStrategyInterface;
use App\Models\User;
use Illuminate\Support\Collection;

class SalaryManager
{
    private $salaryStrategy;

    private $period;

    private $users;

    public function __construct(array $period, Collection $users)
    {
        $this->period = $period;
        $this->users  = $users;
    }

    public function handle()
    {
        $usersSalary = $this->calculateSalary();

        //будет отдельный класс, который будет сохранять данные
        $this->saveSalary($usersSalary);

        return $usersSalary;
    }

    /**
     * Расчет заработанной платы(калькулятор)
     *
     * @return Collection
     */
    private function calculateSalary(): Collection
    {
        // обойти пользователей
        $userSalary = $this->users->map(
            function (User $user) {
                //Определить стратегию
                $strategy = $this->getStrategyByUser($user);
                $salary   = $this
                    ->setCalculateStrategy($strategy) // Установить стратегию как главную
                    ->calculateUserSalary($this->period, $user); // Запуск команды по расчету

                $strategyName = $strategy->getName();
                $userId       = $user->id;

                $newItem = compact('userId', 'salary', 'strategyName');

                return $newItem;
            }
        );

        return $userSalary;
    }

    private function saveSalary($usersSalary) {}

    /**
     * Получить стратегию пользователя
     *
     * @param  User  $user
     *
     * @return SalaryStrategyInterface
     * @throws \Throwable
     */
    private function getStrategyByUser(User $user): SalaryStrategyInterface
    {
        // Формирование класса Strategy

        //Определить отдел где трудится
        $strategyName  = $user->departmentName().'Strategy';
        $strategyClass = __NAMESPACE__.'\\Strategies\\'.ucwords($strategyName); //

        throw_if(!class_exists($strategyClass), \Exception::class,
            "Класс не существует [{$strategyClass}]");

        return new $strategyClass;
    }

    private function setCalculateStrategy(SalaryStrategyInterface $strategy)
    {
        $this->salaryStrategy = $strategy;
        return $this;
    }

    private function calculateUserSalary(array $period, User $user)
    {
        return $this->salaryStrategy->calc($period, $user);
    }
}
