<?php

declare(strict_types=1);

namespace App\DesignPattern\Dto\UseCase;

readonly class ResultDTO
{
    public function __construct(
        public string $name,
        public int $countUpdate
    ) {}
}
