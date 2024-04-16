<?php

namespace App\Repositories\Contracts;


interface AssemblyRepositoryInterface
{
    function getAll(): array;
    function getById(int $id): object;
}