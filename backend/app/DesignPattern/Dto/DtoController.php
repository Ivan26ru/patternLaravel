<?php

declare(strict_types=1);

namespace App\DesignPattern\Dto;

use App\DesignPattern\Dto\UseCase\CommandDTO;
use App\DesignPattern\Dto\UseCase\UpdateClientUseCase;
use App\Http\Controllers\Controller;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;

class DtoController extends Controller
{
    public function index()
    {
        return view('Dto.index');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'age' => 'required',
        ]);


        Debugbar::info('Что ж ожидаю, что пользователь ввел возраст и как то получу его');

        $useCase = new UpdateClientUseCase();

        try {
            $result = $useCase->__invoke(
                new CommandDTO(
                    $request['name'],
                    $request['family'],
                    $request['email'],
                    (int)$request['age']
                )
            );


            $responseBlade = [
                'user'         => $result->name,
                'applyUpdates' => $result->countUpdate
            ];

            return view('Dto.update', $responseBlade);
        } catch (\Exception $e) {
            return redirect()->route('dto.index')->withErrors([$e->getMessage()]);
        }
    }
}
