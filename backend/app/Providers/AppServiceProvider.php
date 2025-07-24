<?php

namespace App\Providers;

use App\DesignPattern\Creational\Singleton\AnotherConnection;
use App\DesignPattern\Creational\Singleton\LaravelSingleton;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    public $singletons = [
        // Наследование от класса, а не интерфейса
        //        LaravelSingleton::class => LaravelSingleton::class,

        // Когда идет запрос создания интерфейса - надо подставить экземпляр класса
        AnotherConnection::class => LaravelSingleton::class,
    ];
}
