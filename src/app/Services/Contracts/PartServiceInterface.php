<?php

namespace App\Services\Contracts;


interface PartServiceInterface
{
    function getAll(): array|\Error;
    function getById(int $id): \App\Models\Part|\Error;
    function create(string $number, string $name, ?string $description, ?float $price): bool|\Error;
    function edit(int $id, string $number, string $name, ?string $description, ?float $price): bool|\Error;
    function delete(int $id): bool|\Error;
}