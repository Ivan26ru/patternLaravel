<?php

declare(strict_types=1);

namespace App\DesignPattern\Dto\UseCase;

use App\DesignPattern\Dto\Service\UpdateClientService;
use Barryvdh\Debugbar\Facades\Debugbar;

/**
 * Одна бизнес операция, не может не может использовать другие UseCase
 */
final class UpdateClientUseCase
{
    /**
     * @throws \Exception
     */
    public function __invoke(CommandDTO $commandDTO): ResultDTO
    {
        Debugbar::info('Принимаю возраст только числом!!');

        $service = new UpdateClientService();

        //Принимает уже 3 параметра
        $countUpdate = $service->updateClient(
            $commandDTO->name.' '.$commandDTO->family,
            $commandDTO->email,
            $commandDTO->age
        );

        Debugbar::info('Отправили событие обновления пользователя: '.$commandDTO->email);

        return new ResultDTO(
            $commandDTO->name,
            $countUpdate
        );
    }
}
