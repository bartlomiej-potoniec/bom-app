<?php

namespace App\Services;

use App\Models\Assembly;
use App\Models\AssemblyParts;
use App\Repositories\AssemblyRepository;
use App\Repositories\PartRepository;
use App\Repositories\Contracts\AssemblyRepositoryInterface;
use App\Repositories\Contracts\PartRepositoryInterface;
use App\Services\Contracts\AssemblyServiceInterface;
use Error;


final class AssemblyService implements AssemblyServiceInterface
{
    private AssemblyRepositoryInterface $assemblyRepository;
    private PartRepositoryInterface $partRepository;

    public function __construct() {
        $this->assemblyRepository = new AssemblyRepository;
        $this->partRepository = new PartRepository;
    }

    /**
     * @return Assembly[]|Error
     */
    public function getAll(): array|Error
    {
        try {
            $results = $this->assemblyRepository->getAll();
            $assemblies = Assembly::createSet($results);

            return $assemblies;
        } catch (Error $error) {
            return $error;
        }
    }

    public function getAssemblyWithParts(int $assemblyId): AssemblyParts|Error
    {
        try {
            $assemblyResult = $this->assemblyRepository->getById($assemblyId);
            $partResults = $this->partRepository->getByAssemblyId($assemblyId);

            $assemblyParts = AssemblyParts::create($assemblyResult, $partResults);

            return $assemblyParts;
        } catch (Error $error) {
            return $error;
        }
    }
}