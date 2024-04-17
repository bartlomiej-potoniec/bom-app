<?php

namespace App\Services;

use App\Models\Part;
use App\Models\AssemblyPart;
use App\Services\Contracts\AssemblyPartServiceInterface;
use App\Repositories\Contracts\AssemblyPartRepositoryInterface;
use App\Repositories\AssemblyPartRepository;
use Error;


final class AssemblyPartService implements AssemblyPartServiceInterface
{
    private AssemblyPartRepositoryInterface $repository;

    public function __construct()
    {
        $this->repository = new AssemblyPartRepository;
    }

    /**
     * @return AssemblyPart[]|Error
     */
    public function getByAssemblyId(int $assemblyId): array|Error
    {
        try {
            $results = $this->repository->getByAssemblyId($assemblyId);
            $parts = AssemblyPart::createSet($results);

            return $parts;
        } catch (Error $error) {
            return $error;
        }
    }

    /**
     * @return Part[]|Error
     */
    public function getUnassignedToAssemblyWithId(int $assemblyId): array|Error
    {
        try {
            $results = $this->repository->getUnassignedToAssemblyWithId($assemblyId);
            $parts = Part::createSet($results);

            return $parts;
        } catch (Error $error) {
            return $error;
        }
    }
}