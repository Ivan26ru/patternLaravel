<?php

use App\DesignPattern\Dto\DtoController;
use App\Http\Controllers\PatternController;
use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\Page\Home\HomeController::class);

// DTO
Route::get('/dto', [DtoController::class, 'index'])->name('dto.index');
Route::post('/dto/create', [DtoController::class, 'update'])->name('dto.update');


Route::controller(PatternController::class)
    ->prefix('patterns')
    ->group(function () {
        Route::get('/strategy', 'Strategy');
        Route::get('/singleton', 'Singleton');
    });
