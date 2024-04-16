<?php

namespace App\Repositories\Contracts;


interface PartRepositoryInterface
{
    function getAll(): array;
    function getById(int $id): object;
    function getByAssemblyId(int $assemblyId): array;
    function create(string $number, string $name, ?string $description, ?float $price): void;
    function edit(int $id, string $number, string $name, ?string $description, ?float $price): void;
    function delete(int $id): void;
}