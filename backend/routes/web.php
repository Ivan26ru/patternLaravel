<?php

use App\DesignPattern\Dto\DtoController;
use App\Http\Controllers\PatternController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', \App\Http\Controllers\Page\Home\HomeController::class);

Route::get('/dto', [DtoController::class, 'index']);


Route::controller(PatternController::class)
    ->prefix('patterns')
    ->group(function () {
        Route::get('/strategy', 'Strategy');
        Route::get('/singleton', 'Singleton');
    });
