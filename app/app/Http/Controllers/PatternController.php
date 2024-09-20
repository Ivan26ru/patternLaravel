<?php

namespace App\Http\Controllers;

use App\DesignPattern\Behavioral\Strategy\SalaryManager;
use App\DesignPattern\Creational\Singleton\AdvancedSingleton;
use App\DesignPattern\Creational\Singleton\AnotherConnection;
use App\DesignPattern\Creational\Singleton\LaravelSingleton;
use App\DesignPattern\Creational\Singleton\SimpleSingleton;
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

    public function Singleton()
    {
        dump('Одиночка');
        dump('Порождающий шаблон');
        dump('Одиночка (англ. Singleton) - порождающий шаблон проектирования, гарантирующий,
        что в однопроцессном приложении будет единственный экземпляр некоторого класса,
        и представляющий глобальную точку доступа к этому экземпляру.

            Нужно наделять те классы, у которых:
            - нет состояния после повторного вызова.
            - всегда должно быть одинаковый результат.

            Если класс синглтона в своей работе может вызывать какое то состояние,
            то это можно вызвать ошибки.

            Применение:
            - Объект соединения с бд
            - Логи'
        );

        // Простой способ создания (через статический метод)
        $result['simpleSingleton1'] = SimpleSingleton::getInstance(); // в начале кода
        $result['simpleSingleton1']->setTest('simpleSingleton1');
        $result['simpleSingleton2'] = SimpleSingleton::getInstance(); // где-то в конце

        $result[] = $result['simpleSingleton1'] === $result['simpleSingleton2']; // проверка, что один экземпляр

        // Продвинутый способ (через трейт)
        // Запрещаем прямое создание, Запрещаем клонирование, Запрещаем десериализацию
        $result['advancedSingleton1'] = AdvancedSingleton::getInstance();
        $result['advancedSingleton1']->setTest('advancedSingleton1');
        $result['advancedSingleton2'] = AdvancedSingleton::getInstance();

        $result[] = $result['advancedSingleton1'] === $result['advancedSingleton2'];

        // Laravel way способ создания Одиночки

        //                class AppServiceProvider {
        //                    public $singletons = [
        //                            AnotherConnection::class => LaravelSingleton::class; // Когда идет запрос на создание такого интерфейса, подставь нам экземпляр LaravelSingleton::class
        //                    ]
        //                }

        $result['laravelSingleton1'] = app(AnotherConnection::class); // тут создал и при повторном выдал его же
        $result['laravelSingleton1']->setTest('laravelSingleton1');
        $result['laravelSingleton2'] = app(AnotherConnection::class);

        $result['laravelSingleton3'] = new LaravelSingleton();// Тут уже принуждаем создать новый объект

        $result[] = $result['laravelSingleton1'] === $result['laravelSingleton2']; //true
        $result[] = $result['laravelSingleton1'] === $result['laravelSingleton3']; // false это будет другой объект

        dd($result);
    }
}
