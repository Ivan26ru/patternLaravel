<?php

declare(strict_types=1);

namespace App\Http\Controllers\Page\Home;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('welcome');
    }
}
