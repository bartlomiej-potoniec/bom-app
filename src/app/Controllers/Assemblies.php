<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\AssemblyService;
use App\Services\AssemblyPartService;
use App\Services\Contracts\AssemblyServiceInterface;
use App\Services\Contracts\AssemblyPartServiceInterface;
use Error;


class Assemblies extends Controller
{
    private AssemblyServiceInterface $assemblyService;
    private AssemblyPartServiceInterface $partService;

    public function __construct()
    {
        $this->assemblyService = new AssemblyService;
        $this->assemblyPartService = new AssemblyPartService;
    }

    public function index(): void
    {
        $result = $this->assemblyService->getAll();

        if ($result instanceof Error) {
            $this->view('error/index', $result);
            return;
        }

        $this->view('home/index', ['assemblies' => $result]);
    }

    public function details(int $assemblyId): void
    {
        $assemblyResult = $this->assemblyService->getById($assemblyId);
        $assemblyPartsResult = $this->assemblyPartService->getByAssemblyId($assemblyId);
        $unasignedPartsResult = $this->assemblyPartService->getUnassignedToAssemblyWithId($assemblyId);

        if (
            $assemblyResult instanceof Error ||
            $assemblyPartsResult instanceof Error ||
            $unasignedPartsResult instanceof Error
        ) {
            $this->view('error/index', ['errors' => $assemblyResult]);
            return;
        }

        $this->view('assemblies/details', [
            'assembly' => $assemblyResult,
            'assemblyParts' => $assemblyPartsResult,
            'unasignedParts' => $unasignedPartsResult
        ]);
    }
}
