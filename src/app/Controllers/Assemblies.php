<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\AssemblyService;
use App\Services\PartService;
use App\Services\Contracts\AssemblyServiceInterface;
use App\Services\Contracts\PartServiceInterface;
use Error;


class Assemblies extends Controller
{
    private AssemblyServiceInterface $assemblyService;
    private PartServiceInterface $partService;

    public function __construct()
    {
        $this->assemblyService = new AssemblyService;
        $this->partService = new PartService;
    }

    public function index(): void
    {
        $result = $this->service->getAll();

        if ($result instanceof Error) {
            $this->view('error/index', $result);
            return;
        }

        $this->view('home/index', ['assemblies' => $result]);
    }

    public function details(int $assemblyId): void
    {
        $assemblyResult = $this->assemblyService->getById($assemblyId);
        $assemblyPartsResult = $this->partService->getByAssemblyId($assemblyId);
        $unasignedPartsResult = $this->partService->getUnassignedToAssemblyWithId($assemblyId);

        if ($assemblyResult instanceof Error
            || $assemblyPartsResult instanceof Error
            || $unasignedPartsResult instanceof Error) {
            $this->view('error/index', ['errors' => $result]);
            return;
        }

        $this->view('assemblies/details', [
            'assembly' => $assemblyResult,
            'assemblyParts' => $assemblyPartsResult,
            'unasignedParts' => $unasignedPartsResult
        ]);
    }
}
