<?php

namespace App\Services\Contracts;


interface AssemblyServiceInterface
{
    function getAll(): array|\Error;
    public function getById(int $id): \App\Models\Assembly|\Error;
}