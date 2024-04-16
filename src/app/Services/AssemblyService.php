<?php

namespace App\Services;

use App\Models\Assembly;
use App\Repositories\AssemblyRepository;
use App\Repositories\Contracts\AssemblyRepositoryInterface;
use App\Services\Contracts\AssemblyServiceInterface;
use Error;


final class AssemblyService implements AssemblyServiceInterface
{
    private AssemblyRepositoryInterface $repository;

    public function __construct() {
        $this->repository = new AssemblyRepository;
    }

    /**
     * @return Assembly[]|Error
     */
    public function getAll(): array|Error
    {
        try {
            $results = $this->repository->getAll();
            $assemblies = Assembly::createSet($results);

            return $assemblies;
        } catch (Error $error) {
            return $error;
        }
    }
}