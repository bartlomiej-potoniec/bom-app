<?php

namespace App\Repositories\Contracts;

interface AssemblyPartRepositoryInterface
{
    function getByAssemblyId(int $assemblyId): array;
    function getUnassignedToAssemblyWithId(int $assemblyId): array;
}
