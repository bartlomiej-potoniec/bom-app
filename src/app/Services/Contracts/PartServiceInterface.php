<?php

namespace App\Services\Contracts;

use Error;

interface PartServiceInterface
{
    function getAll(): array|Error;
    function create(string $number, string $name, ?string $description, ?float $price): bool|Error;
}