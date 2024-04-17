<?php

namespace App\Repositories\Contracts;

interface AssemblyPartRepositoryInterface
{
    function getByAssemblyId(int $assemblyId): array;
    function getUnassignedToAssemblyWithId(int $assemblyId): array;
    function getByAssemblyAndPartId(int $assemblyId, int $partId): ?object;
    function unassignPart(int $assemblyId, int $partId): void;
}
