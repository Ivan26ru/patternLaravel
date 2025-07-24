<?php

declare(strict_types=1);

namespace App\DesignPattern\Dto\Service;

use Barryvdh\Debugbar\Facades\Debugbar;

class UpdateClientService
{
    /**
     * @throws \Exception
     */
    public function updateClient(
        string $nameAndFamily,
        string $email,
        int $age,
    ): int {
        Debugbar::info('Маркетологи - сказали, что до 18 лет ни кого не регаем((');

        if ($age < 18) {
            throw new \Exception('Возраст не корректный (Привет из сервиса)');
        }

        Debugbar::alert('Возраст что надо!!!');

        return rand(1, 300);
    }
}
