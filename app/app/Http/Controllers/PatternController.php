<?php

namespace App\Http\Controllers;

use App\DesignPattern\Behavioral\Strategy\SalaryManager;
use App\Models\User;
use Carbon\Carbon;

class PatternController extends Controller
{
    public function Strategy()
    {
        dump('Strategy');
        dump('Поведенческий шаблон');
        dump('Стратегия - это поведенческий паттерн, выносит набор алгоритмов в собственные классы и делает их взаимозаменимыми');
        dump('Задача: Есть интернет магазин с работниками и каждый месяц надо считать зарплату им. Профессии и должности разные');
        $period = [
            Carbon::now()->subMonths()->startOfMonth(),
            Carbon::now()->subMonths()->endOfMonth(),
        ];

        $users = User::all();

        $result = (new SalaryManager($period, $users))->handle();

        dd($result);
    }
}
