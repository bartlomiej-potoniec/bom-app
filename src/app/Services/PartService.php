<?php

namespace App\Services;

use App\Models\Part;
use App\Repositories\PartRepository;
use App\Services\Contracts\PartServiceInterface;


final class PartService implements PartServiceInterface
{
    private PartRepository $repository;

    public function __construct() {
        $this->repository = new PartRepository;
    }

    public function getAll(): array
    {
        $results = $this->repository->getAll();
        $parts = Part::createSet($results);

        return $parts;
    }
}