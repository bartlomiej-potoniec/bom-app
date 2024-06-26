<?php

namespace App\Services\Contracts;


interface AssemblyPartServiceInterface
{
    function getByAssemblyId(int $assemblyId): array|\Error;
    function getUnassignedToAssemblyWithId(int $assemblyId): array|\Error;
    function unassignPart(int $assemblyId, int $partId): bool|\Error;
}
