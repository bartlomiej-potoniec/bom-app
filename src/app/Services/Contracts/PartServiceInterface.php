<?php

namespace App\Services\Contracts;


interface PartServiceInterface
{
    function getAll(): array|\Error;
    function getById(int $id): \App\Models\Part|\Error;
    function create(string $number, string $name, ?string $description, ?float $price): bool|\Error;
}