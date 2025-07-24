<?php

declare(strict_types=1);

namespace App\DesignPattern\Dto\UseCase;

readonly class CommandDTO
{
    public function __construct(
        public string $name,
        public string $family,
        public string $email,
        public int $age,
    ) {}
}
