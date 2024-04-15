<?php

namespace App\Repositories\Contracts;


interface PartRepositoryInterface
{
    function getAll(): array;
    function getById(int $id): object;
    function create(string $number, string $name, ?string $description, ?float $price): void;
}