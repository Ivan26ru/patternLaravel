<?php

declare(strict_types=1);

namespace App\DesignPattern\Dto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DtoController extends Controller
{
    public function index()
    {
        return view('Dto.index');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'age' => 'required|integer|min:0',
        ]);

        $dto = new UserDto($validated['name'], $validated['email'], $validated['age']);
        session(['dto' => $dto]);
        return redirect()->route('dto')->with('dto', (array)$dto);
    }
}
