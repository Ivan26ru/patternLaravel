<?php

use App\Http\Controllers\PatternController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(PatternController::class)
    ->prefix('patterns')
    ->group(function () {
        Route::get('/strategy', 'Strategy');
    });
