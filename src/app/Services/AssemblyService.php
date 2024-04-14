<?php

namespace App\Services;

use App\Models\Assembly;
use App\Repositories\AssemblyRepository;
use App\Services\Contracts\AssemblyServiceInterface;


final class AssemblyService implements AssemblyServiceInterface
{
    private AssemblyRepository $repository;

    public function __construct() {
        $this->repository = new AssemblyRepository;
    }

    public function getAll(): array
    {
        $results = $this->repository->getAll();
        $assemblies = Assembly::createSet($results);

        return $assemblies;
    }
}