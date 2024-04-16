<?php

namespace App\Services\Contracts;


interface AssemblyServiceInterface
{
    function getAll(): array|\Error;
    public function getAssemblyWithParts(int $assemblyId): \App\Models\AssemblyParts|\Error;
}